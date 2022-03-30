<?php

namespace App\Http\Controllers\Main\Univer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Entity\Model\University\University;

use Modules\Entity\Model\Comuna\Comuna;
use Modules\Entity\Model\ComunaMessage\ComunaMessage;


use Modules\Entity\Actions\ComunaCreateAction;
use Modules\Entity\Actions\ComunaAnswerAction;
use Session;


class ComminityController extends Controller {
    function index (Request $request, $lang, University $univer){
        $ar = array();
        $ar['title'] = trans('front_main.univer.community');
        $ar['request'] = $request;
        $ar['univer'] = $univer;
        $ar['comunas'] = Comuna::where('univer_id', $univer->id)->accepted()->latest()->paginate(24);
        
        return viewMode('univer.comuna.index', $ar);
    }

    function detail(Request $request, $lang, University $univer, Comuna $comuna){
        $ar = array();
        $ar['title'] = trans('front_main.univer.community');
        $ar['request'] = $request;
        $ar['univer'] = $univer;
        $ar['comuna'] = $comuna;
        $ar['comuna_messages'] = ComunaMessage::where('comuna_id', $comuna->id)->accepted()->latest()->paginate(24);
        
        return viewMode('univer.comuna.detail', $ar);
    }

    function add(Request $request, $lang, University $univer){
        $action = new ComunaCreateAction(new Comuna(), $request);
         
        try {
            $action->run($univer);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', trans('front_main.message.add_new_comena'));
    }

    function detailAdd(Request $request, $lang, University $univer, Comuna $comuna){
        $action = new ComunaAnswerAction(new ComunaMessage(), $request);
         
        try {
            $action->run($univer, $comuna);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', trans('front_main.message.add_new_comena_asnwer'));
    }

    

}
