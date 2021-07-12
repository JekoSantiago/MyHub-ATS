<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Training extends Model
{
    /**
     * Get enrolled trainings of applicant
     */
    public static function getAppTraining($appID)
    {
        $appTrain = DB::connection('dbATS')->select('EXEC [sp_ProgramApp_Get] ?', [$appID]);
        return $appTrain;
    }

    /**
     * Get available trainings
     */
    public static function getTrainings($appID, $progID)
    {
        $result = DB::connection('dbTMS')->select('EXEC [sp_AvailableProgram_Get] ?, ?', [$appID, $progID]);
        return $result;
    }

    /**
     * Get training details of enrolled program of applicant
     */
    public static function getTrainingAppDetails($appID, $progID)
    {
        $result = DB::connection('dbATS')->select('EXEC [sp_TrainingAppDetails_Get] ?, ?', [$appID, $progID]);
        return $result;
    }

    /**
     * Check latest training result
     */
    public static function checkTraining($appID)
    {
        $result = DB::connection('dbATS')->select('EXEC [sp_TrainingResult_Check] ?', [$appID]);
        return $result;
    }

    /**
     * Insert / Enroll applicant to training / program
     */
    public static function insertAppTraining($data)
    {
        $program = $data['prog_id'];
        $app     = $data['app_id'];
        $empID   = base64_decode(Session::get('Emp_Id'));

        $result = DB::connection('dbATS')->select('EXEC [sp_TrainingApp_Insert] ?, ?, ?', [$program, $app, $empID]);
        return $result;
    }

    /**
     * Update enrolled applicant as deleted from training / program
     */
    public static function updateDeleteAppTraining($data)
    {
        $program = $data['prog_id'];
        $app     = $data['app_id'];
        $empID   = base64_decode(Session::get('Emp_Id'));

        $result = DB::connection('dbATS')->select('EXEC [sp_TrainingApp_Delete] ?, ?, ?', [$app, $program, $empID]);
        return $result;
    }

    /**
     * Get all trainings / programs
     */
    public static function getAllTrainings($data)
    {
        $program  = $data['program'];
        $datefrom = $data['datefrom'];
        $dateto   = $data['dateto'];
        $empID    = base64_decode(Session::get('Emp_Id'));

        $result = DB::connection('dbATS')->select('EXEC [sp_AllTrainings_Get] ?, ?, ?, ?', [$program, $datefrom, $dateto, $empID]);
        return $result;
    }

    /**
     * Get enrolled applicants from training / program
     */
    public static function getEnrolledApplicants($progID)
    {
        $result = DB::connection('dbATS')->select('EXEC [sp_AppEnrolled_Get] ?', [$progID]);
        return $result;
    }

    public static function getProgramDetail($progID)
    {
        $result = DB::connection('dbATS')->select('EXEC [sp_Program_Get] ?', [$progID]);
        return $result;
    }
}

/* End of file Training.php
 * Location: ./app/Models/Training.php
 *
 * Author: Jose Lorenzo D. Tambagan
 * Created Date: January 08 2021
 * Project Name : Applicant Tracking System v1.0.0
 *
 */
