<div class="menu">
    <div class="menu-block">
        <div class="__logo">
            <a href="/"><img src="/images/icons/logo.png" alt="@lang('front_main.title.index')"></a>
        </div>

        <div class="__rigth">
            <div class="__list">
                <ul>
                    <li class="{{ \Request::route()->getName() =='index'  ? 'active' : '' }}">
					    <a href="/">@lang('front_main.title.index')</a>
					</li>
					
                    <li class="{{ \Request::is('*/univer*') ? 'active' : '' }}">
					    <a href="{{ lroute('univer_index') }}"  >@lang('front_main.title.univer')</a>
					</li>
                    <li class="program {{ \Request::is('*/program*') ? 'active' : '' }}"><a href="{{ lroute('univer_program') }}">@lang('front_main.title.program')</a></li>
                    <li class="{{ \Request::is('*/page/about*') ? 'active' : '' }}"><a href="{{ lroute('page_about') }}">@lang('front_main.title.about')</a></li>
                    <li class="{{ \Request::is('*/page/contact*') ? 'active' : '' }}"><a href="{{ lroute('page_contact') }}">@lang('front_main.title.contact')</a></li>
                </ul>
            </div>

            <div class="__auth">
                @if (Auth::user() && Auth::user()->isUser())
                    <a href="{{ lroute('student_profile') }}" class="button-green__cercle">@lang('front_main.title.profile')</a>
                    <span>@lang('front_main.title.or')</span>
                    <a href="{{ lroute('student_logout') }}" >@lang('front_main.logout')</a>
                @elseif (Auth::user())
                    <a href="{{ route('admin_profile') }}" class="button-green__cercle">@lang('front_main.title.profile')</a>
                    <span>@lang('front_main.title.or')</span>
                    <a href="{{ route('admin_logout') }}" >@lang('front_main.logout')</a>
                @else
                    <a href="{{ lroute('student_registration') }}" class="button-green__cercle">@lang('front_main.title.registration')</a>
                    <span>@lang('front_main.title.or')</span>
                    <a href="{{ lroute('student_login') }}" >@lang('front_main.title.enter')</a>
                @endif
            </div>

            <div class="__select">
                <form action="{{ lroute('change_lang') }}" method="post">
                    <div class="global_select">
                        <select class="select2 js-states form-control js_change_lang_trigger" name="lang" >
                            @foreach ($q_lang->getAr() as $k => $v)
                                <option value="{{ $k }}" {{ $q_lang->get() == $k ? 'selected' : '' }}>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                <!--
                <div class="global_select">
                    <select class="select2 js-states form-control">
                        <option value="rus">$USD</option>
                        <option value="rus">Russia</option>
                        <option value="rus">Russia</option>
                    </select>
                </div>
                -->
            </div>
        </div>
    </div>
</div>
