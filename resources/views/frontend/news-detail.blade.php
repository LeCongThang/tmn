@extends('frontend.layout.master')
@section('keywords'){{$news['tags']}}@endsection
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
            <img data-original="{{asset('images/news')}}/{{$news['image']}}" class="img-lazyload img-avatar img-responsive">
            <h1>{{$news['title']}}</h1>
            <p>Admin - {{$news['date']}} - <i class="fa fa-eye"> {{$news['count_view']}}</i></p>
            <div class="content">
                {!! $news['description'] !!}
            </div>
        </div>
    </section>
@endsection


    

