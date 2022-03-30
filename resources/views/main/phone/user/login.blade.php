@extends('main.phone.layout')

@section('title', $title)

@section('content')
    
    <div class="register">
        <div class="container">

            <div class="register_block grid_dbl__block">
                <form action="{{ lroute('student_login_check') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3 class="title _left">@lang('front_main.login.title')</h3>

                    <div class="global_input">
                        <p>@lang('front_main.login.email')*</p>
                        <input type="email" name="email" required>
                    </div>
                    <div class="global_input">
                        <p>@lang('front_main.login.password')*</p>
                        <input type="password" name="password" class="pass" required />
                    </div>
                    <!--
                    <div class="global_checkbox">
                        <input type="checkbox" class="showPass" name="" id="check_r">
                        <label for="check_r">Показать пароль</label>
                    </div>-->

                    <div class="btn-group__grid">
                        <button type="submit" class="button-green__cercle">@lang('front_main.login.submit')</button>
                    </div>
                </form>
            </div>
            <div class="signInBlock">
                Нет аккаунта? <a href="{{ lroute('student_registration') }}">Зарегестрируйтесь</a>
            </div>
        </div>
    </div>
 @endsection
