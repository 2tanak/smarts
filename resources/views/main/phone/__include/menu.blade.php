<div class="menu" id="menu">
    <div class="menu_block">
        <div class="__burger js_burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="__logo">
            <a href="{{ lroute('index') }}">
                <img src="/images/icons/logo.png" alt="">
            </a>
        </div>
        <div class="__user">
            @if (Auth::user() && Auth::user()->isUser())
                <a href="{{ lroute('student_profile') }}"><img src="/images/icons/user.png" alt=""></a>
            @elseif (Auth::user()) 
                <a href="{{ route('admin_profile') }}"><img src="/images/icons/user.png" alt=""></a>
            @else 
                <a href="{{ lroute('student_login') }}"><img src="/images/icons/user.png" alt=""></a>
            @endif 
        </div>
    </div>
</div>

<div class="sidebar-menu">
    <div class="__close js_close-menu"><img src="/images/icons/close.png" alt=""></div>

    <div class="__lang">
        <p>@lang('fr.lang_site')</p>
        
		<form action="{{ lroute('change_lang') }}" method="post">
		    <input type="hidden" name="lang" value=""/>
            <ul>
                @foreach ($q_lang->getAr() as $k => $v)
                    <li data-lang="{{ $k }}" class="js_change_lang_trigger">
                        <a href="#">{{ $v }}</a>
                    </li>
                @endforeach
            </ul>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
	
	
	
	<div class="__menu">
        <ul>
            <li><a href="{{ lroute('index') }}">@lang('front_main.title.index')</a></li>
            <li><a href="{{ lroute('univer_index') }}">@lang('front_main.title.univer')</a></li>
            <li><a href="{{ lroute('univer_program') }}">@lang('front_main.title.program')</a></li>
            <li><a href="{{ lroute('page_about') }}">@lang('front_main.title.about')</a></li>
            <li><a href="{{ lroute('page_contact') }}">@lang('front_main.title.contact')</a></li>
        </ul>
    </div>
   
    <div class="__social">
        <ul>
            @if ($q_setting->twitter)
                <li><a href="{{ $q_setting->twitter }}" target="_blank"><img src="/images/icons/twitter.png" alt=""></a></li>
            @endif
            @if ($q_setting->insta)
                <li><a href="{{ $q_setting->insta }}" target="_blank"><img src="/images/icons/instagram.png" alt=""></a></li>
            @endif
            @if ($q_setting->youtube)
                <li><a href="{{ $q_setting->youtube }}" target="_blank"><img src="/images/icons/you.png" alt=""></a></li>
            @endif
            @if ($q_setting->facebook)
                <li><a href="{{ $q_setting->facebook }}" target="_blank"><img src="/images/icons/facebook.png" alt=""></a></li>
            @endif
        </ul>
    </div>
</div>

<a href="#menu" class="scrollto">
    <div class="button-top"  v-scroll-to="{ el: '#menu', container: 'body', }">
        <i class="fa fa-angle-up"></i>
    </div>
</a>
