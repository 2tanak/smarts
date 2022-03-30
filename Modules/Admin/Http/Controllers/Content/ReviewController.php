<?php

namespace Modules\Admin\Http\Controllers\Content;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\ReviewSaveAction as ModelCreateAction;
use Modules\Entity\Actions\ReviewSaveAction as ModelUpdateAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\ContentReview\ContentReview as Model;

class ReviewController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.content.review';
    protected $route_path = 'admin_review';
    protected $title_path = 'title.review';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;

}
