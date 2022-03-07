<?php

class Myhelper
{
    //public static function errorMessages($num)
    public static function errorMessages($return)
    {
        $error = array(
            -1 => '',
            -2 => 'Applicant already exists.',
            -3 => '',
            -4 => 'Hire Status does not exist.',
            -5 => '',
            -6 => 'Tax Code does not exist.',
            -7 => '',
            -8 => 'Position does not exist.',
            -9 => '',
            -10 => 'Barangay does not exist.',
            -11 => '',
            -12 => 'Municipal does not exist.',
            -13 => '',
            -14 => 'Province does not exist.',
            -15 => '',
            -16 => 'Birth Town does not exist',
            -17 => '',
            -18 => 'User does not exist.',
            -19 => 'User does not exist.',
            -20 => '',
            -21 => '',
            -22 => 'Applicant does not exist.',
            -23 => 'Applicant already exists.',
            -24 => '',
            -25 => 'Hire Status does not exist.',
            -26 => '',
            -27 => 'Tax Code does not exist.',
            -28 => '',
            -29 => 'Position does not exist.',
            -30 => '',
            -31 => 'Barangay does not exist.',
            -32 => '',
            -33 => 'Municipal does not exist.',
            -34 => '',
            -35 => 'Province does not exist.',
            -36 => '',
            -37 => 'Birth Town does not exist.',
            -38 => '',
            -39 => 'User does not exist.',
            -40 => 'User does not exist.',
            -41 => '',
            -42 => '',
            -43 => 'Contact does not exist.',
            -44 => '',
            -45 => 'User does not exist.',
            -46 => 'User does not exist.',
            -47 => '',
            -48 => '',
            -49 => 'Applicant does not exist.',
            -50 => '',
            -51 => 'Contact Type does not exist.',
            -52 => '',
            -53 => 'Contact already exists',
            -54 => '',
            -55 => 'User does not exist.',
            -56 => 'User does not exist.',
            -57 => '',
            -58 => '',
            -59 => 'Applicant does not exist.',
            -60 => '',
            -61 => 'Contact Type does not exist.',
            -62 => '',
            -63 => 'Contact already exists',
            -64 => '',
            -65 => 'User does not exist.',
            -66 => 'User does not exist.',
            -67 => '',
            -68 => '',
            -69 => 'Applicant School does not exist.',
            -70 => '',
            -71 => 'User does not exist.',
            -72 => 'User does not exist.',
            -73 => '',
            -74 => '',
            -75 => 'Applicant does not exist.',
            -76 => '',
            -77 => 'School already exists',
            -78 => '',
            -79 => 'School already exists',
            -80 => '',
            -81 => 'User does not exist.',
            -82 => 'User does not exist.',
            -83 => '',
            -84 => '',
            -85 => 'Applicant does not exist.',
            -86 => '',
            -87 => 'Applicant School does not exist.',
            -88 => '',
            -89 => 'School already exists',
            -90 => '',
            -91 => 'School already exists',
            -92 => '',
            -93 => 'User does not exist.',
            -94 => 'User does not exist.',
            -95 => '',
            -96 => '',
            -97 => 'Applicant does not exist.',
            -98 => '',
            -99 => 'Applicant already exists',
            -100 => '',
            -101 => 'Company does not exist.',
            -102 => '',
            -103 => 'Location does not exist.',
            -104 => '',
            -105 => 'Payroll Mode does not exist.',
            -106 => '',
            -107 => 'Clinic does not exist.',
            -108 => '',
            -109 => 'Employee No Already Exists',
            -110 => '',
            -111 => 'Employee No Already Exists',
            -112 => '',
            -113 => 'User does not exist.',
            -114 => 'User does not exist.',
            -115 => '',
            -116 => '',
            -117 => 'Hire does not exist.',
            -118 => '',
            -119 => 'Company does not exist.',
            -120 => '',
            -121 => 'Location does not exist.',
            -122 => '',
            -123 => 'Payroll Mode does not exist.',
            -124 => '',
            -125 => 'Clinic does not exist.',
            -126 => '',
            -127 => 'Employee No Already Exists',
            -128 => '',
            -129 => 'Employee No Already Exists',
            -130 => '',
            -131 => 'User does not exist.',
            -132 => 'User does not exist.',
            -133 => '',
            -134 => '',
            -135 => 'Applicant does not exist.',
            -136 => '',
            -137 => 'Initial Employee does not exist.',
            -138 => '',
            -139 => 'Second Employee does not exist.',
            -140 => '',
            -141 => 'Final Employee does not exist.',
            -142 => '',
            -143 => 'User does not exist.',
            -144 => 'User does not exist.',
            -145 => '',
            -146 => '',
            -147 => 'Interview does not exist.',
            -148 => '',
            -149 => 'Initial Employee does not exist.',
            -150 => '',
            -151 => 'Second Employee does not exist.',
            -152 => '',
            -153 => 'Final Employee does not exist.',
            -154 => 'User does not exist.',
            -155 => '',
            -156 => '',
            -157 => 'Previous Work does not exist.',
            -158 => '',
            -159 => 'User does not exist.',
            -160 => 'User does not exist.',
            -161 => '',
            -162 => '',
            -163 => 'Employee does not exist.',
            -164 => '',
            -165 => 'Previous Work already exists',
            -166 => 'User does not exist.',
            -167 => 'User does not exist.',
            -168 => 'User does not exist.',
            -169 => '',
            -170 => '',
            -171 => 'Previous Work does not exist.',
            -172 => '',
            -173 => 'Prev Work already exists',
            -174 => '',
            -175 => 'User does not exist.',
            -176 => 'User does not exist.',
            -177 => '',
            -178 => '',
            -179 => 'Hire does not exist.',
            -180 => '',
            -181 => 'User does not exist.',
            -182 => 'User does not exist.',
            -183 => '',
            -184 => '',
            -185 => 'Hire does not exist.',
            -186 => '',
            -187 => 'User does not exist.',
            -188 => 'User does not exist.',
            -189 => '',
            -190 => '',
            -191 => 'Applicant does not exist.',
            -192 => '',
            -193 => 'Applicant already exists!',
            -194 => '',
            -195 => 'Specific program has already reached its maximum attendees.',
            -196 => '',
            -197 => 'User does not exist.',
            -198 => 'User does not exist.',
            -199 => '',
            -200 => '',
            -201 => 'Applicant does not exist.',
            -202 => '',
            -203 => 'Program does not exist',
            -204 => '',
            -205 => 'User does not exist.',
            -206 => 'User does not exist.',
            -207 => '',
            -208 => '',
            -209 => 'Employment Type does not exist',
            -210 => '',
            -211 => 'Employment Type does not exist',
        );

        //$result = 'Database or Server error. (Error Code: ' . $num . ')';

        if(!empty($error[$return])) :
            $result = $error[$return] . ' (Error Code: ' . $return . ')';
        else :
            $result = 'Database Error. (Error Code: ' . $return . ')';
        endif;

        return $result;
    }

