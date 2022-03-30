<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Entity\Model\ContentBlog\ContentBlog;

class BlogController extends Controller {
    function view (Request $request, $lang, ContentBlog $blog){
        $ar = array();
        $ar['title'] = trans('front_main.title.blog');
        $ar['blog'] = $blog;

        return viewMode('blog.view', $ar);
    }

}
