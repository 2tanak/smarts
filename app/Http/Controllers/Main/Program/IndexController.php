<?php

namespace App\Http\Controllers\Main\Program;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Entity\Model\Program\Program;
use App\Services\FilterLib;

class IndexController extends Controller {
    function index (Request $request){
        $ar = array();
        $ar['title'] = trans('front_main.title.program');
        $ar['request'] = $request;
        $ar['filter_lib'] = FilterLib::get();
        $ar['programs'] = Program::filter($request)->paginate(24);
        
        return viewMode('program.index', $ar);
    }

}
