<div class="__sidebar">
    <div class="sidebar-card">
        <h3>@lang('front_main.univer.contact')</h3>

        @if ($univer->relData->address_off)
            <p>@lang('front_main.univer.address'):</p>
            <span>{{ $univer->relData->address_off }}</span>
        @endif

        @if ($univer->relData->phones)
            <p>@lang('front_main.univer.phone'):</p>
            <span>{{ $univer->relData->phones }}</span>
        @endif

        @if ($univer->relData->email)
            <p>@lang('front_main.univer.email'):</p>
            <span>{{ $univer->relData->email }}</span>
        @endif

        @if ($univer->relData->web_sait)
            <p>@lang('front_main.univer.sait'):</p>
			<a href="{{ $univer->relData->web_sait_clean }}" target="_blank"> &nbsp;{{ $univer->relData->web_sait }}</a>
        @endif

        @if ($univer->relSocial != null)
            <p class="social">@lang('fr.social_network'):</p>

            <div class="__social">
                <ul>
                    @if ($univer->relSocial->instagram != null)
                        <li><a href="//{{ $univer->relSocial->instagram }}" target="_blank"><img src="/images/icons/insta.png" alt=""></a></li>
                    @endif
                    @if ($univer->relSocial->twitter != null)
                        <li><a href="//{{ $univer->relSocial->twitter }}" target="_blank"><img src="/images/icons/twitter_t.png" alt=""></a></li>
                    @endif
                    @if ($univer->relSocial->youtube != null)
                        <li><a href="//{{ $univer->relSocial->youtube }}" target="_blank"><img src="/images/icons/youtube.png" alt=""></a></li>
                    @endif
                    @if ($univer->relSocial->facebook != null)
                        <li><a href="//{{ $univer->relSocial->facebook }}" target="_blank"><img src="/images/icons/facebook-t.png" alt=""></a></li>
                    @endif
                </ul>
            </div>
        @endif
        
    </div>

    @if (!isset($comunas))
        <div class="sidebar-card">
            <h3>@lang('front_main.univer.community')</h3>

            @forelse ($univer->relComunas()->accepted()->latest()->take(3)->get() as $c)
                @include('main.desktop.univer.comuna.__comuna_cart', ['model' => $c, 'off_foter'=>true])
            @empty
                <p>@lang('front_main.note_found_comuna')</p>
            @endforelse
        </div>
    @endif


    @include('main.desktop.univer.__block.contact_manager')
</div>
