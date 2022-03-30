
<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="{{ fileLink(Auth::user()->photo) }}" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
                        <div class="text-size-mini text-muted">
                            {{ Auth::user()->type_name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <li><a href="{{ route('admin_index') }}"><i class="icon-home4"></i> <span>@lang('sidebar.main')</span></a></li>
                    
                    @can('list', Modules\Entity\Model\Comuna\Comuna::class)
                        <li><a href="{{ route('admin_comuna') }}"><i class="icon-bubble2"></i> <span>@lang('sidebar.comuna')</span></a></li>
                    @endcan
                    
                    @can('list', Modules\Entity\Model\ComunaMessage\ComunaMessage::class)
                        <li><a href="{{ route('admin_comuna_messages') }}"><i class="icon-bubbles3"></i> <span>@lang('sidebar.comuna_messages')</span></a></li>
                    @endcan

                    @can('list', Modules\Entity\Model\Application\Application::class)
                        <li><a href="{{ route('admin_application') }}"><i class="icon-vcard"></i> <span>@lang('sidebar.application')</span></a></li>
                    @endcan

                    @can('list', Modules\Entity\Model\Manager\Manager::class)
                        <li><a href="{{ route('admin_manager') }}"><i class="icon-user-tie"></i> <span>@lang('sidebar.manager')</span></a></li>
                    @endcan
                    @can('list', Modules\Entity\Model\ContentManager\ContentManager::class)
                        <li><a href="{{ route('admin_content_manager') }}"><i class="icon-user"></i> <span>@lang('sidebar.content_manager')</span></a></li>
                    @endcan
                    @can('list', Modules\Entity\Model\StudentData\StudentData::class)
                        <li><a href="{{ route('admin_student_data') }}"><i class="icon-graduation2"></i> <span>@lang('sidebar.student_data')</span></a></li>
                    @endcan

                    @can('list', Modules\Entity\Model\Program\Program::class)
                        <li><a href="{{ route('admin_program') }}"><i class="icon-books"></i>  <span>@lang('sidebar.program')</span></a></li>
                    @endcan

                    @can('list', Modules\Entity\Model\University\University::class)
                        <li><a href="{{ route('admin_uni') }}"><i class="icon-city"></i><span>@lang('sidebar.univer')</span></a></li>
                    @endcan
					
                    <li class="">
                        <a href="#" class="has-ul"><i class="icon-envelop4"></i><span>@lang('sidebar.income_messages')</span></a>
                        <ul class="hidden-ul" style="display: none;">
                            @can('list', Modules\Entity\Model\ContentQuestion\ContentQuestion::class)
                                <li><a href="{{ route('admin_question') }}"><span>@lang('sidebar.question')</span></a></li>
                            @endcan
                            @can('list', Modules\Entity\Model\ContentMessage\ContentMessage::class)
                                <li><a href="{{ route('admin_cmessage') }}"><span>@lang('sidebar.cmessage')</span></a></li>
                            @endcan
                        </ul>
                    </li>
                    
                    <li class="">
                        <a href="#" class="has-ul"><i class="icon-stack-text"></i> <span>@lang('sidebar.content')</span></a>
                        <ul class="hidden-ul" style="display: none;">
                            @can('list', Modules\Entity\Model\ContentContact\ContentContact::class)
                                <li><a href="{{ route('admin_csetting') }}"><span>@lang('sidebar.admin_csetting')</span></a></li>
                            @endcan
                            @can('list', Modules\Entity\Model\ContentContact\ContentContact::class)
                                <li><a href="{{ route('admin_contact') }}"><span>@lang('sidebar.contact')</span></a></li>
                            @endcan
                            @can('list', Modules\Entity\Model\ContentContact\ContentContact::class)
                                <li><a href="{{ route('admin_cmap') }}"><span>@lang('sidebar.admin_cmap')</span></a></li>
                            @endcan

                            
                            @can('list', Modules\Entity\Model\ContentBlog\ContentBlog::class)
                                <li><a href="{{ route('admin_blog') }}"><span>@lang('sidebar.blog')</span></a></li>
                            @endcan
                             @can('list', Modules\Entity\Model\ContentFaq\ContentFaq::class)
                                <li><a href="{{ route('admin_faq') }}"><span>@lang('sidebar.faq')</span></a></li>
                            @endcan
                            @can('list', Modules\Entity\Model\ContentPage\ContentPage::class)
                                <li><a href="{{ route('admin_c_page') }}"><span>@lang('sidebar.c_page')</span></a></li>
                            @endcan
                            @can('list', Modules\Entity\Model\ContentReview\ContentReview::class)
                                <li><a href="{{ route('admin_review') }}"><span>@lang('sidebar.review')</span></a></li>
                            @endcan
                            @can('list', Modules\Entity\Model\ContentTextBlock\ContentTextBlock::class)
                                <li><a href="{{ route('admin_text_block') }}"><span>@lang('sidebar.text_block')</span></a></li>
                            @endcan
                        </ul>
                    </li>

                    <li class="">
                        <a href="#" class="has-ul"><i class="icon-database-menu"></i><span>@lang('sidebar.library')</span></a>
                        <ul class="hidden-ul" style="display: none;">
                            @can('list', Modules\Entity\Model\LibDiscipline\LibDiscipline::class)
                                <li><a href="{{ route('admin_lib_req') }}"><span>Требования к кандидатам</span></a></li>
                                <li><a href="{{ route('admin_lib_discipline') }}"><span>@lang('sidebar.lib_discipline')</span></a></li>
                            @endcan
                            @can('list', Modules\Entity\Model\LibLangStudy\LibLangStudy::class)
                                <li><a href="{{ route('admin_lib_lang_study') }}"><span>@lang('sidebar.lib_lang_study')</span></a></li>
                            @endcan
                            @can('list', Modules\Entity\Model\LibDegree\LibDegree::class)
                                <li><a href="{{ route('admin_lib_degree') }}"><span>@lang('sidebar.lib_degree')</span></a></li>
                            @endcan
                            @can('list', Modules\Entity\Model\LibUniverCat\LibUniverCat::class)
                                <li><a href="{{ route('admin_lib_uni_cat') }}"><span>@lang('sidebar.lib_uni_cat')</span></a></li>
                            @endcan
                            @can('list', Modules\Entity\Model\LibCity\LibCity::class)
                                <li><a href="{{ route('admin_lib_city') }}"><span>@lang('sidebar.lib_city')</span></a></li>
                            @endcan
                            @can('list', Modules\Entity\Model\LibCountry\LibCountry::class)
                                <li><a href="{{ route('admin_lib_country') }}"><span>@lang('sidebar.lib_country')</span></a></li>
                            @endcan
                            @can('list', Modules\Entity\Model\LibContinent\LibContinent::class)
                                <li><a href="{{ route('admin_lib_continent') }}"><span>@lang('sidebar.lib_continent')</span></a></li>
                            @endcan
                        </ul>
                    </li>


                    @if (Auth::user()->type_id == 1)
                        <li><a href="{{ route('admin_log') }}"><i class="icon-cog3"></i> <span>@lang('sidebar.logs')</span></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>