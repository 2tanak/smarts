@extends('main.phone.layout')

@section('title', $title)

@section('content')
    <section class="section main-tabs __border">
        @include('main.phone.__uni_block.content_filter')
    </section>

    @include('main.phone.__uni_block.filter')

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
            {!! $univers->appends($request->all())->links('vendor.pagination.ss_mobile') !!}
        @endif

        
    </section>



    

@endsection
