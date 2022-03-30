@extends('main.phone.layout')

@section('title', $title)

@section('content')

    <div class="register">
        <div class="container">

            <div class="register_block grid_dbl__block">
                <form action="{{ lroute('student_registration_save') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3 class="title _left">@lang('front_main.registration.title')</h3>

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
                        <input type="checkbox" name="" id="check_r_1" required>
                        <label for="check_r"><p>@lang('front_main.registration.agreement', ['link' => lroute('page_policy')])</p></label> <br />

                        <input type="checkbox" name="" id="check_r_2" required>
                        <label for="check_r_2"><p>@lang('front_main.registration.agreement_2', ['link' => lroute('page_term')])</p></label> <br />

                        <input type="checkbox" name="" id="check_r_3" required>
                        <label for="check_r_3"><p>@lang('front_main.registration.agreement_3')</p></label>
                    </div>

                    <div class="btn-group__grid">
                        <button type="submit" class="button-green__cercle">@lang('front_main.registration.submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 @endsection
