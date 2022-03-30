<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Services\UploadPhoto;
use App\User;
use Hash;

class ProfileController extends Controller {
    function index(Request $request){
        $ar = array();
        $ar['title'] = 'Профиль';
        $ar['action'] = route('admin_profile_save');
        $ar['request'] = $request;
        $ar['user'] = $request->user();

        return view('admin::page.profile', $ar);
    }

    function save(Request $request){
        $user = $request->user();
        if (User::where('email', $request->email)->where('id', '<>', $user->id)->count() > 0)
            return redirect()->back()->with('error', 'Указанный почтовый адрес уже есть');

        if ($request->new_pass && !Hash::check($request->old_pass, $user->password))
            return redirect()->back()->with('error', 'Указанный старый пароль не действителен');
    
        
        if ($request->has('photo'))
            $user->photo = UploadPhoto::upload($request->photo);

        $user->password = Hash::make($request->new_pass);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with('success', 'Все сохранено');
    }

}
