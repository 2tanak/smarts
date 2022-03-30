@extends('main.desktop.layout')

@section('title', $title)

@section('content')
    <section class="section univers-list">
        <div class="container">
            <div class="global-path" style="margin-bottom: 10px;">
                <a href="{{ lroute('index') }}">@lang('front_main.title.index')</a>
                <i class="fa fa-angle-right"></i>
                <p>{{ $title }}</p>
            </div>
            <div class="list-univers__block">
                <div class="__filter">
                    @include('main.desktop.__uni_block.filter')
                </div>
                <div class="__univers">
                    <div class="__filter">
                        <div class="__select">
                            @include('main.desktop.__uni_block.sort')
                        </div>
                        <div class="__item-loc">
                            <p>@lang('front_main.show'):</p>
                            <div class="btn-group">
                                <a href="{{ lroute('univer_index') }}" class="active"> <img src="/images/icons/univer.png" alt=""> @lang('front_main.vuz') </a>
                                <a href="{{ lroute('univer_program') }}"> <img src="/images/icons/prog.png" alt=""> @lang('front_main.programss') </a>
                            </div>
                        </div>

                        {!! $univers->appends($request->all())->links('vendor.pagination.ss') !!}
                    </div>

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
                        <div class="__list">
                            @foreach($univers as $u)
                                @include('main.desktop.__uni_block.uni_block', ['model' => $u])
                            @endforeach
                        </div>
                        {!! $univers->appends($request->all())->links('vendor.pagination.ss') !!}
                    @endif

                    
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        
        $( document ).ready(function() {
            var degree_select = $('select[name="degree_id"]').val()
            checkDegreeId(degree_select)

            $('select[name="degree_id"]').change( function (){
                checkDegreeId($(this).val())
            });
        });

        function checkDegreeId(value){
            let degree_bool = Number.isInteger(parseInt(value))
            if (degree_bool == true) {
                $('.not_degree').hide()
                $('input[name="cost[]"]').parent().show();
                    
            } else {
                // console.log($('input[name="cost[]"]').parent('.checkbox-group'))
                $('.not_degree').show()
                $('input[name="cost[]"]').parent().hide()
                $('input[name="cost[]"]').each(function (i, item) {
                    if (this.checked) {
                        item.checked = false    
                    }
                    
                });
            }
            
        }
    </script>
@endsection