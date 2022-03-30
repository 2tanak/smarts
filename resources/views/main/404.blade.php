@extends('main.desktop.layout')

@section('title', '404')

@section('content')
    <div class="error pb-3">
        <div class="container">
            <div class="top_block">
                <div class="global-path">
                    <a href="{{ lroute('index') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                    <p>404</p>
                </div>
            </div>
            <div class="error_block">
                <h1>4<span>0</span>4</h1>
                <p>Opps! This page Could Not Be Found!</p>
                <span>Sorry bit the page you are looking for does not exist, have been removed or name changed</span>
            </div>
        </div>
    </div>
@endsection

