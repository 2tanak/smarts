<?php
namespace Modules\Admin\Http\Controllers\Univer;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\UniverSaveAction as ModelCreateAction;
use Modules\Entity\Actions\UniverSaveAction as ModelUpdateAction;
use Modules\Entity\Actions\MainSaveAction as ModelSaveLangAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\University\University as Model;

class UniverController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.univer.univer';
    protected $route_path = 'admin_uni';
    protected $title_path = 'title.univer';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
   
    function saveLang(Request $request, Model $item){
        
        $model = $item->relTrans()->firstOrCreate(['lang'=>$request->lang, 'el_id' => $item->id]);
        $action = new  ModelSaveLangAction($model, $request);
        $model = $action->run();
        // dd($request->all(), $model);

        return redirect()->route($this->route_path.'_show', $item)->with('success', trans('main.updated_model'));
    }

    function checkRanking(Request $request){
        if (!$request->id)
            $request->id = 0;
        
        $has = Model::where('rank_unikum', $request->rank_unikum)->where('id', '<>', $request->id)->count();

        if ($has > 0)
            return response()->json([
                'has' => true,
                'message' => 'Указанное значение уже есть'
            ]);

        
        return response()->json([
            'has' => false
        ]);
    }

}
