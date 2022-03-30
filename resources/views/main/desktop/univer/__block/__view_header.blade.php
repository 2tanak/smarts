<section class="section view-header" style="background: url(/images/view-header.png) no-repeat center/cover">
    <div class="container">
        <div class="__logo">
            <div class="__img">
                <img src="{{ fileLink($univer->logotip) }}" alt="">
            </div>
        </div>
        <div class="__info">
            <h1>{{ $univer->name }}</h1>
            <p>
                @if ($univer->relCountry->photo != null)
                    <img src="{{ env('FILE_SERVER_URL').'/'.$univer->relCountry->photo }}" alt="" height="20px">
                @endif
                {{ $univer->country_name }},  {{ $univer->city_name }}
            </p>

            @if ($univer->relData && $univer->relData->web_sait)
                <p>
                    @lang('front_main.univer.sait'):
                    <a href="{{ $univer->relData->web_sait_clean }}" target="_blank"> &nbsp;{{ $univer->relData->web_sait }}</a>
                </p>
            @endif
            <div class="__status">
                @if ($univer->rank_word)
                    <div class="__yellow">
                        <span>qs</span>
                        <p>{{ $univer->rank_word }}</p>
                    </div>
                @endif
                @if ($univer->rank_local)
                    <div class="__green">
                        <span>ss</span>
                        <p>{{ $univer->rank_local }}</p>
                    </div>
                @endif
                <!--
                <div class="__share">
                    <a href="#">
                        В избранное
                        <img src="/images/icons/star.png" alt="">
                    </a>
                </div>

                -->
            </div>
        </div>
        <div class="__path">
            <ul>
                <li><a href="{{ lroute('index') }}">@lang('front_main.title.index') <i class="fa fa-angle-right"></i> </a></li>
                <li><a href="{{ lroute('univer_index') }}">@lang('front_main.title.univer')  <i class="fa fa-angle-right"></i> </a></li>
                <li><p>{{ $univer->name }}</p></li>
            </ul>
        </div>
    </div>
</section>


@section('top_js')
    <script src="https://yastatic.net/share2/share.js" async="async" charset="utf-8"></script>
@endsection
