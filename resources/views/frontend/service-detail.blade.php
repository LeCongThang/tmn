@extends('frontend.layout.master')
@section('keywords'){{$service['tags']}}@endsection
@section('css')
    <style>
        p img{
            max-width: 100% !important;
            border: 1px solid #cecece;
            padding: 20px;
            height: auto !important;
        }
    </style>
@endsection
@section('content')
    @include('frontend.partial.header_other')
    <section class="news-detail">
        <div class="container">
            <img data-original="{{asset('images/service')}}/{{$service['image']}}" class="img-lazyload img-avatar img-responsive">
            <h1>{{$service['title']}}</h1>
            <div class="content">
                {!! $service['description'] !!}
            </div>
        </div>
    </section>
@endsection


    

