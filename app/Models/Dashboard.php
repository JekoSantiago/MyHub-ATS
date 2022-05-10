<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    /**
     * Get hire source count
     */
    public static function getHireSourceCount($data)
    {
        $result = DB::connection('dbATS')->select('EXEC [sp_DB_HireSource_Count] ? ',$data);
        return $result;
    }

    /**
     * Get top 5 HR Interview count
     */
    public static function getHRInterviewCount($data)
    {
        $result = DB::connection('dbATS')->select('EXEC [sp_DB_HRInterview_Count] ?', $data);
        return $result;
    }

    /**
     * Get summary of Total App, Failed App, Encoded App (Current Date), Deployed App
     */
    public static function getAppTotalDashboard($data)
    {
        $result = DB::connection('dbATS')->select('EXEC [sp_DB_Applicant_Count] ?', $data);
        return $result;
    }

    /**
     * Get recent encoded applicant
     */
    public static function getRecentEncodedApp()
    {
        $result = DB::connection('dbATS')->select('EXEC [sp_DB_RecentApp_Get]',);
        return $result;
    }

     /**
     * Get summary of Total App, Failed App, Encoded App (Current Date), Deployed App
     */
    public static function getHREmployeeUsage($empName, $dateFrom, $dateTo)
    {
        $empID = base64_decode(Session::get('Emp_Id'));

        $result = DB::connection('dbATS')->select('EXEC [sp_DB_HRUsage_Get] ?, ?, ?, ?', [$empName, $dateFrom, $dateTo, $empID]);
        return $result;
    }
}

/* End of file Dashboard.php
 * Location: ./app/Models/Dashboard.php
 *
 * Author: Jose Lorenzo D. Tambagan
 * Created Date: January 08 2021
 * Project Name : Applicant Tracking System v1.0.0
 *
 */
