<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\Applicant;
use App\Models\Common;
use App\Models\Training;
use Myhelper;
use Session;

class PageController extends Controller
{
    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
        //     if (is_null(Session::get('EmpNo'))) :
        //         abort(401);
        //     else :
        //         return $next($request);
        //     endif;
        // });
    }

    public function dashboard()
    {
        $data['cardcount'] = Dashboard::getAppTotalDashboard();
        $data['intcount']  = Dashboard::getHRInterviewCount();
        $data['recapp']    = Dashboard::getRecentEncodedApp();
        $data['title']     = 'Dashboard';

        return view('pages.dashboard.index', $data);
    }

    public function maintenance()
    {
        return view('pages.maintenance.index');
    }

    public function applicants()
    {
        $data['title'] = 'Applicants';

        return view('pages.applicants.index', $data);
    }

    public function applicantProfile($appId)
    {
        $id = base64_decode($appId);

        $app           = Applicant::getApplicantDetail($id);
        $app_con       = Applicant::getAppContact($id);
        $app_educ      = Applicant::getAppEducation($id);
        $app_exp       = Applicant::getAppExperience($id);
        $app_int       = Applicant::getAppInterview($id);
        $app_emp       = Applicant::getAppEmployment($id);
        $app_train     = Training::getAppTraining($id);
        $checkTraining = Training::checkTraining($id);
        $prfDeployed   = Common::getPRFDeployed([$app_emp[0]->Record_ID]);

        //  dump($app_emp);
        $data['applicant']     = $app;
        $data['appcon']        = $app_con;
        $data['appschool']     = $app_educ;
        $data['appexp']        = $app_exp;
        $data['interview']     = $app_int;
        $data['employment']    = $app_emp;
        $data['training']      = $app_train;
        $data['employee']      = Common::getEmployees();
        $data['employee2']     = Common::getEmployees2();
        $data['asscat']        = Common::getAssignmentCat();
        $data['superior']      = Common::getSuperior();
        $data['company']       = Common::getCompany();
        $data['location']      = Common::getLocation();
        $data['clinic']        = Common::getClinic();
        $data['result']        = Common::getResult();
        $data['paymode']       = Common::getPayRollMode();
        $data['accttype']      = Common::getAccountType();
        $data['hirestatus']    = Common::getAppstatus();
        $data['religion']      = Common::getReligion();
        $data['position']      = Common::getPosition();
        $data['gender']        = Common::getGender();
        $data['hiresource']    = Common::getHiresource();
        $data['civilstatus']   = Common::getCivilstatus();
        $data['taxcode']       = Common::getTaxcode();
        $data['province']      = Common::getProvince();
        $data['municipal']     = Common::getMunicipal($app[0]->Province_ID);
        $data['barangay']      = Common::getBarangay($app[0]->Municipal_ID);
        $data['bmunicipal']    = Common::getMunicipal($app[0]->BirthProv_ID);
        $data['empStatus']     = Common::getEmployeeStatus();
        $data['prf']           = Common::getPRF([$id,0]);
        $data['seconddisable'] = Myhelper::checkAccessSecondInterview($app_int);
        $data['thirddisable']  = Myhelper::checkAccessThirdInterview($app_int);
        $data['traininginfo']  = Myhelper::checkResult($app[0]->Position_ID, $checkTraining);
        $data['intinfo']       = Myhelper::checkInterview($app_int);
        $data['empdisable']    = Myhelper::checkEnableEmpInput($app, $app_int, $checkTraining);
        $data['othdisable']    = Myhelper::checkEnableEmpOtherInput($app[0]->isWithRequirements);
        $data['reqvisible']    = Myhelper::checkVisibleCompleteReq($app, $app_emp);
        $data['title']         = $app[0]->AppName;
        $data['prfDep']        = (empty($prfDeployed)) ? NULL : $prfDeployed[0]->ControllNumber;


        // dd($data['traininginfo']);
        // $page = Request::get('page', 1);
        // $paginate = 2;

        // $offSet = ($page * $paginate) - $paginate;
        // $itemsForCurrentPage = array_slice($ae, $offSet, $paginate, true);
        // $ae = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($ae), $paginate, $page, ['path' => URL::current()]);

        return view('pages.applicant_profile.index', $data);
    }

    public function trainings()
    {
        $data['title'] = 'Trainings';

        return view('pages.trainings.index', $data);
    }
}
