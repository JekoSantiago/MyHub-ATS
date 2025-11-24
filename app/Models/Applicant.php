<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Myhelper;

class Applicant extends Model
{
    /************
     * Applicants
     ************/

    /**
     * Get applicant records
     */
    public static function getApplicants($data)
    {
        $params = [
            0, //Applicant_ID
            $data['lname'],
            $data['fname'],
            $data['mname'],
            $data['position'],
            $data['address'],
            null, //Interviewee
            $data['applyfrom'],
            $data['applyto'],
            $data['encodefrom'],
            $data['encodeto'],
            0, //EncodedBy
            base64_decode(Session::get('Emp_Id'))

        ];

        $app = DB::connection('dbATS')->select('EXEC sp_Applicant_Get ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', $params);
        return $app;
    }

    /**
     * Get applicant detail
     */
    public static function getApplicantDetail($appID)
    {
        $app = DB::connection('dbATS')->select('EXEC sp_Applicant_Get ?', [$appID]);
        return $app;
    }

    /**
     * Insert applicant record
     */
    public static function insertApplicant($data)
    {
        array_push($data, base64_decode(Session::get('Emp_Id')));

        $addApp = DB::connection('dbATS')->select('EXEC sp_Applicant_Insert  ' . Myhelper::generateQM($data), $data);
        return $addApp;
    }

    /**
     * Update applicant record
     */
    public static function updateApplicant($data)
    {
        array_push($data, base64_decode(Session::get('Emp_Id')));

        $updApp = DB::connection('dbATS')->select('EXEC sp_Applicant_Update  ' . Myhelper::generateQM($data), $data);
        return $updApp;
    }

    /*******************
     * Applicant Contact
     *******************/

    /**
     * Get applicant contact records
     */
    public static function getAppContact($appID)
    {
        $appCon = DB::connection('dbATS')->select('EXEC sp_ApplicantContact_Get ?, ?', [0, $appID]);
        return $appCon;
    }

    /**
     * Get applicant contact detail
     */
    public static function getAppContactDetail($acID)
    {
        $appCon = DB::connection('dbATS')->select('EXEC sp_ApplicantContact_Get ?', [$acID]);
        return $appCon;
    }

    /**
     * Insert applicant contact record
     */
    public static function insertAppContact($data)
    {
        $appID   = $data['appID'];
        $type    = $data['type'];
        $contact = $data['contact'];
        $empID   = base64_decode(Session::get('Emp_Id'));

        $addCon = DB::connection('dbATS')->select('EXEC sp_ApplicantContact_Insert ?, ?, ?, ?', [$appID, $type, $contact, $empID]);
        return $addCon;
    }

    /**
     * Update applicant contact record
     */
    public static function updateAppContact($data)
    {
        $acID    = $data['acID'];
        $appID   = $data['appID'];
        $type    = $data['type'];
        $contact = $data['contact'];
        $empID   = base64_decode(Session::get('Emp_Id'));

        $updtCon = DB::connection('dbATS')->select('EXEC sp_ApplicantContact_Update ?, ?, ?, ?, ?', [$acID, $appID, $type, $contact, $empID]);
        return $updtCon;
    }

    /*******************
     * Applicant School
     *******************/

    /**
     * Get Applicant school records
     */
    public static function getAppEducation($appID)
    {
        $appEd = DB::connection('dbATS')->select('EXEC sp_ApplicantSchool_Get ?, ?', [0, $appID]);
        return $appEd;
    }

    /**
     * Get Applicant school detail
     */
    public static function getAppEducationDetail($aeID)
    {
        $appEd = DB::connection('dbATS')->select('EXEC sp_ApplicantSchool_Get ?', [$aeID]);
        return $appEd;
    }

    /**
     * Insert Applicant school record
     */
    public static function insertAppEducation($data)
    {
        $appID  = $data['appID'];
        $type   = $data['type'];
        $school = $data['school'];
        $course = $data['course'];
        $yrFrom = $data['yrfrom'];
        $yrTo   = $data['yrto'];
        $empID  = base64_decode(Session::get('Emp_Id'));

        $addEduc = DB::connection('dbATS')->select('EXEC sp_ApplicantSchool_Insert ?, ?, ?, ?, ?, ?, ?', [$appID, $type, $school, $course, $yrFrom, $yrTo, $empID]);
        return $addEduc;
    }

