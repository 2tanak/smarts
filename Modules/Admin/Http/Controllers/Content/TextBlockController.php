<?php

namespace Modules\Admin\Http\Controllers\Content;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\MainSaveAction as ModelCreateAction;
use Modules\Entity\Actions\MainSaveAction as ModelUpdateAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\ContentTextBlock\ContentTextBlock as Model;

class TextBlockController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.content.text_block';
    protected $route_path = 'admin_text_block';
    protected $title_path = 'title.text_block';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;

}
