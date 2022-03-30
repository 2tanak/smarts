@extends('main.phone.layout')

@section('title', $title)

@section('content')
    <div class="faq">
        <div class="container">
            <div class="global-path">
                <a href="{{ lroute('index') }}">@lang('front_main.title.index')</a>
                <i class="fa fa-angle-right"></i>
                <p>{{ $title }}</p>
            </div>

            <h3 class="title _left">{{ $title }}</h3>

            {!! $blog->note !!}
        </div>
    </div>
@endsection

