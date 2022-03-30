@extends('main.desktop.layout')

@section('title', $title)

@section('content')

    @include('main.desktop.univer.__block.__view_header')
    @include('main.desktop.univer.__block.__view_menu')

    <section class="section view-content">
        <div class="container">
            <div>
                <div class="__text">
                    @if (Auth::user())
                        <h4 class="mb-3">@lang('front_main.comuna.add_new')</h4>
                        <form action="{{ lroute('univer_view_comuna_add', [$univer]) }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="global_input mb-3">
                                <input type="text" placeholder="@lang('front_main.comuna.name') *" name="name"  required>
                            </div>
                            <div class="global_input mb-3">
                                <textarea name="note" id="" cols="30" rows="10" placeholder="@lang('front_main.comuna.note') *" ></textarea>
                            </div>
                            <div class="__head ">
                                <p>@lang('front_main.comuna.tags')</p>
                            </div>
                            <div class="global_select mb-2">
                                <select class="select2 js-states form-control" name="tags[]" multiple required>
                                    @foreach (Modules\Entity\Model\Comuna\Comuna::getTagAr() as $k => $c)
                                        <option value="{{ $k }}" >{{ trans('front_main.comuna.tag_'.$k) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="button_green w-100 mt-3" type="submit">@lang('front_main.comuna.send')</button>
                        </form>
                    @else
                        <p></p>
                    @endif
                </div>
                @forelse($comunas as $c)
                    @include('main.desktop.univer.comuna.__comuna_cart', ['model' => $c])
                @empty
                    <p class="mt-3">@lang('front_main.note_found_comuna')</p>
                @endforelse
                {!! $comunas->appends($request->all())->links('vendor.pagination.ss') !!}
            </div>
            @include('main.desktop.univer.__block.__view_sidebar')
        </div>
    </section>
@endsection

