<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Entity\Actions\ProfileSaveAction;

class ProfileController extends Controller {
    function index (Request $request){
        $ar = array();
        $ar['title'] = trans('front_main.title.profile');
        $ar['user'] = $request->user();
        $ar['student_data'] = $request->user()->relStudentData()->firstOrCreate(['user_id'=>$request->user()->id]);

        return viewMode('user.profile', $ar);
    }

    function save(Request $request, $lang){
        $action = new ProfileSaveAction($request->user(), $request);
         
        try {
            $action->run();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', trans('front_main.message.profile_save'));
    }

}
