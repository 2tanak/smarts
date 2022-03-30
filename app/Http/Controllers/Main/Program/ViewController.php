<?php

namespace App\Http\Controllers\Main\Program;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Entity\Model\Program\Program;


class ViewController extends Controller {
    function index (Request $request, $lang, Program $program){
        $ar = array();
        $ar['title'] = trans('front_main.title.program_view');
        $ar['request'] = $request;
        $ar['program'] = $program;
        $ar['univer'] = $program->relUniversity;

        return viewMode('program.view', $ar);
    }

    function discpline (Request $request, $lang, Program $program){
        $ar = array();
        $ar['title'] = trans('front_main.title.program_view_discpline');
        $ar['request'] = $request;
        $ar['program'] = $program;
        $ar['univer'] = $program->relUniversity;

        return viewMode('program.discpline', $ar);
    }

    function howEnter (Request $request, $lang, Program $program){
        $ar = array();
        $ar['title'] = trans('front_main.title.program_view_how_enter');
        $ar['request'] = $request;
        $ar['program'] = $program;
        $ar['univer'] = $program->relUniversity;

        return viewMode('program.how_enter', $ar);
    }

}
