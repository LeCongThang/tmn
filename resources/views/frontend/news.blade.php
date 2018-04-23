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
    <section class="session-tintuc">
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-8">
                    @if(count($news)!=0)
                        @foreach($news as $item)
                            <div class="col-md-12">
                                <div class="item-news wow animated fadeInRight">
                                    <div class="col-md-12 header">
                                        <ul>
                                            <li><span>{{$item['month']}}</span></li>
                                            <li class="date"><span>{{$item['day']}}</span></li>
                                            <li><span>{{$item['year']}}</span></li>
                                        </ul>
                                        <div class="title">
                                            <a href="{{url('tin-tuc')}}/{{$item['id']}}/{{str_slug($item['title'])}}"><h5>{{$item['title']}}</h5></a>
                                            <span><i class="fa fa-user"></i> Admin - <i class="fa fa-eye"> {{$item['count_view']}}</i> </span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <img data-original="{{asset('images/news')}}/{{$item['image']}}" class="img-responsive img-lazyload" alt="{{$item['title']}}">
                                    <div class="content">
                                        {!! $item['short_des'] !!}
                                    </div>
                                    <a href="{{url('tin-tuc')}}/{{$item['id']}}/{{str_slug($item['title'])}}" class="btn btn-readmor">{{trans('frontend.xemthem')}}</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                        <div class="col-md-12">
                            <div class="phantrang">
                                {{$news->links()}}
                            </div>
                        </div>
                </div>
                <div class="col-md-4">
                    @if(count($category)!=0)
                        @foreach($category as $item)
                            <div class="category-item">
                                <h4>{{$item['title']}}</h4>
                                @foreach($item['news'] as $new)
                                    <div class="item">
                                        <img data-original="{{asset('images/news')}}/{{$new['image']}}" class="img-lazyload" alt="{{$new['title']}}">
                                        <div class="title">
                                            <a href="{{url('tin-tuc')}}/{{$new['id']}}/{{str_slug($new['title'])}}"><h5>{{$new['title']}}</h5></a>
                                            <p><span><i class="fa fa-calendar"></i> {{$new['date']}}</span><br>
                                                <span><i class="fa fa-user"></i> Admin - <i class="fa fa-eye"> {{$new['count_view']}}</i></span></p>
                                            <a href="{{url('tin-tuc')}}/{{$new['id']}}/{{str_slug($new['title'])}}" class="a-remore"><i class="fa fa-arrow-right"></i> {{trans('frontend.xemthem')}}</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>


@endsection

@section('js')
   
@endsection