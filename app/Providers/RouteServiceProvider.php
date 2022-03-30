<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //
        parent::boot();

        Route::model('city', \Modules\Entity\Model\LibCity\LibCity::class);
        Route::model('continent', \Modules\Entity\Model\LibContinent\LibContinent::class);
        Route::model('country', \Modules\Entity\Model\LibCountry\LibCountry::class);
        Route::model('degree', \Modules\Entity\Model\LibDegree\LibDegree::class);
        Route::model('discipline', \Modules\Entity\Model\LibDiscipline\LibDiscipline::class);
        Route::model('lang_study', \Modules\Entity\Model\LibLangStudy\LibLangStudy::class);
        Route::model('univer_cat', \Modules\Entity\Model\LibUniverCat\LibUniverCat::class);

        Route::model('text_block', \Modules\Entity\Model\ContentTextBlock\ContentTextBlock::class);
        Route::model('review', \Modules\Entity\Model\ContentReview\ContentReview::class);
        Route::model('page', \Modules\Entity\Model\ContentPage\ContentPage::class);
        Route::model('faq', \Modules\Entity\Model\ContentFaq\ContentFaq::class);
        
        Route::model('univer', \Modules\Entity\Model\University\University::class);
        
        Route::model('program', \Modules\Entity\Model\Program\Program::class);
		
        Route::model('gallery', \Modules\Entity\Model\Gallery\Gallery::class);
		
		Route::model('req', \Modules\Entity\Model\LibRequirement\LibRequirement::class);
		 
        Route::model('manager', \Modules\Entity\Model\Manager\Manager::class);
        Route::model('contentmanager', \Modules\Entity\Model\ContentManager\ContentManager::class);

        Route::model('question', \Modules\Entity\Model\ContentQuestion\ContentQuestion::class);
        Route::model('cmessage', \Modules\Entity\Model\ContentMessage\ContentMessage::class);
        Route::model('blog', \Modules\Entity\Model\ContentBlog\ContentBlog::class);
        Route::model('ccontact', \Modules\Entity\Model\ContentContact\ContentContact::class);
        Route::model('studentdata', \Modules\Entity\Model\StudentData\StudentData::class);
        Route::model('application', \Modules\Entity\Model\Application\Application::class);
        Route::model('comuna', \Modules\Entity\Model\Comuna\Comuna::class);
        Route::model('comunamessages', \Modules\Entity\Model\ComunaMessage\ComunaMessage::class);

        
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
