<?php

namespace Modules\Admin\Http\Controllers\Content;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\BlogSaveAction as ModelCreateAction;
use Modules\Entity\Actions\BlogSaveAction as ModelUpdateAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\ContentBlog\ContentBlog as Model;

class BlogController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.content.blog';
    protected $route_path = 'admin_blog';
    protected $title_path = 'title.blog';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;

}
