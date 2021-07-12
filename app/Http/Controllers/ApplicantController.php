<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Common;
use App\Models\Training;
use Myhelper;
use Illuminate\Support\Facades\Session;

class ApplicantController extends Controller
{

    /************
     * Applicants
     ************/

    /**
     * Load new applicant modal body
     */
    public function showNewApplicant()
    {
        $data['hirestatus']  = Common::getAppstatus();
        $data['religion']    = Common::getReligion();
        $data['position']    = Common::getPosition();
        $data['gender']      = Common::getGender();
        $data['hiresource']  = Common::getHiresource();
        $data['civilstatus'] = Common::getCivilstatus();
        $data['taxcode']     = Common::getTaxcode();
        $data['province']    = Common::getProvince();

        return view('pages.applicants.modals.content.new_applicant', $data);
    }

    /**
     * Save applicant
     */
    public function saveApplicant(Request $request)
    {
        $data = array(
            $request->new_app_date,
            $request->new_last_name,
            $request->new_first_name,
            $request->new_middle_name,
            $request->new_pos_app,
            $request->new_app_status,
            $request->new_reason,
            $request->new_address,
            $request->new_barangay,
            $request->new_municipal,
            $request->new_province,
            $request->new_gender,
            $request->new_civil_status,
            $request->new_nationality,
            $request->new_religion,
            $request->new_bdate,
            $request->new_bmun,
            $request->new_bothers,
            str_replace('-', '',$request->new_sss),
            str_replace('-', '',$request->new_philhealth),
            str_replace('-', '',$request->new_tin),
            $request->new_taxcode,
            $request->new_dependent,
            str_replace('-', '',$request->new_hdmf),
            $request->new_hire_source,
        );

        $insert = Applicant::insertApplicant($data);

        $num = $insert[0]->RETURN;

        if ($num > 0) :
            $msg = 'Applicant successfully saved!';
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;
    }

    /**
     * Update applicant
     */
    public function updateApplicant(Request $request)
    {
        $data = array(
            $request->edit_appID,
            $request->edit_app_date,
            $request->edit_last_name,
            $request->edit_first_name,
            $request->edit_middle_name,
            $request->edit_pos_app,
            $request->edit_app_status,
            $request->edit_reason,
            $request->edit_address,
            $request->edit_barangay,
            $request->edit_municipal,
            $request->edit_province,
            $request->edit_gender,
            $request->edit_civil_status,
            $request->edit_nationality,
            $request->edit_religion,
            $request->edit_bdate,
            ( $request->edit_bmun ?? 0 ),
            $request->edit_bothers,
            str_replace('-', '',$request->edit_sss),
            str_replace('-', '',$request->edit_philhealth),
            str_replace('-', '',$request->edit_tin),
            $request->edit_taxcode,
            $request->edit_dependent,
            str_replace('-', '',$request->edit_hdmf),
            $request->edit_hire_source,
        );

        $update = Applicant::updateApplicant($data);

        $num = $update[0]->RETURN;

        if ($num > 0) :
            $msg = 'Applicant successfully updated!';
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;
    }

    /**
     * Load filter applicants modal body
     */
    public function showFilterApplicants()
    {
        $data['fname']      = Session::get('filter_app_fname');
        $data['mname']      = Session::get('filter_app_mname');
        $data['lname']      = Session::get('filter_app_lname');
        $data['position']   = Session::get('filter_app_position');
        $data['address']    = Session::get('filter_app_address');
        $data['applydate']  = Session::get('filter_app_applydate');
        $data['encodedate'] = Session::get('filter_app_encodedate');

        return view('pages.applicants.modals.content.filter', $data);
    }

    /**
     * Fetch applicants server side
     */
    public function getSSApplicants(Request $request)
    {
        $applyDate  = explode(' to ', $request->applyDate);
        $encodeDate = explode(' to ', $request->encodeDate);

        $data['fname']      = $request->firstName;
        $data['mname']      = $request->middleName;
        $data['lname']      = $request->lastName;
        $data['position']   = $request->position;
        $data['address']    = $request->address;
        $data['applyfrom']  = $applyDate[0];
        $data['applyto']    = ( $applyDate[1] ?? $applyDate[0] );
        $data['encodefrom'] = $encodeDate[0];
        $data['encodeto']   = ( $encodeDate[1] ?? $encodeDate[0] );

        Session::put('filter_app_fname', $request->firstName);
        Session::put('filter_app_mname', $request->middleName);
        Session::put('filter_app_lname', $request->lastName);
        Session::put('filter_app_position', $request->position);
        Session::put('filter_app_address', $request->address);
        Session::put('filter_app_applydate', $request->applyDate);
        Session::put('filter_app_encodedate', $request->encodeDate);
        Session::save();

        $result = Applicant::getApplicants($data);
        $count = count($result);
        $encode = array();

        if ($count > 0) :
            foreach ($result as $items) :
                $items->Applicant_ID = base64_encode($items->Applicant_ID);
                $encode[] = array_map('utf8_encode', (array)$items);
            endforeach;
        endif;

        echo MyHelper::buildJsonTable($count, $encode);
    }

