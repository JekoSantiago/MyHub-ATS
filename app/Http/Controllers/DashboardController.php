<?php

namespace App\Http\Controllers;
use App\Models\Dashboard;
use Myhelper;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Get JSON hire source count
     */
    public function hireSourceCount(Request $request)
    {

        echo json_encode(Dashboard::getHireSourceCount([$request->year]));
    }

    /**
     * Fetch hr usage server side
     */
    public function getSSHRUsage(Request $request)
    {
        $date  = explode(' to ', $request->daterange);

        $draw     = $request->draw;
        $search   = $request->search;

        if($draw == 1) :
            $datefrom = date('Y-m-01', strtotime(date("Y-m-d")));
            $dateto   = date('Y-m-t', strtotime(date("Y-m-d")));
        else :
            $datefrom = $date[0];
            $dateto   = ( $date[1] ?? $date[0] );
        endif;

        $result = Dashboard::getHREmployeeUsage($search, $datefrom, $dateto);
        $count = count($result);
        $encode = array();

        if ($count > 0) :
            foreach ($result as $items) :
                $encode[] = array_map('utf8_encode', (array)$items);
            endforeach;
        endif;

        echo MyHelper::buildJsonTable($count, $encode);
    }
}
