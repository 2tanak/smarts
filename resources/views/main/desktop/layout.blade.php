@php 
    $q_setting = Modules\Entity\Model\ContentSetting\ContentSetting::first();
    if (!$q_setting) 
        $q_setting = new Modules\Entity\Model\ContentSetting\ContentSetting();
@endphp
<!DOCTYPE html>
<html lang="{{ App\Helper\CurrentLang::get() }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="text/javascript">
        if(window.innerWidth < 1100){
            window.location.href = '{{ changeViewModeUrl() }}';
        }
    </script>

    <link rel="shortcut icon" href="/favicon.png" type="image/png">

    @section('meta')
        <meta name="description" content="{{ $q_setting->getMetaNoteTr() }}">
        <meta name="keywords" content="{{ $q_setting->getMetaKeyWordTr() }}">
        <meta property="og:type" content="{{ Request::url() }}" />
        <meta property="og:title" content="@lang('front_main.title.index'). @yield('title')"/>
        <meta property="og:description" content="{{ $q_setting->getMetaNoteTr() }}"/>
        <meta property="og:image" content="{{ asset('images/back_1.png') }}"/>
        <meta property="og:image:type" content="png">
        <meta property="og:url" content= "{{ Request::url() }}" />
    @show


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ mix('/desktop/css/app.css') }}">
    <link rel="stylesheet" href="/custom/main.css">

    <title>@yield('title')</title>
    @yield('link')
   
    <script src="/js/jquery.js"></script>
	<script type="text/javascript" src="/vendor/sweetalert.min.js"></script>
    @yield('style')
    @yield('top_js')
</head>
<body>
    <!-- Menu -->
    @include('main.desktop.__include.menu')

    <!-- Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- footer -->
    @include('main.desktop.__include.footer')

    <script src="/js/select2.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ mix('/desktop/js/app.js') }} "></script>
    <script src="/custom/main.js"></script>
    <script>
        $( document ).ready(function() {
            $('.js_change_lang_trigger').change(function(){
                $(this).parent().parent().submit();
            });
        });
    </script>
    @yield('script')

    @include('vendor.sweet.alert')
</body>
</html>
