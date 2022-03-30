@php
	$route = Route::currentRouteName();	  
@endphp
   
<ul>
    <li>
        @include('main.phone.__uni_block.sort')
    </li>
    <li class="js-open-filter">
        <i class="fa fa-filter"></i>
        @lang('front_main.filter.title')
    </li>
    <!-- <li class="active">
        @if($route == 'univer_index')
            <i class="fa fa-university"></i>
            <a href="{{ lroute('univer_program') }}/{{$phone}}" class="active"> <img src="/images/icons/univer.png" alt=""> @lang('front_main.programss')</a>
        @endif
        @if($route == 'univer_program' || $route == 'index' || $route =='univer_view_program')
            <i class="fa fa-university"></i>
            <a href="{{ lroute('univer_index') }}/{{$phone}}" class="active"> <img src="/images/icons/univer.png" alt=""> @lang('front_main.vuz') </a>
        @endif
    </li> -->
</ul>