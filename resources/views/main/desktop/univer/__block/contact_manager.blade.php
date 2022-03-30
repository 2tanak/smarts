@php 
    $manager = $univer->getManager();
    $student_data = App\Services\StudentData::get();
    if (!$manager)
        $manager = \App\User::getAdminManager();
@endphp

@if ($manager)
    <section class="section manager-block">
        <div class="univer-manager__info">
            <div class="__univer">
                <img src="{{ fileLink($univer->logotip) }}" alt="">
                <p>{{ $univer->name }}</p>
            </div>
            <div class="__manager">
                <p>@lang('front_main.univer.contact_manager')</p>
                <div class="__user">
                    <div class="__img" style="background: url('{{ fileLink($manager->photo) }}')"></div>
                    <div class="__name">
                        <p>{{ $manager->name }}</p>
                        @if ($manager->id != 2)
                            <span>{{ $manager->position }}</span>
                        @else 
                            <span>@lang('front_main.contact_manager.admin_position')</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ lroute('connect_manager') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="univer_id" value="{{ $univer->id }}">
            <input type="hidden" name="manager_id" value="{{ $manager->id }}">
            <div class="global_input mb-2">
                <input type="text" placeholder="@lang('front_main.contact_manager.f_name') *" name="f_name" value="{{ $student_data->f_name }}" required>
            </div>
            <div class="global_input">
                <input type="text" placeholder="@lang('front_main.contact_manager.s_name')" name="s_name" value="{{ $student_data->s_name }}">
            </div>

            <div class="__head">
                <p>@lang('front_main.contact_manager.date_b') <span>*</span></p>
            </div>
            <div class="global_input">
                <input type="date" name="date_b" value="{{ $student_data->date_b }}" required>
            </div>

            <div class="__head">
                <p>@lang('front_main.contact_manager.country_id')  <span>*</span></p>
            </div>
            <div class="global_select mb-2">
                <select class="select2 js-states form-control" name="country_id" required>
                    @foreach (Modules\Entity\Model\LibCountry\LibCountry::get() as $c)
                        <option value="{{ $c->id }}" {{ $student_data->country_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="global_input">
                <input type="email" placeholder="@lang('front_main.contact_manager.email') *" name="email" value="{{ $student_data->email }}" required >
            </div>

            <div class="__head">
                <p>@lang('front_main.contact_manager.phone') <span>*</span></p>
            </div>
            <div class="global_input-phone">
                <p>+7</p>
                <input type="text" name="phone" value="{{ $student_data->phone }}" required>
            </div>

            <div class="__head">
                <p>@lang('front_main.contact_manager.enter_date') <span>*</span></p>
            </div>
            <div class="global_input">
                <input type="text" name="enter_date" value="{{ $student_data->enter_date }}" required>
            </div>

            <div class="__head">
                <p>@lang('front_main.contact_manager.need_degree_id') <span>*</span></p>
            </div>
            <div class="global_select mb-2">
                <select class="select2 js-states form-control" name="need_degree_id">
                    @foreach (Modules\Entity\Model\LibDegree\LibDegree::get() as $c)
                        <option value="{{ $c->id }}" {{ $student_data->need_degree_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="__head">
                <p>@lang('front_main.contact_manager.note') <span>*</span></p>
            </div>
            <div class="global_input">
                <textarea name="note" id="" cols="30" rows="10" >{{ $student_data->note }}</textarea>
            </div>

            <div class="__head">
                <p>@lang('front_main.contact_manager.how_can_connect') <span>*</span></p>
            </div>

            <div class="checkbox-group">
                <div class="global-checkbox">
                    <input type="checkbox" id="check-m-connect_email" name="connect_email" value='1' {{ $student_data->connect_email ? 'checked' : '' }}>
                    <label for="check-m-connect_email">@lang('front_main.contact_manager.connect_email') </label>
                </div>
                <div class="global-checkbox">
                    <input type="checkbox" id="check-m-connect_phone" name="connect_phone" value='1' {{ $student_data->connect_phone ? 'checked' : '' }}>
                    <label for="check-m-connect_phone">@lang('front_main.contact_manager.connect_phone')</label>
                </div>
                <div class="global-checkbox">
                    <input type="checkbox" id="check-m-connect_sms" name="connect_sms" value='1' {{ $student_data->connect_sms ? 'checked' : '' }}>
                    <label for="check-m-connect_sms"> @lang('front_main.contact_manager.connect_sms')</label>
                </div>
            </div>

            <div class="__data">
                <p>@lang('front_main.contact_manager.agreement')</p>
            </div>

            <div class="global-checkbox">
                <input type="checkbox" id="check-m-4" required>
                <label for="check-m-4">@lang('front_main.contact_manager.accept_text') <span>*</span></label>
            </div>
            @if ($manager->id == 2)
                <p style="color:#fff">@lang('front_main.contact_manager.admin_position_sign')</p>
            @endif

            <button class="button_white w-100 mt-3" type="submit">@lang('front_main.contact_manager.send_button')</button>
        </form>
    </section>
@endif