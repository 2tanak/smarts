@extends('main.desktop.layout')

@section('title', $title)

@section('content')

    
    @include('main.desktop.program.__block.__view_header')
    @include('main.desktop.program.__block.__view_menu')

    <section class="section view-content">
        <div class="container">
            <div>
                <div class="__content">
                    <div class="__text border-0 pb-0">
                        <h4>{{ $program->name }}</h4>

                        <div class="__univer-info">
                            <div class="__head">
                                <div class="__logo">
                                    <div class="__img">
                                        <img src="{{ fileLink($univer->logotip) }}" alt="">
                                    </div>
                                </div>
                                <div class="__desc">
                                    <h1>{{ $univer->name }}</h1>
                                    <p>
                                        <!-- <img src="/images/flags/eng.png" alt="">  -->
                                        {{ $univer->relCountry->name }},  {{ $univer->relCity->name }} 
                                    </p>
                                </div>
                            </div>
                            @if ( $program->study_start)
                                <p>@lang('front_main.program.study_start') <span>{{ $program->study_start }}</span></p>
                            @endif
                            @if ( $program->study_end)
                                <p>@lang('front_main.program.study_end') <span>{{ $program->study_end }}</span></p>
                            @endif
                            @if ( $program->duration_year)
                                <p>@lang('front_main.program.duration_year') <span>{{ $program->duration_year }}</span></p>
                            @endif
                            @if ( $program->relDegree)
                                <p>@lang('front_main.program.degree') <span>{{ $program->relDegree->name }}</span></p>
                            @endif
                            @if ( $program->price_for_inter)
                                <p>@lang('front_main.program.price_for_inter') <span>{{ $program->price_for_inter }}</span></p>
                            @endif
                            @if ( $program->price_for_citizen)
                                <p>@lang('front_main.program.price_for_citizen') <span>{{ $program->price_for_citizen }}</span></p>
                            @endif
                        </div>
                    </div>

                    
                    <div class="__text">
                        {!! $program->note !!}
                    </div>

                </div>
            </div>
            
            @include('main.desktop.univer.__block.__view_sidebar')
        </div>
    </section>
@endsection

