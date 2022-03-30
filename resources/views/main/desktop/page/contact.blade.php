@extends('main.desktop.layout')

@section('title', $title)

@section('content')
    <div class="contact">
        <div class="container">
            <div class="global-path">
                <a href="{{ lroute('index') }}">@lang('front_main.title.index')</a>
                <i class="fa fa-angle-right"></i>
                <p>{{ $title }}</p>
            </div>

            <div class="form_block">
                <div class="info">
                    <h3>@lang('front_main.contect.title')</h3>
                    @foreach ($items as $i)
                        <div class="user_info">
                            <div class="img" style="background: url({{ fileLink($i->photo) }})">
                                <img src="{{ fileLink($i->photo) }}" alt="">
                            </div>
                            <div class="text">
                                <h4>{{ $i->name }}</h4>
                                <p>{{ $i->position }}</p>
                                <a href="tel:{{ $i->mobile }}">{{ $i->mobile }}</a>
                                <a href="mailto:{{ $i->email }}">{{ $i->email }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <form action="{{ lroute('page_save_contact') }}" method="post">
                    <input type="text" name="name" id="" placeholder="@lang('front_main.contect.name')*" required>
                    <input type="email" name="email" id="" placeholder="@lang('front_main.contect.email')" required>
                    <textarea name="note" id="note" placeholder="@lang('front_main.contect.messages')"></textarea>
                    <button type="submit" class="button-green__cercle w-100">@lang('front_main.contect.send_button')</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
        @if ($map->coor)
            <div class="map_contact">
                <div id="map"></div>
                
                <input type="hidden"  value="{{ $map->coor }}" id="data_coor">
                <input type="hidden"  value="{{ $map->getNoteTr() }}" id="data_coor_name">
            </div>
        @endif
    </div>
@endsection


@section('style')
    <style>
        .footer{
            margin: 0;
        }
    </style>
@endsection


@section('script')
    <script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=60445215-6d3a-4f88-87fe-8d52b72e5bc9"></script>

    <script>
        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                center: JSON.parse($('#data_coor').val()),
                zoom: 15,
                controls: []
            }),

            // Создаём макет содержимого.
            MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
            ),

            myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                balloonContent: $('#data_coor_name').val()
            }, {
                // Опции.
                // Необходимо указать данный тип макета.
                iconLayout: 'default#image',
                // Своё изображение иконки метки.
                iconImageHref: '/images/icons/map_icon.svg',
                // Размеры метки.
                iconImageSize: [20, 35],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                iconImageOffset: [-5, -38]
            });

            myMap.geoObjects.add(myPlacemark)
        });
    </script>
@endsection


