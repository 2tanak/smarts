@extends('main.desktop.layout')

@section('title', $title)

@section('content')

    
    @include('main.desktop.program.__block.__view_header')
    @include('main.desktop.program.__block.__view_menu')

    <section class="section view-content">
        <div class="container">
            <div>
                <div class="__content">
                    <div class="__text">
                        {!! $program->discipline_note !!}
                    </div>
                </div>
            </div>
            
            @include('main.desktop.univer.__block.__view_sidebar')
        </div>
    </section>
@endsection

