<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index() {
        //alert()->message('Message', 'Optional Title');
		
        return view('admin::index');
    }

}
