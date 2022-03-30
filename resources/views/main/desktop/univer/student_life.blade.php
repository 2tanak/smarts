@extends('main.desktop.layout')

@section('title', $title)

@section('content')
    
    @include('main.desktop.univer.__block.__view_header')
    @include('main.desktop.univer.__block.__view_menu')

    <section class="section view-content studentLifePage">
        <div class="container">
            <div>
                <div class="__content">
                    <h4>@lang('fr.uni_student_life')</h4>
                    <div class="__text">
                        {!! $univer->relData->student_life_text !!}
                    </div>
                    
                    @include('main.desktop.univer.__block.__view_galary')
                </div>
                
            </div>
            
            @include('main.desktop.univer.__block.__view_sidebar')
        </div>
    </section>
@endsection

