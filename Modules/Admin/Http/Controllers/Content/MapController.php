<?php

namespace Modules\Admin\Http\Controllers\Content;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use Modules\Entity\Actions\ContentMapSaveAction;

use Modules\Entity\Model\ContentMap\ContentMap as Model;

class MapController extends Controller {
    protected $view_path = 'admin::page.content.map';
    protected $route_path = 'admin_cmap';
    protected $title_path = 'title.admin_cmap';
    protected $def_model = Model::class;

    function index(Request $request){
        $model = Model::first();
        if (!$model)
            $model =  Model::create();

        return view($this->view_path.'.index', [
            'title' => trans($this->title_path.''),
            'route_path' => $this->route_path,
            'model' => $model
        ]);
    }

    function save(Request $request){
        $model = Model::first();
        if (!$model)
            $model =  Model::create();

        $action = new ContentMapSaveAction($model, $request);
        try {
            $action->run();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', trans('main.updated_model'));
    }

}