    /**
     * Fetch applicants client side
     */
    public function getCSApplicants(Request $request)
    {
        $data['fname']      = $request->firstName;
        $data['mname']      = $request->middleName;
        $data['lname']      = $request->lastName;
        $data['position']   = $request->position;
        $data['address']    = $request->address;
        $data['applydate']  = $request->applyDate;
        $data['encodedate'] = $request->encodeDate;

        $data = Applicant::getApplicants($data);
        $count = count($data);
        $encode = array();

        if ($count > 0) :
            foreach ($data as $items)
            {
                $items->Applicant_ID = base64_encode($items->Applicant_ID);
                $encode[] = $items;
            }
        endif;

        echo json_encode(array("data" => $encode));
    }

    /**
     * Load edit applicant tab body
     */
    public function showEditApp($appID)
    {
        $result = Applicant::getApplicantDetail($appID);
        $data['details']     = $result;
        $data['hirestatus']  = Common::getAppstatus();
        $data['religion']    = Common::getReligion();
        $data['position']    = Common::getPosition();
        $data['gender']      = Common::getGender();
        $data['hiresource']  = Common::getHiresource();
        $data['civilstatus'] = Common::getCivilstatus();
        $data['taxcode']     = Common::getTaxcode();
        $data['province']    = Common::getProvince();
        $data['bprovince']   = Common::getProvince();
        $data['municipal']   = Common::getMunicipal($result[0]->Province_ID);
        $data['barangay']    = Common::getBarangay($result[0]->Municipal_ID);
        $data['bmunicipal']  = Common::getMunicipal($result[0]->BirthProv_ID);

        return view('pages.applicant_profile.tabs_content.edit_applicant', $data);
    }

    /*******************
     * Applicant Contact
     *******************/

     /**
     * Load new applicant contact modal body
     */
    public function showNewAppContact()
    {
        $data['contype'] = Common::getContactType();

        return view('pages.applicant_profile.modals.content.new_app_contact', $data);
    }

    /**
     * Load edit applicant contact modal body
     */
    public function showEditAppContact($acID)
    {
        $data['contype'] = Common::getContactType();
        $data['details'] = Applicant::getAppContactDetail($acID);

        return view('pages.applicant_profile.modals.content.edit_app_contact', $data);
    }

    /**
     * Save applicant contact
     */
    public function saveAppContact(Request $request)
    {
        $data['appID'] = $request->appID;
        $data['type']  = $request->new_contact_type;

        if($data['type'] == 1 || $data['type'] == 2) :
            $data['contact'] = str_replace('-', '', $request->new_contact);
        else :
            $data['contact'] = $request->new_contact;
        endif;

        $add = Applicant::insertAppContact($data);

        $num = $add[0]->RETURN;

        if ($num > 0) :
            $msg = 'Contact successfully added!';
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;
    }

    /**
     * Update applicant contact
     */
    public function updateAppContact(Request $request)
    {
        $data['acID']  = $request->app_contact_ID;
        $data['appID'] = $request->appID;
        $data['type']  = $request->edit_contact_type;

        if($data['type'] == 1 || $data['type'] == 2) :
            $data['contact'] = str_replace('-', '', $request->edit_contact);
        else :
            $data['contact'] = $request->edit_contact;
        endif;

        $update = Applicant::updateAppContact($data);

        $num = $update[0]->RETURN;

        if ($num > 0) :
            $msg = 'Contact successfully updated!';
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;

    }

    /******************
     * Applicant School
     ******************/

    /**
     * Load new applicant education modal body
     */
    public function showNewAppEducation()
    {
        $data['schooltype'] = Common::getSchooltype();
        $data['year']      = Common::getYear();

        return view('pages.applicant_profile.modals.content.new_app_educ', $data);
    }

    /**
     * Load edit applicant education modal body
     */
    public function showEditAppEducation($educID)
    {
        $result = Applicant::getAppEducationDetail($educID);
        $style = '';

        if ($result[0]->SchoolType_ID != 1) :
            $style = 'display: block;';
        else :
            $style = 'display: none;';
        endif;

        $data['schooltype'] = Common::getSchooltype();
        $data['year']       = Common::getYear();
        $data['details']    = $result;
        $data['style']      = $style;

        return view('pages.applicant_profile.modals.content.edit_app_educ', $data);
    }

