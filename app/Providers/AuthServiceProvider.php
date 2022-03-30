<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Modules\Entity\Model\LibContinent\LibContinent;
use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\LibCountry\LibCountry;
use Modules\Entity\Model\LibDegree\LibDegree;
use Modules\Entity\Model\LibDiscipline\LibDiscipline;
use Modules\Entity\Model\LibLangStudy\LibLangStudy;
use Modules\Entity\Model\LibUniverCat\LibUniverCat;
use Modules\Entity\Model\ContentFaq\ContentFaq;
use Modules\Entity\Model\ContentPage\ContentPage;
use Modules\Entity\Model\ContentReview\ContentReview;
use Modules\Entity\Model\ContentTextBlock\ContentTextBlock;
use Modules\Entity\Model\University\University;
use Modules\Entity\Model\Program\Program;
use Modules\Entity\Model\Manager\Manager;
use Modules\Entity\Model\ContentManager\ContentManager;
use Modules\Entity\Model\ContentQuestion\ContentQuestion;
use Modules\Entity\Model\ContentMessage\ContentMessage;
use Modules\Entity\Model\ContentBlog\ContentBlog;
use Modules\Entity\Model\ContentContact\ContentContact;
use Modules\Entity\Model\StudentData\StudentData;
use Modules\Entity\Model\Comuna\Comuna;
use Modules\Entity\Model\ComunaMessage\ComunaMessage;
use Modules\Entity\Model\Gallery\Gallery;

use Modules\Entity\Policies\MainPolicy;
use Modules\Entity\Policies\ContentPolicy;


use Modules\Entity\Model\Application\Application;
use Modules\Entity\Policies\ApplicationPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        LibContinent::class             => MainPolicy::class,
        LibCity::class                  => MainPolicy::class,
        LibCountry::class               => MainPolicy::class,
        LibDegree::class                => MainPolicy::class,
        LibDiscipline::class            => MainPolicy::class,
        LibLangStudy::class             => MainPolicy::class,
        LibUniverCat::class             => MainPolicy::class,
        
        ContentFaq::class               => ContentPolicy::class,
        ContentPage::class              => ContentPolicy::class,
        ContentReview::class            => ContentPolicy::class,
        ContentTextBlock::class         => ContentPolicy::class,

        University::class               => ContentPolicy::class,

        Program::class                  => ContentPolicy::class,

        Manager::class                  => MainPolicy::class,
        ContentManager::class           => MainPolicy::class,

        ContentQuestion::class          => ContentPolicy::class,
        ContentMessage::class           => ContentPolicy::class,
        ContentBlog::class              => ContentPolicy::class,
        ContentContact::class           => ContentPolicy::class,

        StudentData::class              => ContentPolicy::class,
        Comuna::class                   => ContentPolicy::class,
        ComunaMessage::class            => ContentPolicy::class,
        Gallery::class                  => ContentPolicy::class,
        
        
        Application::class              => ApplicationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