    /**
     * Encrypt SHA256 with hashkey
     */
    public static function encryptSHA256($content, $hashKey = null)
    {
        if ($hashKey == null || $hashKey == '') {
            $hashKey = 'atp_dev';
        }

        $METHOD = 'aes-256-cbc';
        $IV = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
        $key = substr(hash('sha256', $hashKey, true), 0, 32);
        $encrypt = base64_encode(openssl_encrypt($content, $METHOD, $key, OPENSSL_RAW_DATA, $IV));

        return $encrypt;
    }

    /**
     * Decrypt SHA256 with hashkey
     */
    public static function decryptSHA256($content, $hashKey = null)
    {
        if ($hashKey == null || $hashKey == '') {
            $hashKey = 'atp_dev';
        }

        $METHOD = 'aes-256-cbc';
        $IV = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
        $key = substr(hash('sha256', $hashKey, true), 0, 32);
        $decrypted = openssl_decrypt(base64_decode($content), $METHOD, $key, OPENSSL_RAW_DATA, $IV);

        return $decrypted;
    }

    public static function buildJsonTable($count, $encode)
    {
        $draw = request()->input('draw');
        $start = request()->input('start');
        $length = request()->input('length');
        $pageSize = ($length != null ? $length :0);
        $skip = ($start != null ? $start : 0);
        $recordsTotal = $count;
        $data = array_slice($encode, $skip, $pageSize);

        return '{"draw":"'.$draw.'","recordsFiltered":'.$recordsTotal.',"recordsTotal":'.$recordsTotal.',"data":'.json_encode($data).'}';
    }

    public static function checkModuleAccess(array $moduleRole, $action)
    {
        $bool = FALSE;

        foreach($moduleRole as $mr) :
            if( $mr->Action_ID == config('app.action_all') || $mr->Action_ID = $action) :
                $bool = TRUE;
            endif;
        endforeach;

        return $bool;
    }