    /**
     * Save applicant education
     */
    public function saveAppEducation(Request $request)
    {
        $data['appID']  = $request->appID;
        $data['type']   = $request->new_school_type;
        $data['school'] = $request->new_school;
        $data['course'] = $request->new_course;
        $data['yrfrom'] = $request->new_educ_year_from;
        $data['yrto']   = $request->new_educ_year_to;

        $add = Applicant::insertAppEducation($data);

        $num = $add[0]->RETURN;

        if ($num > 0) :
            $msg = 'Educational background successfully added!';
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;
    }

    /**
     * Update applicant education
     */
    public function updateAppEducation(Request $request)
    {
        $data['aeID']  = $request->app_educ_ID;
        $data['appID']  = $request->appID;
        $data['type']   = $request->edit_school_type;
        $data['school'] = $request->edit_school;
        $data['course'] = $request->edit_course;
        $data['yrfrom'] = $request->edit_educ_year_from;
        $data['yrto']   = $request->edit_educ_year_to;

        $update = Applicant::updateAppEducation($data);

        $num = $update[0]->RETURN;

        if ($num > 0) :
            $msg = 'Educational background successfully updated!';
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;
    }

    /**********************
     * Applicant Experience
     **********************/

    /**
     * Load new applicant experience modal body
     */
    public function showNewAppExperience()
    {
        $data['emptype'] = Common::getPrevEmploymentType();
        $data['month']   = Common::getMonth();
        $data['year']    = Common::getYear();

        return view('pages.applicant_profile.modals.content.new_app_exp', $data);
    }

    /**
     * Load edit applicant experience modal body
     */
    public function showEditAppExperience($expID)
    {
        $data['emptype'] = Common::getPrevEmploymentType();
        $data['month']   = Common::getMonth();
        $data['year']    = Common::getYear();
        $data['details'] = Applicant::getAppExperienceDetail($expID);

        return view('pages.applicant_profile.modals.content.edit_app_exp', $data);
    }

    /**
     * Save applicant experience
     */
    public function saveAppExperience (Request $request)
    {
        $data['appID']     = $request->appID;
        $data['employer']  = $request->new_employer;
        $data['emptype']   = $request->new_emptype;
        $data['address']   = $request->new_address;
        $data['position']  = $request->new_position;
        $data['monthfrom'] = $request->new_exp_month_from;
        $data['yearfrom']  = $request->new_exp_year_from;
        $data['monthto']   = $request->new_exp_month_to;
        $data['yearto']    = $request->new_exp_year_to;

        $add = Applicant::insertAppExperience($data);

        $num = $add[0]->RETURN;

        if ($num > 0) :
            $msg = 'Background experience successfully added!';
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;
    }

    /**
     * Update applicant experience
     */
    public function updateAppExperience (Request $request)
    {
        $data['expID']     = $request->experience_ID;
        $data['appID']     = $request->appID;
        $data['employer']  = $request->edit_employer;
        $data['emptype']   = $request->edit_emptype;
        $data['address']   = $request->edit_employer_address;
        $data['position']  = $request->edit_position;
        $data['monthfrom'] = $request->edit_exp_month_from;
        $data['yearfrom']  = $request->edit_exp_year_from;
        $data['monthto']   = $request->edit_exp_month_to;
        $data['yearto']    = $request->edit_exp_year_to;

        $add = Applicant::updateAppExperience($data);

        $num = $add[0]->RETURN;

        if ($num > 0) :
            $msg = 'Background experience successfully updated!';
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;
    }

    /*********************
     * Applicant Interview
     *********************/

     /**
     * Save / update applicant interview
     */
    public function saveAppInterview(Request $request)
    {
        $hasInt = $request->has_interview;
        $data['intID']          = $request->intID;
        $data['appID']          = $request->appID;
        $data['first_date']     = $request->first_int_date;
        $data['first_emp']      = $request->first_int_interviewee;
        $data['first_remarks']  = $request->first_int_remarks;
        $data['first_passed']   = $request->first_int_status;
        $data['second_date']    = $request->second_int_date;
        $data['second_emp']     = $request->second_int_interviewee;
        $data['second_remarks'] = $request->second_int_remarks;
        $data['second_passed']  = $request->second_int_status;
        $data['third_date']     = $request->third_int_date;
        $data['third_emp']      = $request->third_int_interviewee;
        $data['third_remarks']  = $request->third_int_remarks;
        $data['third_passed']   = $request->third_int_status;

        if($hasInt == 0) :
            $result = Applicant::InsertAppInterview($data);
        else:
            $result = Applicant::updateAppInterview($data);
        endif;

        $num = $result[0]->RETURN;

        if ($num > 0) :
            $msg = 'Interview history successfully saved!';
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;
    }

    /********************
     * Applicant Training
     ********************/

