@extends('frontend.layout.master')

@section('content')
    @include('frontend.partial.header_home')
    <div class="vnt-product">
        <div class="wrapper lazyloading show">
            <div class="title"><h2><span>TMN Custom Design</span></h2></div>
            <div class="p-content">Thỏa mãn những Trải nghiệm Đẳng cấp cùng tính Cá nhân hóa của Khách hàng</div>
        </div>
        <div class="grid-product">
            <div class="node-product lazyloading show">
                <div class="wrapper">
                    <div class="node-content">
                        <div class="i-title"><h1>{{trans('frontend.about')}}</h1></div>
                        {{--<div class="i-price">Từ 1,248,000,000 VND</div>--}}
                        {{--<div class="i-status">Biểu tượng mới về công nghệ xe Limousine</div>--}}
                        <div class="i-content"><p>{{$about['short_des']}}</p></div>
                        <div class="i-link"><a href="{{url('gioi-thieu')}}"><span>Khám phá</span></a></div>
                    </div>
                    <div class="node-images">
                                <span class="imageDetail img-lazyload"
                                      data-orginal="{{asset('images/about')}}/{{$about['image_big']}}"
                                      style="background-image:url({{asset('images/about')}}/{{$about['image_big']}});"></span>
                    </div>
                </div>
            </div>
            <div class="wrapper lazyloading show">
                <div class="title"><h2><span>{{trans('frontend.gallery')}}</span></h2></div>
                <div class="p-content">Cùng xem qua các dự án thú vị của TMN Custom Design</div>
            </div>
            @if(count($gallery)!=0)
                @foreach($gallery as $item)
                    <div class="node-product lazyloading show">
                        <div class="wrapper">
                            <div class="node-images">
                                <span class="imageDetail img-lazyload"
                                      data-orginal="{{asset('images/gallery')}}/{{$item['image']['image']}}"
                                      style="background-image:url({{asset('images/gallery')}}/{{$item['image']['image']}});"></span>
                            </div>
                            <div class="node-content">
                                <div class="i-title"><h1>{{$item['title']}}</h1></div>
                                <div class="i-price">Từ 1,248,000,000 VND</div>
                                {{--<div class="i-status">Biểu tượng mới về công nghệ xe Limousine</div>--}}
                                <div class="i-content"><p>Đây là thiết kế Kiểu MAYBACH cao cấp</p><p> chất liệu siêu sang được lấy cảm hứng từ nhà thiết kế italia </p></div>
                                <div class="i-link"><a class="click-gallery"
                                                       href="{{url('bo-suu-tap')}}/{{$item['id']}}"><span>Khám phá</span></a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!-- Liên hệ -->
    <section class="session-contact">
        <div class="container">
            <div class="col-md-8">
                <div class="div-about">

                    <h2>{{trans('frontend.service')}}</h2>
                    <hr class="hr-dv">
                    <div class="clearfix"></div>
                    @if(count($service)!=0)
                        @foreach($service as $item)
                            <div class="col-md-12" style="margin-bottom: 20px">
                                <div class="col-md-3 col-sm-4">
                                    <div class="image img-lazyload"
                                         data-original="{{asset('images/service')}}/{{$item['image']}}"
                                         style="background: url({{asset('images/service')}}/{{$item['image']}}) no-repeat;
                                                 background-size: cover"></div>
                                </div>
                                <div class="col-md-7 col-sm-8">
                                    <a class="title-service"
                                       href="{{url('dich-vu')}}/{{$item['id']}}/{{str_slug($item['title'])}}">{{$item['title']}}</a>
                                    <div class="div-content">
                                        {{$item['short_des']}}
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        @endforeach
                    @endif
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 wow animated fadeInRight">
                <div class=" div-contact">
                    <form action="{{url('submit-contact')}}" method="post">
                        <h5>{{trans('frontend.lienhengay')}}</h5>
                        <hr class="lienhe">
                        <div class="clearfix"></div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="col-md-12 text">
                            <div class="col-md-6 col-sm-6 text text-1">
                                <input name="name" required class="form-control"
                                       placeholder="{{trans('frontend.ten')}} (*)">
                            </div>
                            <div class="col-md-6 col-sm-6 text text-2">
                                <input name="phone" required class="form-control"
                                       placeholder="{{trans('frontend.sdt')}} (*)">
                            </div>
                        </div>
                        <div class="col-md-12 text">
                            <input name="email" required class="form-control" placeholder="Email (*)">
                        </div>
                        <div class="col-md-12 text">
                            <textarea name="message" required class="form-control" rows="3"
                                      placeholder="{{trans('frontend.tinnhan')}}"></textarea>
                        </div>
                        <div class="col-md-12 text">
                            <input type="submit" class="btn form-control" value="{{trans('frontend.gui')}}">
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    {{--News--}}
    <section class="session-news">
        <div class="container">
            <div class="col-md-12 title text-center">
                <h5>{{trans('frontend.tintucmoi')}}</h5>
                <hr>
            </div>
            <div class="col-md-12 news">
                @if(count($news)!=0)
                    @foreach($news as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12 wow animated
                            @if($loop->iteration%2==0)
                                fadeInRight
                            @else
                                fadeInLeft
                            @endif">
                            <div class="single-blog-post">
                                <div class="img-box">
                                    <img data-original="{{asset('images/news')}}/{{$item['image']}}"
                                         alt="{{$item['title']}}" class="img-responsive img-lazyload">
                                    <div class="overlay">
                                        <div class="box">
                                            <div class="content">
                                                <ul>
                                                    <li>
                                                        <a href="{{url('tin-tuc')}}/{{$item['id']}}/{{str_slug($item['title'])}}"><i
                                                                    class="fa fa-link"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="date">{{$item['date']}} </div>
                                </div>
                                <div class="content-box">
                                    <div class="content">
                                        <a href="{{url('tin-tuc')}}/{{$item['id']}}/{{str_slug($item['title'])}}">
                                            <h3>{{$item['title']}}</h3></a>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </section>
    <section class="announcement" style="background-color: #33373b;
    border-top: 1px solid #484b4f;
    padding: 30px 0;color: white;text-align: center">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <i class="fa fa-thumbs-up fa-3x"></i>
                    <b>TRÁCH NHIỆM</b>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-thumbs-up fa-3x"></i>
                    <b>CHUYÊN NGHIỆP</b>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-thumbs-up fa-3x"></i>
                    <b>UY TÍN</b>
                </div>
            </div>
        </div>
    </section>
@endsection
