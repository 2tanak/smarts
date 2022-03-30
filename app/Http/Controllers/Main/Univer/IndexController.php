<?php

namespace App\Http\Controllers\Main\Univer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Entity\Model\University\University;

use App\Services\FilterLib;

class IndexController extends Controller {
    function index (Request $request){
	
        $ar = array();
        $ar['title'] = trans('front_main.title.univer');
        $ar['request'] = $request;
        $ar['filter_lib'] = FilterLib::get();
        $ar['univers'] = University::filter($request)->latest()->paginate(24);
	
		return viewMode('univer.index', $ar);
    }

}
