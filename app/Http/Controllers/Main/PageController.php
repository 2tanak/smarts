<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request
;
use Modules\Entity\Model\ContentPage\ContentPage;
use Modules\Entity\Actions\MainSaveAction;
use Modules\Entity\Model\ContentQuestion\ContentQuestion;
use Modules\Entity\Model\ContentFaq\ContentFaq;

use Modules\Entity\Model\ContentMessage\ContentMessage;
use Modules\Entity\Model\ContentContact\ContentContact;
use Modules\Entity\Model\ContentMap\ContentMap;

class PageController extends Controller {
    function contact (Request $request){
        $ar = array();
        $ar['title'] = trans('front_main.title.contact');
        $ar['items'] = ContentContact::latest()->take(2)->get();
        $ar['map'] = ContentMap::firstOrCreate([]);

        return viewMode('page.contact', $ar);
    }

    function saveContact(Request $request){
        $action = new MainSaveAction(new ContentMessage(), $request);
         
        try {
            $action->run();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', trans('front_main.message.save_message'));
    }

    function about (Request $request){
        $ar = array();
        $ar['title'] = trans('front_main.title.about');
        $ar['item'] = ContentPage::where('sys_key', 'about')->first();
        
        return viewMode('page.about', $ar);
    }

    function policy (Request $request){
        $ar = array();
        $ar['title'] = trans('front_main.title.policy');
        $ar['item'] = ContentPage::where('sys_key', 'policy')->first();

        return viewMode('page.policy', $ar);
    }

    function term (Request $request){
        $ar = array();
        $ar['title'] = trans('front_main.title.term');
        $ar['item'] = ContentPage::where('sys_key', 'term')->first();

        return viewMode('page.term', $ar);
    }
    
    function help (Request $request){
        $ar = array();
        $ar['title'] = trans('front_main.title.help');
        $ar['item'] = ContentPage::where('sys_key', 'help')->first();
        
        return viewMode('page.help', $ar);
    }

    function faq (Request $request){
        $ar = array();
        $ar['title'] = trans('front_main.title.faq');
        $ar['items'] = ContentFaq::orderBy('name', 'asc')->get();
        
		
        return viewMode('page.faq', $ar);
    }

    function saveQuestion(Request $request){
        $action = new MainSaveAction(new ContentQuestion(), $request);
         
        try {
            $action->run();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', trans('front_main.message.save_question'));
    }
}
