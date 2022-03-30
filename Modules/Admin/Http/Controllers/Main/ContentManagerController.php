<?php

namespace Modules\Admin\Http\Controllers\Main;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\ContentManagerAction as ModelCreateAction;
use Modules\Entity\Actions\ContentManagerAction as ModelUpdateAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\ContentManager\ContentManager as Model;

class ContentManagerController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.main.content_manager';
    protected $route_path = 'admin_content_manager';
    protected $title_path = 'title.content_manager';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
    
}