    public static function checkPosition($posID)
    {
        if($posID == config('app.store_crew')) :
            return TRUE;
        elseif($posID == config('app.shift_leader')) :
            return TRUE;
        elseif($posID == config('app.store_sup')) :
            return TRUE;
        elseif($posID == config('app.ass_store_sup')) :
            return TRUE;
        elseif($posID == config('app.site_dev_ass')) :
            return TRUE;
        elseif($posID == config('app.site_dev_sup')) :
            return TRUE;
        elseif($posID == config('app.ops_plan_cont')) :
            return TRUE;
        elseif($posID == config('app.area_manager')) :
            return TRUE;
        else :
            return FALSE;
        endif;
    }

    public static function checkResult($posID, array $data)
    {
        $parent  = config('app.prog_sc');
        $result  = 0;
        $text    = 'No record';
        $icon    = 'mdi-checkbox-blank-outline';
        $bool    = TRUE;


        $sl = array(
            config('app.shift_leader'),
            config('app.store_sup'),
            config('app.site_dev_sup'),
            config('app.ass_store_sup'),
            config('app.area_manager'),
            config('app.ops_plan_cont')
        );

        if (count($data) > 0) :

            // dump($data[0]->Parent_Program_ID == config('app.prog_am'),$data);
            $result = $data[0]->Recommendation_ID;
            if ($data[0]->Recommendation != null) :
                $text = $data[0]->Recommendation;

                if ($data[0]->Parent_Program_ID == config('app.prog_sc')) :
                    if ($result == 2 || $result == 5) :
                        $parent = config('app.prog_sc');
                        $bool = TRUE;
                        $icon = 'mdi-checkbox-intermediate';
                    elseif ($result == 1) :
                        if (in_array($posID, $sl)) :
                            $parent  = config('app.prog_sl');
                            $bool = TRUE;
                            $icon = 'mdi-checkbox-intermediate text-warning';
                        else :
                            $bool = FALSE;
                            $icon = 'mdi-checkbox-marked-outline text-success';
                        endif;
                    else :
                        $bool = FALSE;
                        $icon = 'mdi-close-box-outline text-danger';
                    endif;
                elseif($data[0]->Parent_Program_ID == config('app.prog_sl')) :
                    if ($result == 2 || $result == 5) :
                        $parent  = config('app.prog_sl');
                        $bool = TRUE;
                        $icon = 'mdi-checkbox-intermediate text-warning';
                    elseif($result == 1 && $posID != config('app.shift_leader')) :
                        $parent  = config('app.prog_ac');
                        $bool = TRUE;
                        $icon = 'mdi-checkbox-marked-outline text-warning';
                    elseif($result == 1) :
                        $bool = FALSE;
                        $icon = 'mdi-checkbox-marked-outline text-success';
                    else:
                        $bool = FALSE;
                        $icon = 'mdi-close-box-outline text-danger';
                    endif;

                elseif($data[0]->Parent_Program_ID == config('app.prog_ac')) :
                    if ($result == 2 || $result == 5) :
                        $parent  = config('app.prog_ac');
                        $bool = TRUE;
                        $icon = 'mdi-checkbox-intermediate text-warning';
                        elseif($result == 1 && $posID != config('app.ass_store_sup')) :
                            $parent  = config('app.prog_am');
                            $bool = TRUE;
                            $icon = 'mdi-checkbox-marked-outline text-warning';
                        elseif($result == 1) :
                            $bool = FALSE;
                            $icon = 'mdi-checkbox-marked-outline text-success';
                    else:
                        $bool = FALSE;
                        $icon = 'mdi-close-box-outline text-danger';
                    endif;
                elseif($data[0]->Parent_Program_ID == config('app.prog_am')) :
                    if ($result == 2 || $result == 5) :
                        $parent  = config('app.prog_am');
                        $bool = TRUE;
                        $icon = 'mdi-checkbox-intermediate text-warning';
                    elseif($result == 1) :
                        $bool = FALSE;
                        $icon = 'mdi-checkbox-marked-outline text-success';
                    else:
                        $bool = FALSE;
                        $icon = 'mdi-close-box-outline text-danger';
                    endif;
                endif;
            else :
                if (count($data) > 1) :
                    $text = $data[1]->Recommendation;
                else:
                    $text = 'No ratings';
                endif;
                $bool = FALSE;
                $icon = 'mdi-checkbox-intermediate text-warning';
            endif;
        endif;

        $info = array(
            'parent' => $parent,
            'bool'   => $bool,
            'result' => $result,
            'text'   => $text,
            'icon'   => $icon
        );

        return $info;
    }

