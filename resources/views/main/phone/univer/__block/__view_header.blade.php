<section class="section view-header" style="background: url(/images/view-header.png)">
    <div class="__share">
        <a href="#">
            <img src="/images/icons/share.png" alt="">
        </a>
    </div>
    <div class="__logo">
        <div class="__img">
            <img src="{{ fileLink($univer->logotip) }}" alt="">
        </div>
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
        </div>
    </div>
    <div class="__info">
        <p>
            @if ($univer->relCountry->photo != null)
                <img src="{{ env('FILE_SERVER_URL').'/'.$univer->relCountry->photo }}" alt="" height="20px">
            @endif
            
            
            {{ $univer->relCountry->name }} </p>
        <h1>{{ $univer->name }}</h1>
        <div class="__adres">
            @if ($univer->relData->web_sait)
                <p>
                    @lang('front_main.univer.sait'): 
                </p>
                <a href="{{ $univer->relData->web_sait_clean }}" target="_blank"> &nbsp;{{ $univer->relData->web_sait }}</a>
            @endif
        </div>
    </div>
</section>