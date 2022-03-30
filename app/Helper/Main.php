<?php
use App\Helper\CurrentLang;
use App\Helper\CurrentViewMode;

function lroute($route, $param = null){
    $lang = CurrentLang::get();

    if (is_array($param))
        array_unshift($param, $lang);

    else if (!$param)
        $param = $lang;
    else
        $param = [$lang, $param];

    $new_route = CurrentViewMode::get().'.'.$route;

    if(!Route::has($new_route) && !Route::has($route)){
       return '#route-note-exsist';
    }
    elseif (Route::has($route)){
        return route($route, $param);
    }

    return route($new_route, $param);
}

function fileLink($v){
    if (!$v || $v == '' || trim($v) == '')
        return '/admin-asset/assets/images/placeholder.jpg';


    return env('FILE_SERVER_URL').'/'.$v;
}

function checkFilterParam($request){
    $url = $request->url();
    $ar_param = $request->all();

    if (count($ar_param) > 0 && ($request->save_filter == 1 || $request->page > 0)){

        $saved = str_replace("save_filter=1", "", $request->fullUrl());

        session(['filter_'.$url => $saved]);
        session()->save();

        return false;
    }

    if ($request->clear_filter == 1){
        session()->forget('filter_'.$url);
        session()->save();

        return redirect()->to($url);
    }

    if (count($ar_param) == 0 && session('filter_'.$url)) {
        return redirect()->to(session('filter_'.$url));
    }


    return false;
}

function viewMode($view_path, $ar){
    return view('main.'.CurrentViewMode::get().'.'.$view_path, $ar);
}


function changeViewModeUrl(){
    $route_name = \Request::route()->getName();

    if (strpos($route_name, "desktop.") !== false)
        return route(str_replace("desktop.", "phone.", $route_name), \Route::current()->parameters());

    if (strpos($route_name, "phone.") !== false)
        return route(str_replace("phone.", "desktop.", $route_name), \Route::current()->parameters());

    return $route_name;

}
