<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Authentication extends Model
{
    public static function getUserDetails($empId)
    {
        $id = 0;
        $empNo = '';
        $active = 1;
        $result = DB::connection('dbUserMgt')->select('EXEC sp_User_Get ?, ?, ?, ?', [ $id, $empNo, $active, $empId ]);

        return $result;
    }

    public static function userRole($usrID)
    {
        $id = 0;
        $roleID = 0;
        $result = DB::connection('dbUserMgt')->select('EXEC sp_User_UserRole_Get ?, ?, ?', [ $id, $roleID, $usrID ]);

        return $result;
    }

    public static function userAccess($moduleID)
    {
        $applicationID = config('app.app_tracker');
        $roleID = base64_decode(Session::get('Role_ID'));
        $result = DB::connection('dbUserMgt')->select('EXEC sp_User_ModuleRole_Get ?, ?, ?, ?', [ 0, $applicationID, $moduleID, $roleID]);

        return $result;
    }
}
