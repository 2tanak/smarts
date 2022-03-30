<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Entity\Actions\StudentRegistrationAction;
use App\User;

class RegistrationController extends Controller {
    function index (Request $request){
        $ar = array();
        $ar['title'] = trans('front_main.title.registration');
	
        return viewMode('user.registration', $ar);
    }

    function save(Request $request, $lang){
        $action = new StudentRegistrationAction(new User(), $request);
         
        try {
            $action->run();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->to(lroute('student_login'))->with('success', trans('front_main.message.success_registration'));
    }

}