    public static function checkInterview( array $data )
    {
        $status = -1;
        $icon = 'mdi-checkbox-blank-outline';
        $text = 'No record';
        $count = count($data);

        if( $count > 0) :
            if($data[0]->InitialPassed == 1) :
                $text = 'Initial Passed';
                $status = 1;
                $icon = 'mdi-checkbox-marked-outline text-success';
                if($data[0]->SecondPassed != null) :
                    if($data[0]->SecondPassed == 1) :
                        $text = 'Second Passed';
                        $status = 1;
                        $icon = 'mdi-checkbox-marked-outline text-success';
                        if($data[0]->FinalPassed != null) :
                            if($data[0]->FinalPassed == 1) :
                                $text = 'Final Passed';
                                $status = 1;
                                $icon = 'mdi-checkbox-marked-outline text-success';
                            else :
                                $text = 'Final Failed';
                                $status = 0;
                                $icon = 'mdi-close-box-outline text-danger';
                            endif;
                        endif;
                    else :
                        $text = 'Second Failed';
                        $status = 0;
                        $icon = 'mdi-close-box-outline text-danger';
                    endif;
                endif;
            else:
                $text = 'Initial Failed';
                $status = 0;
                $icon = 'mdi-close-box-outline text-danger';
            endif;
        endif;

        $info = array(
            'icon'   => $icon,
            'text'   => $text,
            'status' => $status
        );

        return $info;
    }

    public static function checkAccessSecondInterview( array $data )
    {
        $secondDisable = '';
        $count = count($data);

        if($count > 0) :
            if( $data[0]->wInitial  == 1 ) :
                if( $data[0]->InitialPassed == 0):
                    $secondDisable = 'disabled';
                endif;
            else :
                $secondDisable = 'disabled';
            endif;
        else :
            $secondDisable = 'disabled';
        endif;

        return $secondDisable;
    }

    public static function checkAccessThirdInterview( array $data )
    {
        $thirdDisable = '';
        $count = count($data);

        if($count > 0) :
            if( $data[0]->w2nd  == 1 ) :
                if( $data[0]->SecondPassed == 0):
                    $thirdDisable = 'disabled';
                endif;
            else :
                $thirdDisable = 'disabled';
            endif;
        else :
            $thirdDisable = 'disabled';
        endif;

        return $thirdDisable;
    }

    public static function checkVisibleCompleteReq($app, $employment)
    {
        $positionID  = $app[0]->Position_ID;
        $sss         = $app[0]->SSS;
        $philhealth  = $app[0]->PhilHealth;
        $hdmf        = $app[0]->HDMF;
        $tin         = $app[0]->TIN;
        $empNo       = $employment[0]->EmployeeNo;
        $superiorID  = $employment[0]->SuperiorID;
        $medDate     = $employment[0]->DateMedical;
        $clinicID    = $employment[0]->Clinic_ID;
        $physician   = $employment[0]->Physician;
        $medResultID = $employment[0]->ResultType;
        $companyID   = $employment[0]->Company_ID;
        $locID       = $employment[0]->Location_ID;
        $hireDate    = $employment[0]->DateHired;
        $payType     = $employment[0]->PayrollType;
        $payModeID   = $employment[0]->PayrollMode_ID;
        $basic       = $employment[0]->Basic;
        $isDeployed  = $employment[0]->isDeployed;
        $visible     = TRUE;

        if( $isDeployed == 0 ) :
            if($positionID == config('app.store_crew')) :
                if( $sss != ''        && $philhealth != '' && $hdmf != ''     && $tin != ''       && $empNo != ''       &&
                    $superiorID != '' && $medDate != ''    && $clinicID != '' && $physician != '' && $medResultID != '' &&
                    $companyID != ''  && $locID != ''      && $hireDate != '' && $payType != ''   && $payModeID != ''   &&
                    $basic != '' ) :

                    $visible = TRUE;
                else :
                    $visible = FALSE;
                endif;
            else:
                if( $sss != ''         && $philhealth != '' && $hdmf != ''     && $tin != ''       &&
                    $superiorID != ''  && $medDate != ''    && $clinicID != '' && $physician != '' &&
                    $medResultID != '' && $companyID != ''  && $locID != ''    && $hireDate != ''  &&
                    $payType != ''     && $payModeID != ''  && $basic != '') :

                    $visible = TRUE;
                else :
                    $visible = FALSE;
                endif;
            endif;
        else :
            $visible = FALSE;
        endif;

        return $visible;
    }

