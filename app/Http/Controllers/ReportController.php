<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Report;
use Illuminate\Support\Facades\Session;
use Myhelper;



class ReportController extends Controller
{
    /**
     * Load applicant monitoring report
     */
    public function showRPTAppMonitoring()
    {
        $rptID = config('app.rpt_app_monitoring');
        $rptParam = '';
        $create = Report::createRPTSession($rptID, $rptParam);
        $result = $create[0]->RETURN;

        if($result != 1) :
            Redirect::to(config('app.report_url') . '?ID=' . strval($result))->send();
        else :
            abort(404);
        endif;
    }

    /**
     * Load applicant source report
     */
    public function showRPTAppSource()
    {
        $rptID = config('app.rpt_app_source');
        $rptParam = '';
        $create = Report::createRPTSession($rptID, $rptParam);
        $result = $create[0]->RETURN;

        if($result != 1) :
            Redirect::to(config('app.report_url') . '?ID=' . $result)->send();
        else :
            abort(404);
        endif;
    }

    /**
     * Load failed applicants report
     */
    public function showRPTFailedApp()
    {
        $rptID = config('app.rpt_failed_app');
        $rptParam = '';
        $create = Report::createRPTSession($rptID, $rptParam);
        $result = $create[0]->RETURN;
        // dd($create,$result);

        if($result != 1) :
            Redirect::to(config('app.report_url') . '?ID=' . $result)->send();
        else :
            abort(404);
        endif;
    }

    /**
     * Load interview count report
     */
    public function showRPTIntCount()
    {
        $rptID = config('app.rpt_int_count');
        $rptParam = '';
        $create = Report::createRPTSession($rptID, $rptParam);
        $result = $create[0]->RETURN;

        if($result != 1) :
            Redirect::to(config('app.report_url') . '?ID=' . $result)->send();
        else :
            abort(404);
        endif;
    }

    /**
     * Load trained applicant report
     */
    public function showRPTTrainedApp()
    {
        $rptID = config('app.rpt_train_app');
        $rptParam = '';
        $create = Report::createRPTSession($rptID, $rptParam);
        $result = $create[0]->RETURN;

        if($result != 1) :
            Redirect::to(config('app.report_url') . '?ID=' . $result)->send();
        else :
            abort(404);
        endif;
    }

    /**
     * Load original appointment report
     */
    public function showRPTOriginalAppointment($appID, $categoryID)
    {
        if($categoryID == 1) :
            $rptID = config('app.rpt_org_app');
        else:
            $rptID = config('app.rpt_org_app_sea');
        endif;
        $rptParam = 'ApplicantID=' . $appID;
        $create = Report::createRPTSession($rptID, $rptParam);
        $result = $create[0]->RETURN;

        if($result != 1) :
            Redirect::to(config('app.report_url') . '?ID=' . $result)->send();
        else :
            abort(404);
        endif;
    }

    /**
     * Load applicant record report
     */
    public function showRPTAppRecord($appID)
    {
        $rptID = config('app.rpt_app_rec');
        $rptParam = 'ApplicantID=' . $appID;
        $create = Report::createRPTSession($rptID, $rptParam);
        $result = $create[0]->RETURN;

        if($result != 1) :
            Redirect::to(config('app.report_url') . '?ID=' . $result)->send();
        else :
            abort(404);
        endif;
    }

    /**
     * Load new employee record report
     */
    public function showRPTEmployeeRecord($appID)
    {
        $rptID = config('app.rpt_emp_rec');
        $userID = Myhelper::decrypt(Session::get('Employee_ID'));
        $rptParam = 'ApplicantID=' . $appID . '|' . 'UserID=' . $userID ;
        $create = Report::createRPTSession($rptID, $rptParam);
        $result = $create[0]->RETURN;

        if($result != 1) :
            Redirect::to(config('app.report_url') . '?ID=' . $result)->send();
        else :
            abort(404);
        endif;
    }
}
