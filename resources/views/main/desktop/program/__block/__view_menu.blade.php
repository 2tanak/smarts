
<section class="section global-tabs">
    <div class="container">
        <ul>
            <li class="{{ $request->fullUrl() ==  lroute('univer_program_view', $program) ? 'active' : '' }}">
                <a href="{{ lroute('univer_program_view', $program) }}">@lang('front_main.program.about')</a>
            </li>
            <li class="{{ $request->fullUrl() ==  lroute('univer_program_dicpline', $program) ? 'active' : '' }}">
                <a href="{{ lroute('univer_program_dicpline', $program) }}">@lang('front_main.program.dicpline')</a>
            </li>
            <li class="{{ $request->fullUrl() ==  lroute('univer_program_how_enter', $program) ? 'active' : '' }}">
                <a href="{{ lroute('univer_program_how_enter', $program) }}">@lang('front_main.program.how_enter')</a>
            </li>
        </ul>
    </div>
</section>