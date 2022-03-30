<?php

namespace Modules\Admin\Http\Controllers\Univer;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\ProgramSaveAction as ModelCreateAction;
use Modules\Entity\Actions\ProgramSaveAction as ModelUpdateAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Program\Program as Model;

class ProgramController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.univer.program';
    protected $route_path = 'admin_program';
    protected $title_path = 'title.program';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
    
}
