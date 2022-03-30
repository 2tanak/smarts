@extends('main.desktop.layout')

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

            <div class="accardion_block">
                @foreach ($items as $i)
                    <div class="accardion_element">
                        <h3>{{ $i->name }}</h3>
                        <div>
                            {!! $i->note !!}
                        </div>
                    </div>
                @endforeach
            </div>

            <h3 class="title mb-5 pb-0">@lang('front_main.question.title')</h3>

            <div class="faq_form">
                <form action="{{ lroute('page_save_question') }}" method="post">
                    <div class="_dbl_block">
                        <div class="input form_input">
                            <p>@lang('front_main.question.name')*</p>
                            <input type="text form_input" name="name" required>
                        </div>
                        <div class="input form_input">
                            <p>@lang('front_main.question.email')</p>
                            <input type="email" name="email"  >
                        </div>
                    </div>
                    <div class="_dbl_block">
                        <div class="input form_input">
                            <input type="text" placeholder="@lang('front_main.question.title_question')" name="Title">
                        </div>
                        <div class="input form_input">
                            <input type="text" placeholder="@lang('front_main.question.propose')" name="propose">
                        </div>
                    </div>
                    <div class="form_input">
                        <textarea name="note" id="note" cols="30" rows="10" placeholder="@lang('front_main.question.message')" required></textarea>
                    </div>
                    <button type="submit" class="button-green__cercle pos_center">@lang('front_main.question.send_button')</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
    </div>
@endsection

