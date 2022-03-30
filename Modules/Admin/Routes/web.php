<?php
App\Helper\CurrentLang::get();

Route::group(['prefix' => 'admin/door', 'middleware' => ['auth.admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin_index');

    Route::group(['prefix' => 'comuna', 'namespace' => 'Comuna'], function () {
        Route::group(['prefix' => 'comuna'], function () {
            Route::get('/', 'ComunaController@index')
                ->middleware('can:list,Modules\Entity\Model\Comuna\Comuna')
                ->name('admin_comuna');

            Route::get('delete/{comuna}', 'ComunaController@delete')
                ->middleware('can:delete,comuna')
                ->name('admin_comuna_delete');

            Route::get('accept/{comuna}', 'ComunaController@accept')
                ->middleware('can:view,comuna')
                ->name('admin_comuna_accept');

            Route::get('view/{comuna}', 'ComunaController@show')
                ->middleware('can:view,comuna')
                ->name('admin_comuna_show');
        });

        Route::group(['prefix' => 'comuna-messages'], function () {
            Route::get('/', 'ComunaMessageController@index')
                ->middleware('can:list,Modules\Entity\Model\ComunaMessage\ComunaMessage')
                ->name('admin_comuna_messages');

            Route::get('delete/{comunamessages}', 'ComunaMessageController@delete')
                ->middleware('can:delete,comunamessages')
                ->name('admin_comuna_messages_delete');

            Route::get('accept/{comunamessages}', 'ComunaMessageController@accept')
                ->middleware('can:view,comunamessages')
                ->name('admin_comuna_messages_accept');

            Route::get('view/{comunamessages}', 'ComunaMessageController@show')
                ->middleware('can:view,comunamessages')
                ->name('admin_comuna_messages_show');
        });
    });
    
    Route::group(['prefix' => 'income', 'namespace' => 'Income'], function () {
        Route::group(['prefix' => 'cmessage'], function () {
            Route::get('/', 'CMessageController@index')
                ->middleware('can:list,Modules\Entity\Model\ContentMessage\ContentMessage')
                ->name('admin_cmessage');

            Route::get('delete/{cmessage}', 'CMessageController@delete')
                ->middleware('can:delete,cmessage')
                ->name('admin_cmessage_delete');

            Route::get('view/{cmessage}', 'CMessageController@show')
                ->middleware('can:view,cmessage')
                ->name('admin_cmessage_show');
        });

        Route::group(['prefix' => 'question'], function () {
            Route::get('/', 'QuestionController@index')
                ->middleware('can:list,Modules\Entity\Model\ContentQuestion\ContentQuestion')
                ->name('admin_question');

            Route::get('delete/{question}', 'QuestionController@delete')
                ->middleware('can:delete,question')
                ->name('admin_question_delete');

            Route::get('view/{question}', 'QuestionController@show')
                ->middleware('can:view,question')
                ->name('admin_question_show');
        });

    });

    Route::group(['prefix' => 'main', 'namespace' => 'Main'], function () {
        Route::group(['prefix' => 'manager'], function () {
            Route::get('/', 'ManagerController@index')
                ->middleware('can:list,Modules\Entity\Model\Manager\Manager')
                ->name('admin_manager');

            Route::get('create', 'ManagerController@create')
                ->middleware('can:create,Modules\Entity\Model\Manager\Manager')
                ->name('admin_manager_create');

            Route::post('create', 'ManagerController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\Manager\Manager')
                ->name('admin_manager_create_save');

            Route::get('update/{manager}', 'ManagerController@update')
                ->middleware('can:update,manager')
                ->name('admin_manager_update');
            
            Route::post('update-ang/{manager}', 'ManagerController@saveUpdate')
                ->middleware('can:update,manager')
                ->name('admin_manager_update_save');

            Route::get('delete/{manager}', 'ManagerController@delete')
                ->middleware('can:delete,manager')
                ->name('admin_manager_delete');

            Route::get('view/{manager}', 'ManagerController@show')
                ->middleware('can:view,manager')
                ->name('admin_manager_show');
        });

        Route::group(['prefix' => 'contentmanager'], function () {
            Route::get('/', 'ContentManagerController@index')
                ->middleware('can:list,Modules\Entity\Model\ContentManager\ContentManager')
                ->name('admin_content_manager');

            Route::get('create', 'ContentManagerController@create')
                ->middleware('can:create,Modules\Entity\Model\ContentManager\ContentManager')
                ->name('admin_content_manager_create');

            Route::post('create', 'ContentManagerController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\ContentManager\ContentManager')
                ->name('admin_content_manager_create_save');

            Route::get('update/{contentmanager}', 'ContentManagerController@update')
                ->middleware('can:update,contentmanager')
                ->name('admin_content_manager_update');
            
            Route::post('update-ang/{contentmanager}', 'ContentManagerController@saveUpdate')
                ->middleware('can:update,contentmanager')
                ->name('admin_content_manager_update_save');

            Route::get('delete/{contentmanager}', 'ContentManagerController@delete')
                ->middleware('can:delete,contentmanager')
                ->name('admin_content_manager_delete');

            Route::get('view/{contentmanager}', 'ContentManagerController@show')
                ->middleware('can:view,contentmanager')
                ->name('admin_content_manager_show');
        });

        
        Route::group(['prefix' => 'student-data'], function () {
            Route::get('/', 'StudentDataController@index')
                ->middleware('can:list,Modules\Entity\Model\StudentData\StudentData')
                ->name('admin_student_data');

            Route::get('view/{studentdata}', 'StudentDataController@show')
                ->middleware('can:view,studentdata')
                ->name('admin_student_data_show');
        });

        
        Route::group(['prefix' => 'application'], function () {
            Route::get('/', 'ApplicationController@index')
                ->middleware('can:list,Modules\Entity\Model\Application\Application')
                ->name('admin_application');

            Route::get('view/{application}', 'ApplicationController@show')
                ->middleware('can:view,application')
                ->name('admin_application_show');
        });
    });

    Route::group(['prefix' => 'univer', 'namespace' => 'Univer'], function () {
        
        Route::group(['prefix' => 'galary'], function () {
            Route::get('{item}', 'GalaryController@index')
                ->name('admin_uni_gal');

            Route::post('{item}/save', 'GalaryController@save')
                ->name('admin_uni_gal_save');

            Route::get('{item}/delete/{galary}', 'GalaryController@delete')
                ->name('admin_uni_gal_delete');
        });

        Route::group(['prefix' => 'univer'], function () {
            Route::get('/', 'UniverController@index')
                ->middleware('can:list,Modules\Entity\Model\University\University')
                ->name('admin_uni');

            Route::get('create', 'UniverController@create')
                ->middleware('can:create,Modules\Entity\Model\University\University')
                ->name('admin_uni_create');

            Route::post('create', 'UniverController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\University\University')
                ->name('admin_uni_create_save');

            Route::get('update/{univer}', 'UniverController@update')
                ->middleware('can:update,univer')
                ->name('admin_uni_update');

            Route::post('update/{univer}', 'UniverController@saveUpdate')
                ->middleware('can:update,univer')
                ->name('admin_uni_update_save');

            
            Route::post('update-lang/{univer}', 'UniverController@saveLang')
                ->middleware('can:update,univer')
                ->name('admin_uni_update_lang');

            Route::get('delete/{univer}', 'UniverController@delete')
                ->middleware('can:delete,univer')
                ->name('admin_uni_delete');

            Route::get('view/{univer}', 'UniverController@show')
                ->middleware('can:view,univer')
                ->name('admin_uni_show');

            Route::get('check-rank', 'UniverController@checkRanking')
                ->middleware('can:list,Modules\Entity\Model\University\University')
                ->name('admin_uni_check_rank');
        });

        Route::group(['prefix' => 'program'], function () {
            Route::get('/', 'ProgramController@index')
                ->middleware('can:list,Modules\Entity\Model\Program\Program')
                ->name('admin_program');

            Route::get('create', 'ProgramController@create')
                ->middleware('can:create,Modules\Entity\Model\Program\Program')
                ->name('admin_program_create');

            Route::post('create', 'ProgramController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\Program\Program')
                ->name('admin_program_create_save');

            Route::get('update/{program}', 'ProgramController@update')
                ->middleware('can:update,program')
                ->name('admin_program_update');
            
            Route::post('update/{program}', 'ProgramController@saveUpdate')
                ->middleware('can:update,program')
                ->name('admin_program_update_save');

            Route::get('delete/{program}', 'ProgramController@delete')
                ->middleware('can:delete,program')
                ->name('admin_program_delete');

            Route::get('view/{program}', 'ProgramController@show')
                ->middleware('can:view,program')
                ->name('admin_program_show');
        });
    });
    
    Route::group(['prefix' => 'content', 'namespace' => 'Content'], function () {
        Route::group(['prefix' => 'csetting'], function () {
            Route::get('/', 'SettingController@index')
                ->middleware('can:list,Modules\Entity\Model\ContentContact\ContentContact')
                ->name('admin_csetting');

            Route::post('/', 'SettingController@save')
                ->middleware('can:create,Modules\Entity\Model\ContentContact\ContentContact')
                ->name('admin_csetting_save');
        });

        Route::group(['prefix' => 'cmap'], function () {
            Route::get('/', 'MapController@index')
                ->middleware('can:list,Modules\Entity\Model\ContentContact\ContentContact')
                ->name('admin_cmap');

            Route::post('/', 'MapController@save')
                ->middleware('can:create,Modules\Entity\Model\ContentContact\ContentContact')
                ->name('admin_cmap_save');
        });

        Route::group(['prefix' => 'ccontact'], function () {
            Route::get('/', 'ContactController@index')
                ->middleware('can:list,Modules\Entity\Model\ContentContact\ContentContact')
                ->name('admin_contact');

            Route::post('/', 'ContactController@save')
                ->middleware('can:create,Modules\Entity\Model\ContentContact\ContentContact')
                ->name('admin_contact_save');
        });

        Route::group(['prefix' => 'blog'], function () {
            Route::get('/', 'BlogController@index')
                ->middleware('can:list,Modules\Entity\Model\ContentBlog\ContentBlog')
                ->name('admin_blog');

            Route::get('create', 'BlogController@create')
                ->middleware('can:create,Modules\Entity\Model\ContentBlog\ContentBlog')
                ->name('admin_blog_create');

            Route::post('create', 'BlogController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\ContentBlog\ContentBlog')
                ->name('admin_blog_create_save');

            Route::get('update/{blog}', 'BlogController@update')
                ->middleware('can:update,blog')
                ->name('admin_blog_update');

            Route::post('update/{blog}', 'BlogController@saveUpdate')
                ->middleware('can:update,blog')
                ->name('admin_blog_update_save');

            Route::get('delete/{blog}', 'BlogController@delete')
                ->middleware('can:delete,blog')
                ->name('admin_blog_delete');

            Route::get('view/{blog}', 'BlogController@show')
                ->middleware('can:view,blog')
                ->name('admin_blog_show');
        });

        Route::group(['prefix' => 'faq'], function () {
            Route::get('/', 'FaqController@index')
                ->middleware('can:list,Modules\Entity\Model\ContentFaq\ContentFaq')
                ->name('admin_faq');

            Route::get('create', 'FaqController@create')
                ->middleware('can:create,Modules\Entity\Model\ContentFaq\ContentFaq')
                ->name('admin_faq_create');

            Route::post('create', 'FaqController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\ContentFaq\ContentFaq')
                ->name('admin_faq_create_save');

            Route::get('update/{faq}', 'FaqController@update')
                ->middleware('can:update,faq')
                ->name('admin_faq_update');

            Route::post('update/{faq}', 'FaqController@saveUpdate')
                ->middleware('can:update,faq')
                ->name('admin_faq_update_save');

            Route::get('delete/{faq}', 'FaqController@delete')
                ->middleware('can:delete,faq')
                ->name('admin_faq_delete');

            Route::get('view/{faq}', 'FaqController@show')
                ->middleware('can:view,faq')
                ->name('admin_faq_show');
        });
        
        Route::group(['prefix' => 'page'], function () {
            Route::get('/', 'PageController@index')
                ->middleware('can:list,Modules\Entity\Model\ContentPage\ContentPage')
                ->name('admin_c_page');

            Route::get('create', 'PageController@create')
                ->middleware('can:create,Modules\Entity\Model\ContentPage\ContentPage')
                ->name('admin_c_page_create');

            Route::post('create', 'PageController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\ContentPage\ContentPage')
                ->name('admin_c_page_create_save');

            Route::get('update/{page}', 'PageController@update')
                ->middleware('can:update,page')
                ->name('admin_c_page_update');

            Route::post('update/{page}', 'PageController@saveUpdate')
                ->middleware('can:update,page')
                ->name('admin_c_page_update_save');

            Route::get('delete/{page}', 'PageController@delete')
                ->middleware('can:delete,page')
                ->name('admin_c_page_delete');

            Route::get('view/{page}', 'PageController@show')
                ->middleware('can:view,page')
                ->name('admin_c_page_show');
        });
        
        Route::group(['prefix' => 'review'], function () {
            Route::get('/', 'ReviewController@index')
                ->middleware('can:list,Modules\Entity\Model\ContentReview\ContentReview')
                ->name('admin_review');

            Route::get('create', 'ReviewController@create')
                ->middleware('can:create,Modules\Entity\Model\ContentReview\ContentReview')
                ->name('admin_review_create');

            Route::post('create', 'ReviewController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\ContentReview\ContentReview')
                ->name('admin_review_create_save');

            Route::get('update/{review}', 'ReviewController@update')
                ->middleware('can:update,review')
                ->name('admin_review_update');

            Route::post('update/{review}', 'ReviewController@saveUpdate')
                ->middleware('can:update,review')
                ->name('admin_review_update_save');

            Route::get('delete/{review}', 'ReviewController@delete')
                ->middleware('can:delete,review')
                ->name('admin_review_delete');

            Route::get('view/{review}', 'ReviewController@show')
                ->middleware('can:view,review')
                ->name('admin_review_show');
        });
        
        Route::group(['prefix' => 'text-block'], function () {
            Route::get('/', 'TextBlockController@index')
                ->middleware('can:list,Modules\Entity\Model\ContentTextBlock\ContentTextBlock')
                ->name('admin_text_block');

            Route::get('create', 'TextBlockController@create')
                ->middleware('can:create,Modules\Entity\Model\ContentTextBlock\ContentTextBlock')
                ->name('admin_text_block_create');

            Route::post('create', 'TextBlockController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\ContentTextBlock\ContentTextBlock')
                ->name('admin_text_block_create_save');

            Route::get('update/{text_block}', 'TextBlockController@update')
                ->middleware('can:update,text_block')
                ->name('admin_text_block_update');

            Route::post('update/{text_block}', 'TextBlockController@saveUpdate')
                ->middleware('can:update,text_block')
                ->name('admin_text_block_update_save');

            Route::get('delete/{text_block}', 'TextBlockController@delete')
                ->middleware('can:delete,text_block')
                ->name('admin_text_block_delete');

            Route::get('view/{text_block}', 'TextBlockController@show')
                ->middleware('can:view,text_block')
                ->name('admin_text_block_show');
        });
    });

    Route::group(['prefix' => 'lib', 'namespace' => 'Lib'], function () {
        Route::group(['prefix' => 'requirement'], function () {
            Route::get('/', 'RequirementController@index')
                ->name('admin_lib_req');

            Route::get('create', 'RequirementController@create')
                ->name('admin_lib_req_create');

            Route::post('create', 'RequirementController@saveCreate')
                ->name('admin_lib_req_create_save');

            Route::get('update/{req}', 'RequirementController@update')
                ->name('admin_lib_req_update');

            Route::post('update/{req}', 'RequirementController@saveUpdate')
                ->name('admin_lib_req_update_save');

            Route::get('delete/{req}', 'RequirementController@delete')
                ->name('admin_lib_req_delete');

            Route::get('view/{req}', 'RequirementController@show')
                ->name('admin_lib_req_show');
        });

		
		
		
		
        Route::group(['prefix' => 'uni-cat'], function () {
            Route::get('/', 'UniverCatController@index')
                ->middleware('can:list,Modules\Entity\Model\LibUniverCat\LibUniverCat')
                ->name('admin_lib_uni_cat');

            Route::get('create', 'UniverCatController@create')
                ->middleware('can:create,Modules\Entity\Model\LibUniverCat\LibUniverCat')
                ->name('admin_lib_uni_cat_create');

            Route::post('create', 'UniverCatController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\LibUniverCat\LibUniverCat')
                ->name('admin_lib_uni_cat_create_save');

            Route::get('update/{univer_cat}', 'UniverCatController@update')
                ->middleware('can:update,univer_cat')
                ->name('admin_lib_uni_cat_update');

            Route::post('update/{univer_cat}', 'UniverCatController@saveUpdate')
                ->middleware('can:update,univer_cat')
                ->name('admin_lib_uni_cat_update_save');

            Route::get('delete/{univer_cat}', 'UniverCatController@delete')
                ->middleware('can:delete,univer_cat')
                ->name('admin_lib_uni_cat_delete');

            Route::get('view/{univer_cat}', 'UniverCatController@show')
                ->middleware('can:view,univer_cat')
                ->name('admin_lib_uni_cat_show');
        });

        Route::group(['prefix' => 'lang-study'], function () {
            Route::get('/', 'LangStudyController@index')
                ->middleware('can:list,Modules\Entity\Model\LibLangStudy\LibLangStudy')
                ->name('admin_lib_lang_study');

            Route::get('create', 'LangStudyController@create')
                ->middleware('can:create,Modules\Entity\Model\LibLangStudy\LibLangStudy')
                ->name('admin_lib_lang_study_create');

            Route::post('create', 'LangStudyController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\LibLangStudy\LibLangStudy')
                ->name('admin_lib_lang_study_create_save');

            Route::get('update/{lang_study}', 'LangStudyController@update')
                ->middleware('can:update,lang_study')
                ->name('admin_lib_lang_study_update');

            Route::post('update/{lang_study}', 'LangStudyController@saveUpdate')
                ->middleware('can:update,lang_study')
                ->name('admin_lib_lang_study_update_save');

            Route::get('delete/{lang_study}', 'LangStudyController@delete')
                ->middleware('can:delete,lang_study')
                ->name('admin_lib_lang_study_delete');

            Route::get('view/{lang_study}', 'LangStudyController@show')
                ->middleware('can:view,lang_study')
                ->name('admin_lib_lang_study_show');
        });

        Route::group(['prefix' => 'discipline'], function () {
            Route::get('/', 'DisciplineController@index')
                ->middleware('can:list,Modules\Entity\Model\LibDiscipline\LibDiscipline')
                ->name('admin_lib_discipline');

            Route::get('create', 'DisciplineController@create')
                ->middleware('can:create,Modules\Entity\Model\LibDiscipline\LibDiscipline')
                ->name('admin_lib_discipline_create');

            Route::post('create', 'DisciplineController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\LibDiscipline\LibDiscipline')
                ->name('admin_lib_discipline_create_save');

            Route::get('update/{discipline}', 'DisciplineController@update')
                ->middleware('can:update,discipline')
                ->name('admin_lib_discipline_update');

            Route::post('update/{discipline}', 'DisciplineController@saveUpdate')
                ->middleware('can:update,discipline')
                ->name('admin_lib_discipline_update_save');

            Route::get('delete/{discipline}', 'DisciplineController@delete')
                ->middleware('can:delete,discipline')
                ->name('admin_lib_discipline_delete');

            Route::get('view/{discipline}', 'DisciplineController@show')
                ->middleware('can:view,discipline')
                ->name('admin_lib_discipline_show');
        });

        Route::group(['prefix' => 'degree'], function () {
            Route::get('/', 'DegreeController@index')
                ->middleware('can:list,Modules\Entity\Model\LibDegree\LibDegree')
                ->name('admin_lib_degree');

            Route::get('create', 'DegreeController@create')
                ->middleware('can:create,Modules\Entity\Model\LibDegree\LibDegree')
                ->name('admin_lib_degree_create');

            Route::post('create', 'DegreeController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\LibDegree\LibDegree')
                ->name('admin_lib_degree_create_save');

            Route::get('update/{degree}', 'DegreeController@update')
                ->middleware('can:update,degree')
                ->name('admin_lib_degree_update');

            Route::post('update/{degree}', 'DegreeController@saveUpdate')
                ->middleware('can:update,degree')
                ->name('admin_lib_degree_update_save');

            Route::get('delete/{degree}', 'DegreeController@delete')
                ->middleware('can:delete,degree')
                ->name('admin_lib_degree_delete');

            Route::get('view/{degree}', 'DegreeController@show')
                ->middleware('can:view,degree')
                ->name('admin_lib_degree_show');
        });

        Route::group(['prefix' => 'country'], function () {
            Route::get('/', 'CountryController@index')
                ->middleware('can:list,Modules\Entity\Model\LibCountry\LibCountry')
                ->name('admin_lib_country');

            Route::get('create', 'CountryController@create')
                ->middleware('can:create,Modules\Entity\Model\LibCountry\LibCountry')
                ->name('admin_lib_country_create');

            Route::post('create', 'CountryController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\LibCountry\LibCountry')
                ->name('admin_lib_country_create_save');

            Route::get('update/{country}', 'CountryController@update')
                ->middleware('can:update,country')
                ->name('admin_lib_country_update');

            Route::post('update/{country}', 'CountryController@saveUpdate')
                ->middleware('can:update,country')
                ->name('admin_lib_country_update_save');

            Route::get('delete/{country}', 'CountryController@delete')
                ->middleware('can:delete,country')
                ->name('admin_lib_country_delete');

            Route::get('view/{country}', 'CountryController@show')
                ->middleware('can:view,country')
                ->name('admin_lib_country_show');
        });

        Route::group(['prefix' => 'city'], function () {
            Route::get('/', 'CityController@index')
                ->middleware('can:list,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_city');

            Route::get('create', 'CityController@create')
                ->middleware('can:create,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_city_create');

            Route::post('create', 'CityController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_city_create_save');

            Route::get('update/{city}', 'CityController@update')
                ->middleware('can:update,city')
                ->name('admin_lib_city_update');

            Route::post('update/{city}', 'CityController@saveUpdate')
                ->middleware('can:update,city')
                ->name('admin_lib_city_update_save');

            Route::get('delete/{city}', 'CityController@delete')
                ->middleware('can:delete,city')
                ->name('admin_lib_city_delete');

            Route::get('view/{city}', 'CityController@show')
                ->middleware('can:view,city')
                ->name('admin_lib_city_show');
        });
        
        Route::group(['prefix' => 'continent'], function () {
            Route::get('/', 'ContinentController@index')
                ->middleware('can:list,Modules\Entity\Model\LibContinent\LibContinent')
                ->name('admin_lib_continent');

            Route::get('create', 'ContinentController@create')
                ->middleware('can:create,Modules\Entity\Model\LibContinent\LibContinent')
                ->name('admin_lib_continent_create');

            Route::post('create', 'ContinentController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\LibContinent\LibContinent')
                ->name('admin_lib_continent_create_save');

            Route::get('update/{continent}', 'ContinentController@update')
                ->middleware('can:update,continent')
                ->name('admin_lib_continent_update');

            Route::post('update/{continent}', 'ContinentController@saveUpdate')
                ->middleware('can:update,continent')
                ->name('admin_lib_continent_update_save');

            Route::get('delete/{continent}', 'ContinentController@delete')
                ->middleware('can:delete,continent')
                ->name('admin_lib_continent_delete');

            Route::get('view/{continent}', 'ContinentController@show')
                ->middleware('can:view,continent')
                ->name('admin_lib_continent_show');
        });
    });

    Route::get('profile', 'ProfileController@index')->name('admin_profile');
    Route::post('profile', 'ProfileController@save')->name('admin_profile_save');

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin_log');
});

Route::get('admin/door/login', 'LoginController@index')->name('admin_login');
Route::post('admin/door/login', 'LoginController@check')->name('admin_login_check');
Route::any('admin/door/logout', 'LoginController@logout')->name('admin_logout');