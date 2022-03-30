
<section class="section global-tabs">
    <div class="container">
        <ul>
            <li class="{{ $request->fullUrl() ==  lroute('univer_view', $univer) ? 'active' : '' }}">
                <a href="{{ lroute('univer_view', $univer) }}">@lang('front_main.univer.about')</a>
            </li>
            <li class="{{ $request->fullUrl() ==  lroute('univer_view_stud_life', $univer) ? 'active' : '' }}">
                <a href="{{ lroute('univer_view_stud_life', $univer) }}">@lang('front_main.univer.student_life')</a>
            </li>
            <li class="{{ $request->fullUrl() ==  lroute('univer_view_program', $univer) ? 'active' : '' }}">
                <a href="{{ lroute('univer_view_program', $univer) }}">@lang('front_main.univer.programs')</a>
            </li>
            <li class="{{ $request->fullUrl() ==  lroute('univer_view_comuna', $univer) ? 'active' : '' }}">
                <a href="{{ lroute('univer_view_comuna', $univer) }}">@lang('front_main.univer.community')</a>
            </li>
        </ul>
	    <div style="clear:both"></div>
    </div>
</section>