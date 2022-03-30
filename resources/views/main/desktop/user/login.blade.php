@extends('main.desktop.layout')

@section('title', $title)

@section('content')
    <div class="register">
        <div class="container">
            <div class="global-path">
                <a href="{{ lroute('index') }}">@lang('front_main.title.index')</a>
                <i class="fa fa-angle-right"></i>
                <p>{{ $title }}</p>
            </div>

            <div class="register_block grid_dbl__block">
                <div class="img">
                    <img src="/images/regis_img.png" alt="">
                </div>
                <form action="{{ lroute('student_login_check') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>@lang('front_main.login.title')</h3>

                    <div class="global_input">
                        <p>@lang('front_main.login.email')*</p>
                        <input type="email" name="email" required>
                    </div>
                    <div class="global_input">
                        <p>@lang('front_main.login.password')*</p>
                        <input type="password" name="password" required />
                    </div>

                    <div class="btn-group__grid">
                        <button type="submit" class="button-green__cercle w-100">@lang('front_main.login.submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 @endsection
