<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Spatie\BladeX\Facades\BladeX;
use Modules\Entity\Model\SysLang\SysLang;
use View;
use App\Helper\CurrentLang;
use Modules\Entity\Model\ContentSetting\ContentSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(){
        BladeX::component('__component.*');

      

        View::composer('admin::*', function($view){
            $view->with('sys_lang', new SysLang());
        });

        View::composer('main.*', function ($view) {
            $view->with('q_lang', new CurrentLang());
		});
		
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
	
	
	
    }
}
