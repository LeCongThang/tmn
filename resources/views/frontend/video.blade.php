@extends('frontend.layout.master')
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
    <section class="session-video-1">
        <div class="container video">
            <div class="col-md-12">
                @if(count($video)!=0)
                    @foreach($video as $item)
                        <div class="@if($loop->iteration == 4|| $loop->iteration == 5) col-md-6 @else col-md-4 @endif col-sm-6 plr0">
                            <div class="item">
                                <div class="image img-lazyload" data-original="{{$item['image']}}" style="background: url({{$item['image']}}) no-repeat;
                        background-size: cover; background-position: center center;">
                                </div>
                                <!-- <img src="img/g1.jpg" class="img-responsive transition"> -->
                                <div class="text-view transition text-center">
                                    <a href="{{url('video')}}/{{$item['id']}}/{{str_slug($item['title'])}}" class="btn bnt-video"><i class="fa fa-play-circle"></i></a>
                                    <a href="{{url('video')}}/{{$item['id']}}/{{str_slug($item['title'])}}">{{$item['title']}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-md-12">
                <div class="phantrang">
                    {{$video->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection

