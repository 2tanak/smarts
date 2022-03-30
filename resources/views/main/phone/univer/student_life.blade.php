@extends('main.phone.layout')

@section('title', $title)

@section('content')
    @include('main.phone.univer.__block.__view_menu')
   
    <section class="section content">
        <h4>@lang('fr.uni_student_life')</h4>
        <div class="__text">
            {!! $univer->relData->student_life_text !!}
         
            @include('main.phone.univer.__block.__view_galary')
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('.imageGallery a').css('height', $('.imageGallery li').innerWidth())
    </script>
@endsection

