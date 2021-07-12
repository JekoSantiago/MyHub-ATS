<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Common extends Model
{
    /**
     * Get applicant hire status options
     */
    public static function getAppStatus()
    {
        $hirestatus = DB::connection('dbATS')->select('EXEC sp_HireStatus_Get');
        return $hirestatus;
    }

    /**
     * Get religion options
     */
    public static function getReligion()
    {
        $religion = DB::connection('dbATS')->select('EXEC sp_Religion_Get');
        return $religion;
    }

    /**
     * Get position options
     */
    public static function getPosition()
    {
        $position = DB::connection('dbATS')->select('EXEC sp_Position_Get');
        return $position;
    }

    /**
     * Get gender options
     */
    public static function getGender()
    {
        $gender = DB::connection('dbATS')->select('EXEC sp_Gender_Get');
        return $gender;
    }

    /**
     * Get hire source options
     */
    public static function getHiresource()
    {
        $hiresource = DB::connection('dbATS')->select('EXEC sp_HireSource_Get');
        return $hiresource;
    }

    /**
     * Get civil status options
     */
    public static function getCivilstatus()
    {
        $civilstatus = DB::connection('dbATS')->select('EXEC sp_CivilStatus_Get');
        return $civilstatus;
    }

    /**
     * Get tax code options
     */
    public static function getTaxcode()
    {
        $taxcode = DB::connection('dbATS')->select('EXEC sp_TaxCode_Get');
        return $taxcode;
    }

    /**
     * Get province options
     */
    public static function getProvince()
    {
        $province = DB::connection('dbATS')->select('EXEC sp_Province_Get');
        return $province;
    }

    /**
     * Get municipal options
     */
    public static function getMunicipal($provID)
    {
        $municipal = DB::connection('dbATS')->select('EXEC sp_Municipal_Get ?',[$provID]);
        return $municipal;
    }

    /**
     * Get barangay options
     */
    public static function getBarangay($munID)
    {
        $barangay = DB::connection('dbATS')->select('EXEC sp_Barangay_Get ?',[$munID]);
        return $barangay;
    }

    /**
     * Get school type options
     */
    public static function getSchooltype()
    {
        $schooltype = DB::connection('dbATS')->select('EXEC sp_SchoolType_Get');
        return $schooltype;
    }

    /**
     * Get month options
     */
    public static function getMonth()
    {
        $month = DB::connection('dbATS')->select('EXEC sp_Month_Get');
        return $month;
    }

    /**
     * Get year options
     */
    public static function getYear()
    {
        $year = DB::connection('dbATS')->select('EXEC sp_Year_Get');
        return $year;
    }

    /**
     * Get contact type options
     */
    public static function getContactType()
    {
        $contype = DB::connection('dbATS')->select('EXEC sp_ContactType_Get');
        return $contype;
    }

    /**
     * Get applicant interviewee options
     */
    public static function getEmployees()
    {
        $emp = DB::connection('dbATS')->select('EXEC sp_Employee_Search');
        return $emp;
    }

    /**
     * Get assignment category options
     */
    public static function getAssignmentCat()
    {
        $category = DB::connection('dbATS')->select('EXEC sp_AssignmentCategory_Get');
        return $category;
    }

    /**
     * Get applicant superior options
     */
    public static function getSuperior()
    {
        $superior = DB::connection('dbATS')->select('EXEC sp_Superior_Get');
        return $superior;
    }

    /**
     * Get company options
     */
    public static function getCompany()
    {
        $company = DB::connection('dbATS')->select('EXEC sp_Company_Get');
        return $company;
    }

    /**
     * Get applicant plantilla options
     */
    public static function getLocation()
    {
        $loc = DB::connection('dbATS')->select('EXEC sp_Location_Get');
        return $loc;
    }

    /**
     * Get clinic options
     */
    public static function getClinic()
    {
        $clinic = DB::connection('dbATS')->select('EXEC sp_Clinic_Get');
        return $clinic;
    }

    /**
     * Get medical result options
     */
    public static function getResult()
    {
        $rt = DB::connection('dbATS')->select('EXEC sp_ResultType_Get');
        return $rt;
    }

    /**
     * Get payroll mode options
     */
    public static function getPayRollMode()
    {
        $prm = DB::connection('dbATS')->select('EXEC sp_PayRollMode_Get');
        return $prm;
    }

    /**
     * Get account type options
     */
    public static function getAccountType()
    {
        $acct = DB::connection('dbATS')->select('EXEC sp_AccountType_Get');
        return $acct;
    }

    /**
     * Get previous employment type options
     */
    public static function getPrevEmploymentType()
    {
        $empt = DB::connection('dbATS')->select('EXEC sp_EmploymentType_Get');
        return $empt;
    }

    /**
     * Get applicant interviewee options
     */
    public static function getEmployees2()
    {
        $emp = DB::connection('dbATS')->select('EXEC sp_Employee2_Search');
        return $emp;
    }
}

/* End of file Common.php
 * Location: ./app/Models/Common.php
 *
 * Author: Jose Lorenzo D. Tambagan
 * Created Date: January 08 2021
 * Project Name : Applicant Tracking System v1.0.0
 *
 */