    /**
     * Update Applicant school record
     */
    public static function updateAppEducation($data)
    {
        $aeID   = $data['aeID'];
        $appID  = $data['appID'];
        $type   = $data['type'];
        $school = $data['school'];
        $course = $data['course'];
        $yrFrom = $data['yrfrom'];
        $yrTo   = $data['yrto'];
        $empID  = base64_decode(Session::get('Emp_Id'));

        $updtEduc = DB::connection('dbATS')->select('EXEC sp_ApplicantSchool_Update ?, ?, ?, ?, ?, ?, ?, ?',[$aeID, $appID, $type, $school, $course, $yrFrom, $yrTo, $empID]);
        return $updtEduc;
    }

    /**********************
     * Applicant Experience
     **********************/

    /**
     * Get Applicant experience records
     */
    public static function getAppExperience($appID)
    {
        $appExp = DB::connection('dbATS')->select('EXEC sp_PrevWork_Get ?,?', [0 , $appID]);

        return $appExp;
    }

    /**
     * Get Applicant experience detail
     */
    public static function getAppExperienceDetail($expID)
    {
        $appExp = DB::connection('dbATS')->select('EXEC sp_PrevWork_Get ?', [$expID]);
        return $appExp;
    }

    /**
     * Insert Applicant experience record
     */
    public static function insertAppExperience($data)
    {
        $appID    = $data['appID'];
        $employer = $data['employer'];
        $emptype  = $data['emptype'];
        $add      = $data['address'];
        $pos      = $data['position'];
        $moFrom   = $data['monthfrom'];
        $yrFrom   = $data['yearfrom'];
        $moTo     = $data['monthto'];
        $yrTo     = $data['yearto'];
        $dayFrom  = $data['dayTo'];
        $dayTo    = $data['dayFrom'];
        $empID    = base64_decode(Session::get('Emp_Id'));

        $addExp = DB::connection('dbATS')->select('EXEC sp_PrevWork_Insert ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', [$appID, $employer, $emptype, $add, $pos, $moFrom, $yrFrom, $moTo, $yrTo, $dayFrom, $dayTo, $empID]);
        return $addExp;
    }

    /**
     * Update Applicant experience record
     */
    public static function updateAppExperience($data)
    {
        $expID    = $data['expID'];
        $appID    = $data['appID'];
        $employer = $data['employer'];
        $emptype  = $data['emptype'];
        $add      = $data['address'];
        $pos      = $data['position'];
        $moFrom   = $data['monthfrom'];
        $yrFrom   = $data['yearfrom'];
        $moTo     = $data['monthto'];
        $yrTo     = $data['yearto'];
        $dayFrom  = $data['dayTo'];
        $dayTo    = $data['dayFrom'];
        $empID    = base64_decode(Session::get('Emp_Id'));

        $updtExp = DB::connection('dbATS')->select('sp_PrevWork_Update ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?',[$expID, $appID, $employer, $emptype, $add, $pos, $moFrom, $yrFrom, $moTo, $yrTo, $dayFrom, $dayTo, $empID]);
        return $updtExp;
    }

    /*********************
     * Applicant Interview
     *********************/

    /**
     * Get applicant interview record
     */
    public static function getAppInterview($appID)
    {
        $appInt = DB::connection('dbATS')->select('EXEC sp_Interview_Get ?', [$appID]);
        return $appInt;
    }

    /**
     * Insert applicant interview record
     */
    public static function InsertAppInterview($data)
    {
        $appID     = $data['appID'];
        $f_date    = $data['first_date'];
        $f_emp     = $data['first_emp'];
        $f_remarks = $data['first_remarks'] ?? NULL;
        $f_status  = $data['first_passed'];
        $empID     = base64_decode(Session::get('Emp_Id'));

        $addInt = DB::connection('dbATS')->select('EXEC sp_Interview_Insert ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', [$appID, $f_date, $f_emp, $f_remarks, $f_status, null, null, null, null, null, null, null, null, $empID]);
        return $addInt;
    }

