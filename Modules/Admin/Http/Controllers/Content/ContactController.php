<?php

namespace Modules\Admin\Http\Controllers\Content;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use Modules\Entity\Actions\ContactSaveAction;

use Modules\Entity\Model\ContentContact\ContentContact as Model;

class ContactController extends Controller {
    protected $view_path = 'admin::page.content.contact';
    protected $route_path = 'admin_contact';
    protected $title_path = 'title.contact';
    protected $def_model = Model::class;

    function index(Request $request){
        return view($this->view_path.'.index', [
            'title' => trans($this->title_path.''),
            'route_path' => $this->route_path,
            'model' => new $this->def_model(),
            'items' => $this->def_model::orderBy('id', 'asc')->take(2)->get()
        ]);
    }

    function save(Request $request){
        $model = $this->def_model::find($request->id);
        if (!$model)
            $model = new $this->def_model();
        $action = new ContactSaveAction($model, $request);
        try {
            $action->run();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', trans('main.updated_model'));
    }

}
