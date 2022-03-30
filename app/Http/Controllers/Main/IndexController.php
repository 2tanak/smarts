<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Entity\Model\ContentReview\ContentReview;
use Modules\Entity\Model\ContentBlog\ContentBlog;
use Modules\Entity\Model\University\University;
use App\Services\FilterLib;

class IndexController extends Controller {

    function index (Request $request){

        $ar = array();
        $ar['title'] = trans('front_main.title.index');
        $ar['reviews'] = ContentReview::latest()->take(8)->get();
        $ar['blogs'] = ContentBlog::orderBy('news_date', 'desc')->take(2)->get();
        $ar['request'] = $request;
        $ar['filter_lib'] = FilterLib::get();
        $ar['univers'] = University::filter($request)->latest()->paginate(24);


		return viewMode('index', $ar);
    }

}
