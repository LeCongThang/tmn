@extends('frontend.layout.master')
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
    <section class="news-detail session-video">
        <div class="container">
            <div class="">
                <iframe width="100%"
                        src="{{$video? $video['embed_link'] : ''}}">
                </iframe>
            </div>
            <h1>{{$video['title']}}</h1>
            <div class="content">
                {!! $video['description'] !!}
            </div>
        </div>
    </section>
@endsection


    

