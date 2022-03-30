@extends('main.phone.layout')

@section('title', $title)

@section('content')

    <div class="profile-view">
        <div class="top_position__profile">

            <div class="global-path">
                <a href="{{ lroute('index') }}">@lang('front_main.title.index')</a>
                <i class="fa fa-angle-right"></i>
                <p>{{ $title }}</p>
            </div>

            <a href="{{ lroute('student_logout') }}" class="logout">
                <img src="/images/icons/logout.png" alt="">Logout
            </a>
        </div>

        <form action="{{ lroute('student_profile_save') }}" method="post" enctype="multipart/form-data">
            <section class="section profile-user">
                <div class="__user">
                    <div class="__img" style="background: url({{ fileLink($user->photo) }})"></div>
                    <h3>{{ $student_data->f_name}}</h3>
                </div>
            </section>
            <section class="section profile-user">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="global_input">
                    <input type="email" placeholder="@lang('front_main.profile.email') *" name="email" value="{{ $user->email }}" required >
                </div>
                <div class="global_input">
                    <input type="password" placeholder="@lang('front_main.profile.password')" name="password"   >
                </div>


                <div class="global_input">
                    <input type="search" placeholder="@lang('front_main.profile.f_name') *" name="f_name" value="{{ $student_data->f_name }}" required>
                </div>
                <div class="global_input">
                    <input type="search" placeholder="@lang('front_main.profile.s_name')" name="s_name" value="{{ $student_data->s_name }}">
                </div>

                <div class="global_input">
                    <input type="file"  name="photo" placeholder="@lang('front_main.profile.photo')" >
                </div>

                <div class="__head">
                    <p>@lang('front_main.profile.date_b') <span>*</span></p>
                </div>
                <div class="global_input">
                    <input type="date" name="date_b" value="{{ $student_data->date_b }}" required>
                </div>

                <div class="__head">
                    <p>@lang('front_main.profile.country_id')  <span>*</span></p>
                </div>
                <div class="global_select">
                    <select class="select2 js-states form-control" name="country_id" required>
                        @foreach (Modules\Entity\Model\LibCountry\LibCountry::get() as $c)
                            <option value="{{ $c->id }}" {{ $student_data->country_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="__head">
                    <p>@lang('front_main.profile.phone') <span>*</span></p>
                </div>
                <div class="global_input-phone">
                    <p>+7</p>
                    <input type="text" name="phone" value="{{ $student_data->phone }}" required>
                </div>

                <div class="__head">
                    <p>@lang('front_main.profile.enter_date') </p>
                </div>
                <div class="global_input">
                    <input type="text" name="enter_date" value="{{ $student_data->enter_date }}" >
                </div>

                <div class="__head">
                    <p>@lang('front_main.profile.need_degree_id') <span>*</span></p>
                </div>
                <div class="global_select mb-2">
                    <select class="select2 js-states form-control" name="need_degree_id">
                        @foreach (Modules\Entity\Model\LibDegree\LibDegree::get() as $c)
                            <option value="{{ $c->id }}" {{ $student_data->need_degree_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="__head">
                    <p>@lang('front_main.profile.note')</p>
                </div>
                <div class="global_input">
                    <textarea name="note" id="" cols="30" rows="10" >{{ $student_data->note }}</textarea>
                </div>

                <div class="__head">
                    <p>@lang('front_main.profile.how_can_connect') <span>*</span></p>
                </div>

                <div class="checkbox-group">
                    <div class="global_checkbox mb-3 mt-2">
                        <input type="checkbox" id="check-m-connect_email" name="connect_email" value='1' {{ $student_data->connect_email ? 'checked' : '' }}>
                        <label for="check-m-connect_email" style="color:#212529">@lang('front_main.profile.connect_email') </label>
                    </div>
                    <div class="global_checkbox mb-3">
                        <input type="checkbox" id="check-m-connect_phone" name="connect_phone" value='1' {{ $student_data->connect_phone ? 'checked' : '' }}>
                        <label for="check-m-connect_phone" style="color:#212529">@lang('front_main.profile.connect_phone')</label>
                    </div>
                    <div class="global_checkbox mb-4">
                        <input type="checkbox" id="check-m-connect_sms" name="connect_sms" value='1' {{ $student_data->connect_sms ? 'checked' : '' }}>
                        <label for="check-m-connect_sms" style="color:#212529"> @lang('front_main.profile.connect_sms')</label>
                    </div>
                </div>


                <div class="btn-group__grid">
                    <button type="submit" class="button-green__cercle w-100">@lang('front_main.registration.submit')</button>
                </div>
            </section>
        </form>
    </div>

    <div class="register">
        <div class="container">

        </div>
    </div>
 @endsection
