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
    <section class="session-gallery">
        <div class="container">
            <div class="col-md-12 gallery">
                @if(count($gallery)!=0)
                    @foreach($gallery as $item)
                        <div class="div-gallery @if($loop->iteration == 4|| $loop->iteration == 5||$loop->iteration == 6|| $loop->iteration == 7) col-md-3 @else col-md-4 @endif col-sm-6 wow animated @if($loop->iteration%2==0) fadeInUp @else fadeInDown @endif ">
                            <div class="basic-widgets">
                                <div class="project-hover">
                                    <div class="image img-lazyload" data-original="{{asset('images/gallery')}}/{{$item['image']['image']}}" style="background: url({{asset('images/gallery')}}/{{$item['image']['image']}}) no-repeat;
                                            background-size: cover"></div>
                                    <!-- <img src="img/g1.jpg" class="img-responsive transition"> -->
                                    <div class="text-view transition text-center">
                                        <a class="click-gallery" data-id="{{$item['id']}}" href="{{url('bo-suu-tap')}}/{{$item['id']}}">{{$item['title']}}</a>
                                        {{--<a class="" onclick="lightbox(0)">{{$item['title']}}</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-md-12">
                <div class="phantrang">
                    {{$gallery->links()}}
                </div>
            </div>
        </div>


    </section>
@endsection
@section('js')

@endsection

