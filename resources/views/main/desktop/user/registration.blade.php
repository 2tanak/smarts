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
                <form action="{{ lroute('student_registration_save') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>@lang('front_main.registration.title')</h3>

                    <div class="global_input">
                        <p>@lang('front_main.registration.name')*</p>
                        <input type="text" name="name" required>
                    </div>
                    <div class="global_input">
                        <p>@lang('front_main.registration.email')*</p>
                        <input type="email" name="email" required>
                    </div>
                    <div class="global_input">
                        <p>@lang('front_main.registration.password')*</p>
                        <input type="password" name="password" required />
                    </div>

                    <div class="global_checkbox">
                        <input type="checkbox" name="" id="check_r" required>
                        <label for="check_r"><p>@lang('front_main.registration.agreement', ['link' => lroute('page_policy')])</p></label> <br />

                        <input type="checkbox" name="" id="check_r_1" required>
                        <label for="check_r_1"><p>@lang('front_main.registration.agreement_2', ['link' => lroute('page_term')])</p></label> <br />

                        <input type="checkbox" name="" id="check_r_2" required>
                        <label for="check_r_2"><p>@lang('front_main.registration.agreement_3')</p></label>
                    </div>

                    <div class="btn-group__grid">
                        <button type="submit" class="button-green__cercle w-100">@lang('front_main.registration.submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 @endsection
