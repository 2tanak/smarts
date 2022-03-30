<section class="section filter">
    <form action="">
        <div class="__head">
            <p>@lang('front_main.filter.title')</p>
            <span class="js_clear_all">@lang('front_main.filter.clear')</span>
        </div>
        <div class="global_input">
            <input type="search" name="name" placeholder="@lang('front_main.filter.search_by_name')" value="{{$request->name}}">
        </div>

        <h3 class="filter-title">
            <p>@lang('front_main.filter.coutry')</p>
        </h3>

        <div class="global_select mb-3">
            <select class="js_flag_select  js-states form-control" name="country_id" id="country_id">
                <option value="" >@lang('front_main.note_selected')</option>
                @foreach ($filter_lib['country'] as $c)
                    <option value="{{ $c->id }}" data-img="{{ $c->photo ? env('FILE_SERVER_URL').'/'.$c->photo : '' }}" {{ $request->country_id == $c->id ? 'selected' : '' }}>
                        {{ $c->name }}
                    </option>
                @endforeach
            </select>
        </div>
        {{-- <div class="global_select">
            <select class="select2 js-states form-control" name="city_id" id="city_id">
                @foreach ($filter_lib['city'] as $c)
                    <option value="{{ $c->id }}"  class="js_lib_city js_lib_city_{{ $c->country_id }}" {{ $request->city_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
        </div> --}}

        <h3 class="filter-title">
            <p>@lang('front_main.filter.degree') </p>
        </h3>

        <div class="global_select">
            <select class="select2 js-states form-control" name="degree_id">
                <option value="" >@lang('front_main.note_selected')</option>
                @foreach ($filter_lib['degree'] as $c)
                    <option value="{{ $c->id }}"   {{ $request->degree_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
        </div>

        <h3 class="filter-title">
            <p>@lang('front_main.filter.discplines')</p>
            <span class="js_clear_next" data-sel="ar_discpline">@lang('front_main.filter.clear')</span>
        </h3>

        <div class="checkbox-group ar_discpline">
            @foreach ($filter_lib['discpline'] as $c)
                <div class="global-checkbox">
                    <input type="checkbox" id="check-discpline-{{ $c->id }}"
                            name="discpline_id[]"  value="{{ $c->id }}"
                            {{ is_array($request->discpline_id) && in_array($c->id, $request->discpline_id) ? 'checked' : '' }} />
                    <label for="check-discpline-{{ $c->id }}">{{ $c->name }}</label>
                </div>
            @endforeach
        </div>

        <h3 class="filter-title">
            <p>@lang('front_main.filter.cost')</p>
            <span class="js_clear_next" data-sel="ar_cost">@lang('front_main.filter.clear')</span>
        </h3>

        <div class="checkbox-group ar_cost">
            @foreach ($filter_lib['cost'] as $c)
                <div class="global-checkbox">
                    <input type="checkbox" id="check-cost-{{ $c }}"
                            name="cost[]"  value="{{ $c }}"
                            {{ is_array($request->cost) && in_array($c, $request->cost) ? 'checked' : '' }} />
                    <label for="check-cost-{{ $c }}">
                        @if($loop->last)
                            @lang('front_main.filter.more') {{ $c }} $/@lang('front_main.filter.cost_year')
                        @else
                            {{ $c }} $/@lang('front_main.filter.cost_year')
                        @endif
                    </label>
                </div>
            @endforeach
            <div class="not_degree">
                <p>@lang('front_main.filter.not_degree')</p>
            </div>
        </div>




        <h3 class="filter-title">
            <p>@lang('front_main.filter.additional')</p>
            <span class="js_clear_next" data-sel="ar_additional">@lang('front_main.filter.clear')</span>
        </h3>
        <div class="checkbox-group ar_additional">
            <div class="global-checkbox">
                <input type="checkbox" id="check-is_campus"
                        name="is_campus" value="1"
                        {{ $request->is_campus ? 'checked' : '' }} />
                <label for="check-is_campus">@lang('front_main.filter.is_campus')</label>
            </div>
            <div class="global-checkbox">
                <input type="checkbox" id="check-is_med_insurance"
                        name="is_med_insurance" value="1"
                        {{ $request->is_med_insurance ? 'checked' : '' }} />
                <label for="check-is_med_insurance">@lang('front_main.filter.is_med_insurance')</label>
            </div>
            <div class="global-checkbox">
                <input type="checkbox" id="check-is_library"
                        name="is_library" value="1"
                        {{ $request->is_library ? 'checked' : '' }} />
                <label for="check-is_library">@lang('front_main.filter.is_library')</label>
            </div>
            <div class="global-checkbox">
                <input type="checkbox" id="check-is_inter_programm"
                        name="is_inter_programm" value="1"
                        {{ $request->is_inter_programm ? 'checked' : '' }} />
                <label for="check-is_inter_programm">@lang('front_main.filter.is_inter_programm')</label>
            </div>
            <div class="global-checkbox">
                <input type="checkbox" id="check-is_career"
                        name="is_career" value="1"
                        {{ $request->is_career ? 'checked' : '' }} />
                <label for="check-is_career">@lang('front_main.filter.is_career')</label>
            </div>
            <div class="global-checkbox">
                <input type="checkbox" id="check-is_clubs"
                        name="is_clubs" value="1"
                        {{ $request->is_clubs ? 'checked' : '' }} />
                <label for="check-is_clubs">@lang('front_main.filter.is_clubs')</label>
            </div>
        </div>

        <div class="filterBtnWrapper">
            <button class="filterBtn w-100 mt-3">
                <!--<span>Найдено: 571</span> -->
                @lang('front_main.filter.submit')
            </button>
        </div>
    </form>
</section>
