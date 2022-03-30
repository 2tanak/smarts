<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index')->name('index');

Route::get('/step_1', function () {
    $ar = array();
    $ar['step'] = 5;
    $ar['max_step'] = 6;
    $ar['title'] = 1;
     return view('main.desktop.questionnaire.step_1', $ar);
});

Route::get('/resetPassword', function () {
    $ar = array();
    $ar['step'] = 3;
    $ar['title'] = 2;
     return view('main.phone.user.reset_password', $ar);
});

Route::group(['prefix' => 'univer', 'namespace' => 'Univer'], function () {
    Route::get('/', 'IndexController@index')->name('univer_index');
    Route::get('/view/{univer}', 'ViewController@index')->name('univer_view');
    Route::get('/view/{univer}/student-life', 'ViewController@studenLife')->name('univer_view_stud_life');
    Route::get('/view/{univer}/programs', 'ViewController@programs')->name('univer_view_program');

    Route::get('/view/{univer}/community', 'ComminityController@index')->name('univer_view_comuna');
    Route::get('/view/{univer}/community/{comuna}', 'ComminityController@detail')->name('univer_view_comuna_detail');
    Route::post('/view/{univer}/community/add', 'ComminityController@add')->name('univer_view_comuna_add');
    Route::post('/view/{univer}/community/{comuna}/add', 'ComminityController@detailAdd')->name('univer_view_comuna_detail_add');
});

Route::group(['prefix' => 'program', 'namespace' => 'Program'], function () {
    Route::get('/', 'IndexController@index')->name('univer_program');
    Route::get('/view/{program}', 'ViewController@index')->name('univer_program_view')->where('phone','phone');
    Route::get('/view/{program}/discpline', 'ViewController@discpline')->name('univer_program_dicpline')->where('phone','phone');
    Route::get('/view/{program}/how-enter', 'ViewController@howEnter')->name('univer_program_how_enter')->where('phone','phone');
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('view/{blog}', 'BlogController@view')->name('blog_view');
});

Route::group(['prefix' => 'page'], function () {
    Route::get('contact', 'PageController@contact')->name('page_contact');
    Route::get('about', 'PageController@about')->name('page_about');
    Route::get('policy', 'PageController@policy')->name('page_policy');
    Route::get('term', 'PageController@term')->name('page_term');
    Route::get('help', 'PageController@help')->name('page_help');
    Route::get('faq', 'PageController@faq')->name('page_faq');
    Route::post('save-question', 'PageController@saveQuestion')->name('page_save_question');
    Route::post('save-contact', 'PageController@saveContact')->name('page_save_contact');
});

Route::group(['namespace' => 'User'], function () {
    Route::get('login', 'LoginController@index')->name('student_login');
    Route::post('login', 'LoginController@check')->name('student_login_check');

    Route::get('registration', 'RegistrationController@index')->name('student_registration');
    Route::post('registration', 'RegistrationController@save')->name('student_registration_save');


    Route::group(['middleware' => ['auth.user']], function () {
        Route::get('profile', 'ProfileController@index')->name('student_profile');
        Route::post('profile', 'ProfileController@save')->name('student_profile_save');
        Route::get('logout', 'LoginController@logout')->name('student_logout');
    });

});

