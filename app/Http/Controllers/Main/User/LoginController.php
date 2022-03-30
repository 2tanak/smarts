<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Hash;
use Auth;
use Modules\Entity\Model\SysUserType\SysUserType;


class LoginController extends Controller {
    function index (Request $request){
        $ar = array();
        $ar['title'] = trans('front_main.title.enter');
        
        return viewMode('user.login', $ar);
    }

    function check(Request $request, $lang){
        $user = User::where(['email' => $request->input('email')])->whereIn('type_id', [SysUserType::USER,SysUserType::MODERATOR,SysUserType::MANAGER,SysUserType::ADMIN])->first();
        if (!$user)
            return back()->with('error', trans('front_main.message.wrong_access'));
        if (!Hash::check($request->password, $user->password))
            return back()->with('error', trans('front_main.message.wrong_access'));

        Auth::loginUsingId($user->id, true);

        if (!$user->isUser())
            return redirect()->route('admin_index'); 

        return redirect()->to(lroute('student_profile')); 
    }

    function logout(Request $request){
        Auth::logout();
       
        return redirect()->to(lroute('index')); 
    }

}
