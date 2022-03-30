<?php

namespace Modules\Admin\Http\Controllers\Main;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainSystemMethods;
use Modules\Admin\Traits\MainListMethod;
use Modules\Admin\Traits\MainShowMethod;

use Modules\Entity\Model\Application\Application as Model;

class ApplicationController extends Controller {
    use MainSystemMethods, MainListMethod, MainShowMethod;
    protected $view_path = 'admin::page.main.application';
    protected $route_path = 'admin_application';
    protected $title_path = 'title.application';
    protected $def_model = Model::class;
    
    public function index(Request $request) {
		
        if ($saved_link = checkFilterParam($request))
            return $saved_link;
       
        return view($this->view_path.'.index', [
            'title' => trans($this->title_path.''),
            'items' => $this->def_model::filter($request)->getByRole($request)->latest()->paginate(24)
        ]);
    }

}
