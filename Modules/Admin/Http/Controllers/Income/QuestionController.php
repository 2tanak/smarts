<?php

namespace Modules\Admin\Http\Controllers\Income;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainSystemMethods;
use Modules\Admin\Traits\MainListMethod;
use Modules\Admin\Traits\MainShowMethod;
use Modules\Admin\Traits\MainDeleteMethod;

use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\ContentQuestion\ContentQuestion as Model;

class QuestionController extends Controller {
    use MainSystemMethods, MainListMethod, MainShowMethod, MainDeleteMethod;

    protected $view_path = 'admin::page.income.question';
    protected $route_path = 'admin_question';
    protected $title_path = 'title.question';
    protected $def_model = Model::class;
    protected $action_delete = ModelDeleteAction::class;
    
}