    public static function checkEnableEmpInput($app, $app_int, $checkTraining)
    {
        $position    = $app[0]->Position_ID;
        $appStatus   = $app[0]->HireStatus_ID;
        $applyDate   = $app[0]->DateApply;
        $medResult   = $app[0]->ResultType;
        $isDeploy    = $app[0]->isDeployed;
        $intResult   = Myhelper::checkInterview($app_int);
        $trainResult = Myhelper::checkResult($position, $checkTraining);
        $enable      = '';

        if($isDeploy == 0) :
            if(in_array($position, config('app.pos_with_training'))) :
                if(Myhelper::convertStringToDate($applyDate) < Myhelper::convertStringToDate(config('app.date_restriction'))) :
                    if($appStatus == 1 && $intResult['status'] == 1 && in_array($medResult, config('app.passed_medical'))) :
                        $enable = '';
                    else:
                        $enable = 'disabled';
                    endif;
                else:
                    if($appStatus == 1 && $intResult['status'] == 1 && $trainResult['result'] == 1 && in_array($medResult, config('app.passed_medical'))) :
                        $enable = '';
                    else:
                        $enable = 'disabled';
                    endif;
                endif;
            else :
                if($appStatus == 1 && $intResult['status'] == 1 && in_array($medResult, config('app.passed_medical'))) :
                    $enable = '';
                else:
                    $enable = 'disabled';
                endif;
            endif;
        else:
            $enable = 'disabled';
        endif;

        return $enable;
    }

    public static function checkEnableEmpOtherInput($isWithRequirements)
    {
        $enable = '';

        if($isWithRequirements == 1) :
            $enable = 'disabled';
        endif;

        return $enable;
    }

    public static function contactIcon($contactType_ID)
    {
        $icon = '';
        if ($contactType_ID == 1) :
            $icon = "mdi mdi-phone";
        elseif ($contactType_ID == 2) :
            $icon = "mdi mdi-cellphone";
        else :
            $icon = "mdi mdi-email";
        endif;

        return $icon;
    }

    public static function medicalResultIcon($resulType_ID)
    {
        $medicon = 'mdi-checkbox-blank-outline';

        if($resulType_ID != '')
        {
            if($resulType_ID < 4)
            {
                $medicon = 'mdi-checkbox-marked-outline text-success';
            }
            else
            {
                $medicon = 'mdi-close-box-outline text-danger';
            }
        }

        return $medicon;
    }

    public static function AFHIcon($AFHDate)
    {
        $afhicon = 'mdi-checkbox-blank-outline';

        if($AFHDate != NULL)
        {
            $afhicon = 'mdi-checkbox-marked-outline text-success';
        }

        return $afhicon;
    }

    public static function reqIcon($req)
    {
        $reqicon = 'mdi-checkbox-blank-outline';

        if($req == 1)
        {
            $reqicon = 'mdi-checkbox-marked-outline text-success';
        }

        return $reqicon;
    }


    public static function appStatusIcon($hireStatus_ID)
    {
        $icon = 'mdi-checkbox-blank-outline';

        if($hireStatus_ID == 1)
        {
            $icon = 'mdi-checkbox-marked-outline text-success';
        }
        elseif($hireStatus_ID == 2)
        {
            $icon = 'mdi-close-box-outline text-danger';
        }
        else
        {
            $icon = 'mdi-checkbox-intermediate text-warning';
        }

        return $icon;
    }

    public static function convertStringToDate($date)
    {
        $newformat = date('Y-m-d',strtotime($date));

        return $newformat;
    }

    public static function addDaysToDate($date, $days)
    {
        $newdate = date('Y-m-d',strtotime($date. ' + '. $days . ' days'));

        return $newdate;
    }

    public static function minusDaysToDate($date, $days)
    {
        $newdate = date('Y-m-d',strtotime($date. ' - '. $days . ' days'));

        return $newdate;
    }
}

/* End of file Myhelper.php
 * Location: ./app/Helpers/Myhelper.php
 *
 * Author: Jose Lorenzo D. Tambagan
 * Created Date: January 08 2021
 * Project Name : Applicant Tracking System v1.0.0
 *
 */
