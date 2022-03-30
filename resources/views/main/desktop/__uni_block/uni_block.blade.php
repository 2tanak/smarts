<div class="univer-card">
    <div class="__head">
        <div class="img" style="background: url({{ fileLink($model->logotip) }})"></div>
        <div class="__status">
            @if ($model->rank_word)
                <div class="__yellow">
                    <span>qs</span>
                    <p>{{ $model->rank_word }}</p>
                </div>
            @endif
            @if ($model->rank_word)
                <div class="__green">
                    <span>ss</span>
                    <p>{{ $model->rank_local }}</p>
                </div>
            @endif
        </div>
    </div>
    <div class="__body">
        <a href="{{ lroute('univer_view', $model) }}"><h3>{{ $model->name }}</h3></a>
        <div class="__respublic">
            <!--<img src="/images/flags/rus.png" alt=""> -->
            @if ($model->relCountry->photo != null)
                <img src="{{ env('FILE_SERVER_URL').'/'.$model->relCountry->photo }}" alt="" height="20px">
            @endif
            {{ $model->country_name }},  {{ $model->city_name }}
        </div>
    </div>
    <div class="__footer">
        <!-- __green __red __orange -->
        <p>@lang('front_main.latest_update'): <span class="__green">{{ $model->updated_cool }}</span></p>
    </div>
</div>