    /**
     * Load new applicant training modal body
     */
    public function showNewAppTraining($appid, $parentid)
    {
        $app    = $appid;
        $parent = $parentid;
        $data['parentID']  = $parent;
        $data['appID']     = $app;
        $data['trainings'] = Training::getTrainings($app, $parent);

        return view('pages.applicant_profile.modals.content.new_app_training', $data);
    }

    /**
     * Load enrolled applicants modal body
     */
    public function showEnrolledApp($progID)
    {
        $data['progID']     = $progID;
        $data['applicants'] = Training::getEnrolledApplicants($progID);

        return view('pages.applicant_profile.modals.content.enrolled_applicants', $data);
    }

    /**
     * Save applicant training
     */
    public function saveAppTraining()
    {
        $app = request()->input('app');
        $prog = request()->input('prog');

        $data = array(
            'prog_id' => $prog,
            'app_id'  => $app
        );

        $insert = Training::insertAppTraining($data);

        $num = $insert[0]->RETURN;

        if ($num > 0) :
            $msg = 'Applicant successfully enrolled for training!';
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;
    }

    /**
     * remove applicant training
     */
    public function removeAppTraining()
    {
        $app = request()->input('app');
        $prog = request()->input('prog');

        $data['prog_id'] = $prog;
        $data['app_id']   = $app;

        $insert = Training::updateDeleteAppTraining($data);

        $num = $insert[0]->RETURN;

        if ($num > 0) :
            $msg = 'Applicant successfully removed from training!';
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;
    }

    /**
     * Load applicant training details modal body
     */
    public function showAppTrainingDetails($appID, $programID)
    {
        $data['appID'] = $appID;
        $data['programID'] = $programID;
        $data['trainings'] = Training::getTrainingAppDetails($appID, $programID);

        return view('pages.applicant_profile.modals.content.app_training_details', $data);
    }

    /**********************
     * Applicant Employment
     **********************/

    /**
     * Load edit applicant employment tab body
     */
    public function showEditAppEmployment($appID)
    {
        $data['details']  = Applicant::getAppEmployment($appID);
        $data['asscat']   = Common::getAssignmentCat();
        $data['superior'] = Common::getSuperior();
        $data['company']  = Common::getCompany();
        $data['location'] = Common::getLocation();
        $data['clinic']   = Common::getClinic();
        $data['result']   = Common::getResult();
        $data['paymode']  = Common::getPayRollMode();
        $data['accttype'] = Common::getAccountType();

        return view('pages.applicant_profile.tabs_content.employment_form', $data);
    }

    /**
     * Save / Update applicant employment
     */
    public function saveAppEmployment(Request $request)
    {
        $id = $request->appID;

        if($request->edit_employmentID != '') :
            $id = $request->edit_employmentID;
        endif;

        $data = array(
            $id,
            str_replace('-', '', $request->edit_emp_empno),
            $request->edit_emp_superior,
            $request->edit_emp_meddate,
            $request->edit_emp_clinic,
            $request->edit_emp_othclinic,
            $request->edit_emp_physician,
            $request->edit_emp_restype,
            $request->edit_emp_resremarks,
            $request->edit_emp_company,
            $request->edit_emp_location,
            $request->edit_emp_datehire,
            $request->edit_emp_paytype,
            $request->edit_emp_paymode,
            $request->edit_emp_basic,
            $request->edit_emp_cola,
            $request->edit_emp_bank,
            $request->edit_emp_acctype,
            $request->edit_emp_accno,
            $request->edit_emp_ass_cat,
            $request->edit_emp_dateend,
        );

        if($request->edit_employmentID != '') :
            $result = Applicant::updateAppEmployment($data);
        else:
            $result = Applicant::insertAppEmployment($data);
        endif;

        $num = $result[0]->RETURN;

        if ($num > 0) :
            $msg = 'Employment information successfully saved!';
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;
    }

    /**
     * Update to tag applicant employment complete or not complete requirements
     */
    public function updateTagAppEmploymentWithReq(Request $request)
    {
        $employmentID = $request->hireID;
        $bit          = $request->withReq;

        $result = Applicant::updateAppEmploymentWithReq($employmentID, $bit);

        $num = $result[0]->RETURN;

        if ($num > 0) :
            if($bit == 0) :
                $msg = 'Applicant successfully untagged for incomplete requirements!';
            else:
                $msg = 'Applicant successfully tagged as complete requirements!';
            endif;
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;
    }

    /**
     * Update to tag applicant as deployed
     */
    public function updateTagAppEmploymentDeploy(Request $request)
    {
        $hireID = $request->hireID;

        $result = Applicant::updateAppEmploymentDeploy($hireID);

        $num = $result[0]->RETURN;

        if ($num > 0) :
            $msg = 'Applicant successfully tagged as deployed!';
        else :
            $msg = Myhelper::errorMessages($num);
        endif;

        $result = array('num' => $num, 'msg' => $msg);
        return $result;
    }

}
