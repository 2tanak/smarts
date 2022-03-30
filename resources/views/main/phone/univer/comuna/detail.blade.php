@extends('main.phone.layout')

@section('title', $title)

@section('content')
    @include('main.phone.univer.__block.__view_menu')

    <section class="section view-content">
        <div class="container">
            <div>
                <button onclick="window.history.back();" class="button_white button_back mb-3"><i class="fa fa-arrow-left"></i>@lang('front_main.comuna.back_to_questions')</button>

                @include('main.phone.univer.comuna.__comuna_cart', ['model' => $comuna])

                <p class="count_answer">{{ $comuna->relMessages()->accepted()->count() }} @lang('front_main.comuna.comments')</p><br />

                <section class="section ">
                    @forelse($comuna_messages as $m)
                        @include('main.phone.univer.comuna.__message_cart', ['model' => $m])
                    @empty
                        <p></p>
                    @endforelse
                    {!! $comuna_messages->appends($request->all())->links('vendor.pagination.ss') !!}
                </section>

                @if (Auth::user())
                    <h4 class="mb-3">@lang('front_main.comuna.add_answer')</h4>

                    <form action="{{ lroute('univer_view_comuna_detail_add', [$univer, $comuna]) }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="global_input mb-3">
                            <textarea name="note" id="" cols="30" rows="10" placeholder="@lang('front_main.comuna.answer_note') *" ></textarea>
                        </div>
                        <button class="button_green w-100 mt-3" type="submit">@lang('front_main.comuna.send_asnwer')</button>
                    </form>
                @else
                    <p>@lang('front_main.note_found_comuna')</p>
                @endif

            </div>

        </div>
    </section>

@endsection
<br/>
