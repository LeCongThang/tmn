@extends('frontend.layout.master')

<?php
$title = "About";
$active = 2;
?>

@section('css')
    
@endsection


@section('content')
    @include('frontend.partial.header_other')

    <section class="session-about1">
        <div class="container">
            {!! $about['info_head'] !!}
        </div>
    
    </section>
    <section class="session-about-slider">
        <div class="container">
            <div class="slider-about">
                <header id="myCarousel" class="carousel slide bg-header">
                    <div class="carousel-inner">
                        <div class="item active  wow animated">
                            <div class="daumoc"><i class="fa fa-quote-left"></i></div>
                            <div class="clearfix"></div>
                            <div class="txt-slide">
                                <h2>What other say about us</h2>
                                <p>Chúng tôi có thể đem đến cho các bạn một không gian hòan tòan mới lạ cho chính chiếc xe của các bạn.
                                    Với sự sáng tạo và một đội ngũ lành nghề chúng tôi có thể đáp ứng mọi yêu cầu, từ phong cách cổ điển, thể thao hay sang trọng.</p>
                            </div>
                        </div>
                        <div class="item wow animated">
                            <div class="daumoc"><i class="fa fa-quote-left"></i></div>
                            <div class="clearfix"></div>
                            <div class="txt-slide">
                                <h2>What other say about u111s</h2>
                                <p>Chúng tôi có thể đem đến cho các bạn một không gian hòan tòan mới lạ cho chính chiếc xe của các bạn.
                                    Với sự sáng tạo và một đội ngũ lành nghề chúng tôi có thể đáp ứng mọi yêu cầu, từ phong cách cổ điển, thể thao hay sang trọng.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="icon-next"></span>
                    </a>
                </header>
            </div>
        </div>
    </section>
    <section class="session-about2">
        <div class="container">
            {!! $about['info_footer'] !!}
        </div>
    </section>

@endsection

@section('js')
   
@endsection