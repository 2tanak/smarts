
<section class="section view-header pt-4 pb-4" style="background: url(/images/view-header.png)">
    <div class="container __main">
        <div class="__info">
            <h1>{{ $program->name }}</h1>
            @if ($program->relDegree)
                <div class="__type">
                    <p>{{ $program->relDegree->name }}</p>
                    <!--<div class="global_select">
                        <select class="select2 js-states form-control">
                            <option value="rus">Другие уровни</option>
                            <option value="rus">Другие уровни</option>
                            <option value="rus">Другие уровни</option>
                        </select>
                    </div>
                    -->
                </div>
            @endif
        </div>
        <div class="__path">
            <ul>
                <li><a href="{{ lroute('index') }}">@lang('front_main.title.index') <i class="fa fa-angle-right"></i> </a></li>
                <li><a href="{{ lroute('univer_program') }}">@lang('front_main.title.program')  <i class="fa fa-angle-right"></i> </a></li>
                <li><p>{{ $program->name }}</p></li>
            </ul>
        </div>
    </div>
</section>