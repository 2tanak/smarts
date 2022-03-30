@extends('main.phone.layout')

@section('title', $title)

@section('content')
   <section class="section header">
       <div class="header-block">
           <h1>@lang('front_main.welcome_title')</h1>
            <p>@lang('front_main.welcome_text')</p>

           <div class="__search">
                <form action="{{ lroute('univer_program') }}">
                   <div class="global_select">
                        <select class="select2  js-states form-control" name="country_id">
                            <option value="">@lang('front_main.country')</option>
                            @foreach ($filter_lib['country'] as $c)
                                <option value="{{ $c->id }}" {{ $request->country_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="global_select">
                        <select class="select2 js-states form-control" name="degree_id">
                            <option value="">@lang('front_main.degree')</option>
                            @foreach ($filter_lib['degree'] as $c)
                                <option value="{{ $c->id }}"   {{ $request->degree_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="global_search">
                       <i class="fa fa-search"></i>
                        <input type="search" placeholder="@lang('front_main.program_or_vuz')" name="name">
                   </div>

                   <button class="button_green w-100" type="submit">@lang('front_main.submit')</button>
               </form>
           </div>
           <a href="#">Пройдите опрос, и мы подберем для вас Вуз или программу <img src="/images/icons/rigth.png" alt=""></a>
       </div>
   </section>

    <section class="section main-tabs">
        @include('main.phone.__uni_block.content_filter')
    </section>

    @include('main.phone.__uni_block.index_filter')

    <section class="section univers-list">
        @if($univers && $univers->count() == 0)
            <div class="not_found">
                <h4>@lang('front_main.filter.nothing')</h4>

                <button class="button_yellow mt-3 mb-3" onclick="window.location.search = ''">@lang('front_main.filter.clear')</button>

                <p>@lang('front_main.filter.univer_info')</p>

                <ul>
                    <li>@lang('front_main.filter.search_university', ['route'=> lroute('univer_index')])</li>
                    <li>@lang('front_main.filter.go_to_index', ['route'=> lroute('index')])</li>
                    <li>@lang('front_main.filter.go_to_programs', ['route'=> lroute('univer_program')])</li>
                </ul>
            </div>
        @else
            @foreach($univers as $u)
                @include('main.phone.__uni_block.uni_block', ['model' => $u])
            @endforeach
        @endif
    </section>

    <section class="section blog">
        <h3 class="title">@lang('front_main.index.blog')</h3>

        <div class="blog-list">
            @foreach($blogs as $b)
                <div class="blog-card">
                    <div class="__info">
                        <h3>{{ $b->name }}</h3>
                        <p> {{ $b->news_date }}</p>
                        <span>{!! $b->short_note !!}</span>
                        <a href="{{ lroute('blog_view', $b) }}">@lang('front_main.view_button')</a>
                    </div>
                    <div class="__img" style="background: url({{ fileLink($b->photo) }})"></div>
                </div>
            @endforeach
        </div>
    </section>


    <section class="section what">
       <h3 class="title">@lang('front_main.index.review')</h3>

        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($reviews as $r)
                    <div class="swiper-slide">
                        <div class="comment-card">
                            <p>{!! $r->note !!}</p>
                            <div class="__user">
                                <div class="__name">
                                    <p>{{ $r->fio }}</p>
                                    <span>{{ $r->address }}</span>
                                </div>
                                <div class="__img" style="background: url({{ fileLink($r->photo) }})"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
@endsection
