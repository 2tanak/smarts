@extends('main.phone.layout')

@section('title', $title)

@section('content')
    <div class="faq">
        <div class="container">
            <h3 class="title _left">{{ $title }}</h3>

            {!! $item->note !!}
        </div>
    </div>
@endsection

