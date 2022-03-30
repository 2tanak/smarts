<?php

namespace Modules\Admin\Http\Controllers\Main;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainSystemMethods;
use Modules\Admin\Traits\MainListMethod;
use Modules\Admin\Traits\MainShowMethod;

use Modules\Entity\Model\StudentData\StudentData as Model;

class StudentDataController extends Controller {
    use MainSystemMethods, MainListMethod, MainShowMethod;
    protected $view_path = 'admin::page.main.student_data';
    protected $route_path = 'admin_student_data';
    protected $title_path = 'title.student_data';
    protected $def_model = Model::class;
    
}
