<?php
namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\CurrentLang;

use Modules\Entity\Model\University\University;
use Modules\Entity\Model\Manager\Manager;
use Modules\Entity\Model\Application\Application;

use Modules\Entity\Actions\ApplicationAction;
use App\User;


class MainController extends Controller{
    function changeLang(Request $request){
        $old_lang = CurrentLang::get();
        $new_lang = $request->lang;

        CurrentLang::set($new_lang);

        $url = url()->previous();
        $url = str_replace("/".$old_lang, "/".$new_lang, $url);

        return redirect()->to($url);
    }

    function connectManager(Request $request){
        $univer = University::findOrFail($request->univer_id);
        $manager = User::findOrFail($request->manager_id);

        $action = new ApplicationAction(new Application(), $request);
         
        try {
            $action->run($univer, $manager);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', trans('front_main.message.save_connect_manager'));

    }
}
