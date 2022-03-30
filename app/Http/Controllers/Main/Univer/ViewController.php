<?php

namespace App\Http\Controllers\Main\Univer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Entity\Model\University\University;
use Modules\Entity\Model\Program\Program;
use App\Services\FilterLib2;

class ViewController extends Controller {
	function index(Request $request, $lang, University $univer) {
		$ar = array();
		$ar['title'] = $univer->name;
		$ar['request'] = $request;
		$ar['univer'] = $univer;

		return viewMode('univer.view', $ar);
	}

	function studenLife(Request $request, $lang, University $univer){
		$ar = array();
		$ar['title'] = trans('front_main.title.univer_view_student_life');
		$ar['request'] = $request;
        $ar['univer'] = $univer;
        
		return viewMode('univer.student_life', $ar);
	}

	function programs(Request $request, $lang, University $univer){
		$ar = array();
		$ar['title'] = trans('front_main.title.univer_view_programs');
		$ar['request'] = $request;
		$ar['univer'] = $univer;
		$ar['program_model'] = new Program();

		$ar['programs'] = $univer->relPrograms()->filter($request)->latest()->paginate(10);
		$ar['filter_lib'] = FilterLib2::get();
		
	   
       return viewMode('univer.programs', $ar);
	}
}
