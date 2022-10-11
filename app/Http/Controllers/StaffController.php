<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Staff;



class StaffController extends Controller
{
    public function register(Request $request){
        $staff = new Staff();
        $staff->name = $request->input('name');
        $staff->email = $request->input('email');
        $staff->password = $request->input('password');
        $staff->login_type = $request->input('login_type');
        $staff->save();
        return $staff;
    }
    public function login(Request $request){
        $staff = Staff::where(
            [
                ['email', '=',$request->email],
                ['password', '=',$request->password],
                ['login_type', '=',$request->login_type],
            ]
        )->first();
       

       // print_r($staff);exit;
        if($staff){
            $staff['status'] ='success';
        }
       // return $staff;
        if(!$staff) {
            return ["ERROR"=>"Invalid credentials."];
        }
        return $staff;

    }
}
