<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    /**
     * Creating a session per report access usage
     */
    public static function createRPTSession($reportID, $reportParam)
    {
        $empID = base64_decode(Session::get('Emp_Id'));

        $result = DB::connection('dbRptSession')->select('EXEC [sp_RptSession_Create] ?, ?, ?', [$empID, $reportID, $reportParam]);
        return $result;
    }
}

/* End of file Report.php
 * Location: ./app/Models/Report.php
 *
 * Author: Jose Lorenzo D. Tambagan
 * Created Date: January 08 2021
 * Project Name : Applicant Tracking System v1.0.0
 *
 */
