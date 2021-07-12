<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Authentication;
use Illuminate\Support\Facades\Session;
use Myhelper;

class AuthController extends Controller
{
    public function index()
    {
        $id     = request()->input('id');
        $empID  = MyHelper::decryptSHA256($id);
        $result = Authentication::getUserDetails($empID);
        $uRole  = Authentication::userRole($result[0]->Usr_ID);

        // dd($id);

        Session::put('Usr_ID', base64_encode($result[0]->Usr_ID));
        Session::put('Emp_Id', base64_encode($result[0]->Emp_ID));
        Session::put('EmpNo', base64_encode($result[0]->EmployeeNo));
        Session::put('Role_ID', base64_encode($uRole[0]->Role_ID));
        Session::put('Emp_Name', base64_encode($result[0]->empl_name));
        Session::put('PositionLevelCode', base64_encode($uRole[0]->PositionLevelCode));
        Session::put('PositionLevel_ID', base64_encode($result[0]->PositionLevel_ID));
        Session::put('DivisionCode', base64_encode($uRole[0]->DivisionCode));
        Session::put('Division_ID', base64_encode($uRole[0]->Division_ID));
        Session::put('Company_ID', base64_encode($uRole[0]->Company_ID));
        Session::put('Department_ID', base64_encode($result[0]->Department_ID));
        Session::put('DepartmentCode', base64_encode($uRole[0]->DepartmentCode));
        Session::put('Department', base64_encode($result[0]->Department));
        Session::put('Location_ID', base64_encode($result[0]->Location_ID));
        Session::put('LocationCode', base64_encode($result[0]->LocationCode));
        Session::put('Location', base64_encode($result[0]->Location));
        Session::save();

        if(base64_decode(Session::get('Department_ID')) == config('app.hr_dept_id')) :
            return Redirect::to('/');
        elseif(base64_decode(Session::get('Role_ID')) == config('app.admin_role')) :
            return Redirect::to('/');
        else :
            abort(401);
        endif;
    }

    public function logout()
    {
        Session::flush();

        return Redirect::to(config('app.myhub_logout_url'));
    }
}
