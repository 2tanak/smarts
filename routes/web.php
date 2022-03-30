<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect()->to(App\Helper\CurrentLang::get());
});

Route::group(['prefix' => '{lang}', 'namespace' => 'Main', 'middleware' => ['auth.front', 'sweetalert']], function () {

    Route::group(['as' => 'desktop.', 'middleware' => ['view.desktop']], function () {
        include '__web_link.php';
    });

    Route::group(['prefix' => 'phone', 'as' => 'phone.', 'middleware' => ['view.phone']], function () {
        include '__web_link.php';
    });


    Route::any('change-lang', 'MainController@changeLang')->name('change_lang');
    Route::post('connect-manager', 'MainController@connectManager')->name('connect_manager');
});
