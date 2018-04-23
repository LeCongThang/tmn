@extends('frontend.layout.master')

<?php
$title = "Product";
$product = true;
?>

@section('css')
    <style>
        .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{
            background-color: #a41d21;
            border-color: #a41d21;
        }
        .pagination>li>a, .pagination>li>span{
            margin-right: 10px;
            color: #a41d21;
        }
    </style>
@endsection


@section('content')
    @include('frontend.partial.header_other')
    <section class="session-dich-vu">
        <div class="container">
            @if(count($service)!=0)
                @foreach($service as $item)
                    @if($loop->iteration %2==0)
                        <div class="col-md-12 hidden-xs wow animated fadeInRight">
                            <div class="col-md-6 col-sm-6 div-title-content">
                                <a href="{{url('dich-vu')}}/{{$item['id']}}/{{str_slug($item['title'])}}"><h5>{{$item['title']}}</h5></a>
                                <div class="content">
                                    {!! $item['short_des'] !!}
                                </div>
                                <div class="col-md-12 text-center">
                                    <a href="{{url('dich-vu')}}/{{$item['id']}}/{{str_slug($item['title'])}}" class="btn btn-readmor">{{trans('frontend.xemthem')}}</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 div-image">
                                <a href="#"><img data-original="{{asset('images/service')}}/{{$item['image']}}" class="img-responsive img-lazyload" style="width: 100%"></a>
                            </div>
                        </div>
                        <div class="col-md-12 hidden-lg hidden-md hidden-sm  wow animated fadeInRight">
                            <div class="col-md-6 col-sm-6 div-image">
                                <a href="#"><img data-original="{{asset('images/service')}}/{{$item['image']}}" class="img-responsive img-lazyload" style="width: 100%"></a>
                            </div>
                            <div class="col-md-6 col-sm-6 div-title-content">
                                <a href="{{url('dich-vu')}}/{{$item['id']}}/{{str_slug($item['title'])}}"><h5>{{$item['title']}}</h5></a>
                                <div class="content">
                                    {!! $item['short_des'] !!}
                                </div>
                                <div class="col-md-12 text-center">
                                    <a href="{{url('dich-vu')}}/{{$item['id']}}/{{str_slug($item['title'])}}" class="btn btn-readmor">{{trans('frontend.xemthem')}}</a>
                                </div>
                            </div>

                        </div>
                    @else
                        <div class="col-md-12 wow animated fadeInLeft ">
                            <div class="col-md-6 col-sm-6 div-image">
                                <a href="#"><img data-original="{{asset('images/service')}}/{{$item['image']}}" class="img-responsive img-lazyload" style="width: 100%"></a>
                            </div>
                            <div class="col-md-6 col-sm-6 div-title-content">
                                <a href="{{url('dich-vu')}}/{{$item['id']}}/{{str_slug($item['title'])}}"><h5>{{$item['title']}}</h5></a>
                                <div class="content">
                                    {!! $item['short_des'] !!}
                                </div>
                                <div class="col-md-12 text-center">
                                    <a href="{{url('dich-vu')}}/{{$item['id']}}/{{str_slug($item['title'])}}" class="btn btn-readmor">{{trans('frontend.xemthem')}}</a>
                                </div>

                            </div>
                        </div>
                    @endif

                @endforeach
            @endif
                <div class="col-md-12">
                    <div class="phantrang">
                        {{$service->links()}}
                    </div>
                </div>
        </div>
    </section>


@endsection

@section('js')
   
@endsection