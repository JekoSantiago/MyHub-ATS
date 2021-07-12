<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use Myhelper;

class TrainingController extends Controller
{
    /**
     * Fetch trainings server side
     */
    public function getSSTrainings(Request $request)
    {
        $date  = explode(' to ', $request->daterange);

        $data['program']  = $request->program;
        $data['datefrom'] = $date[0];
        $data['dateto']   = ( $date[1] ?? $date[0] );
        
        $result = Training::getAllTrainings($data);
        $count = count($result);
        $encode = array();

        if ($count > 0) :
            foreach ($result as $items) :
                $encode[] = array_map('utf8_encode', (array)$items);
            endforeach;
        endif;
        
        echo MyHelper::buildJsonTable($count, $encode);
    }

    /**
     * Load enrolled applicants modal body
     */
    public function showEnrolledApp($progID)
    {
        $data['prog'] = '';
        $data['applicants'] = Training::getEnrolledApplicants($progID);

        return view('pages.trainings.modals.content.enrolled_applicants', $data);
    }
}
