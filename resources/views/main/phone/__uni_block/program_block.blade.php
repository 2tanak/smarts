@php
    $uni = $model->relUniversity;
@endphp
<div class="program-card m-0" >
    <div class="__head">
        @if (!isset($off_uni))
            <div class="__img" style="background: url({{ fileLink($uni->logotip) }})"></div>
        @endif
        <div class="__title">
            <a href="{{ lroute('univer_view', $uni) }}/programs">{{ $model->name }}</a>
            @if ($model->relDegree)
                <p>{{ $model->relDegree->name }}</p>
            @endif
        </div>
    </div>
    <div class="__body">

        @if (!isset($off_uni))
            <div>
                <a href="{{ lroute('univer_view', $uni) }}">{{ $uni->name }}</a>
                <br>
                <div style="display: flex; margin-top: 3px;">
                    <span class="program-card-flag" style="display: inline-block;">
                        @if ($uni->relCountry->photo != null)
                            <img src="{{ env('FILE_SERVER_URL').'/'.$uni->relCountry->photo }}" alt="" height="20px">
                        @endif
                    </span>
                    <span>
                        <!--<img src="/images/flags/rus.png" alt=""> -->
                        {{ $uni->relCountry->name }},  {{ $uni->relCity->name }}
                    </span>
                </div>
            </div>
        @endif
    </div>
    <div class="__footer">
        @if ($model->study_start)
            <p>@lang('front_main.study_start'): {{ $model->study_start }}</p>
        @endif
    </div>
</div>