    /**
     * Update applicant interview record
     */
    public static function updateAppInterview($data)
    {
        $parameters = [
            $data['intID'],
            $data['first_date'],
            $data['first_emp'],
            $data['first_remarks'] ?? NULL,
            $data['first_passed'],
            $data['second_date'] ?? NULL,
            $data['second_emp'] ?? NULL,
            $data['second_remarks'] ?? NULL,
            $data['second_passed'] ?? NULL,
            $data['third_date'] ?? NULL,
            $data['third_emp'] ?? NULL,
            $data['third_remarks'] ?? NULL,
            $data['third_passed'] ?? NULL,
            base64_decode(Session::get('Emp_Id'))
        ];

        $updtInt = DB::connection('dbATS')->select('EXEC sp_Interview_Update ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', $parameters);
        return $updtInt;
    }

    /**********************
     * Applicant Employment
     **********************/

    /**
     * Get applicant employment detail
     */
    public static function getAppEmployment($appID)
    {
        $appEmp = DB::connection('dbATS')->select('EXEC sp_Hire_Get ?', [$appID]);
        return $appEmp;
    }

    /**
     * Insert applicant employment record
     */
    public static function insertAppEmployment($data)
    {
        array_push($data, base64_decode(Session::get('Emp_Id')));

        $saveEmp = DB::connection('dbATS')->select('EXEC sp_Hire_Insert ' . Myhelper::generateQM($data), $data);
        return $saveEmp;
    }

    /**
     * Update applicant employment record
     */
    public static function updateAppEmployment($data)
    {
        array_push($data, base64_decode(Session::get('Emp_Id')));

        $updtEmp = DB::connection('dbATS')->select('EXEC sp_Hire_Update ' . Myhelper::generateQM($data) , $data);
        return $updtEmp;
    }

    /**
     * Update applicant employment isWithRequirements column
     */
    public static function updateAppEmploymentWithReq($employmentID, $bit)
    {
        $empID = base64_decode(Session::get('Emp_Id'));

        $updtEmp = DB::connection('dbATS')->select('EXEC sp_HireWithRequirements_Update ?, ?, ?', [$employmentID, $bit, $empID]);
        return $updtEmp;
    }

    /**
     * Update applicant employment isDeployed column
     */
    public static function updateAppEmploymentDeploy($employmentID)
    {
        $empID = base64_decode(Session::get('Emp_Id'));

        $updtEmp = DB::connection('dbATS')->select('EXEC sp_HireDeploy_Update ?, ?, ?', [$employmentID, 1, $empID]);
        return $updtEmp;
    }


    /**********************
     * Applicant Family
     **********************/

    /**
     * Get applicant family list
     */
    public static function getAppFamily($data)
    {
        return DB::connection('dbATS')->select('sp_ApplicantFamily_Get ' . Myhelper::generateQM($data), $data);
    }

    /**
     * Insert Applicant Family
     */
    public static function insertAppFamily($data)
    {
        return DB::connection('dbATS')->select('sp_ApplicantFamily_Insert ' . Myhelper::generateQM($data), $data);
    }

    /**
     * Update Applicant Family
     */
    public static function updateAppFamily($data)
    {
        return DB::connection('dbATS')->select('sp_ApplicantFamily_Update ' . Myhelper::generateQM($data), $data);

    }

    /**
     * Update First Job
     */
    public static function updateFirstJob($data)
    {
        return DB::connection('dbATS')->select('sp_FirstJob_Update ' . Myhelper::generateQM($data), $data);
    }



}

/* End of file Applicant.php
 * Location: ./app/Models/Applicant.php
 *
 * Author: Jose Lorenzo D. Tambagan
 * Created Date: January 08 2021
 * Project Name : Applicant Tracking System v1.0.0
 *
 */
