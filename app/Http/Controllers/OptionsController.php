<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Common;
use Myhelper;

class OptionsController extends Controller
{
    /******************
     * Dropdown Options
     *****************/

    public function getMunicipal($provid)
    {
        $data = Common::getMunicipal($provid);

        $output = '<option></option>';
        foreach($data as $mun) :
            $output .= '<option value="'. $mun->Municipal_ID .'">'. $mun->Municipal .'</option>';
        endforeach;

        echo $output;
    }

    public function getBarangay($munid)
    {
        $data = Common::getBarangay($munid);

        $output = '<option></option>';
        foreach($data as $brgy) :
            $output .= '<option value="'. $brgy->Barangay_ID .'">'. $brgy->Barangay .'</option>';
        endforeach;

        echo $output;
    }

    public function getSeasonalDateEnd($date)
    {
        $output = '<option></option>';
        $output .= '<option value="' . Myhelper::addDaysToDate($date, 30) . '">' . Myhelper::addDaysToDate($date, 30) . ' (30 Days)';
        $output .= '<option value="' . Myhelper::addDaysToDate($date, 60) . '">' . Myhelper::addDaysToDate($date, 60) . ' (60 Days)';
        $output .= '<option value="' . Myhelper::addDaysToDate($date, 90) . '">' . Myhelper::addDaysToDate($date, 90) . ' (90 Days)';

        echo $output;
    }

    public function getPRF(Request $request)
    {

        $param = [
            $request->segment(2),
            $request->segment(3)
        ];

        $data = Common::getPRF($param);

        $output = '<option></option>';
        foreach($data as $prf) :
            $output .= '<option value="'. $prf->Record_ID .'">'. $prf->ControllNumber .'</option>';
        endforeach;

        echo $output;

    }
}
