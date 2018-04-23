{{--<div class="w3ls-banner">--}}
{{--<div class="w3lsbanner-info">--}}
{{--<!-- header -->--}}
{{--<div class="header-top">--}}
{{--<div class="container ed-header-top">--}}
{{--<div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--<div class="lang-social">--}}
{{--<a target="_blank" href="{{$system['facebook']}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
{{--<a target="_blank" href="{{$system['zalo']}}"><i class="fa fa-zalo" aria-hidden="true"></i></a>--}}
{{--<a target="_blank" href="{{$system['skype']}}"><i class="fa fa-skype" aria-hidden="true"></i></a>--}}
{{--<a target="_blank" href="{{$system['viber']}}"><i class="fa fa-viber" aria-hidden="true"></i></a>--}}
{{--<a target="_blank" href="{{$system['google']}}"><i class="fa fa-google" aria-hidden="true"></i></a><br>--}}
{{--<a target="_blank" style="color: #fff">{{trans('frontend.numberofvisits')}}: {{$system['count_view_web']}}</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-md-6 col-sm-6 col-xs-6 ed-treat-contact text-right">--}}
{{--@if(session()->get('lang')=="vi")--}}
{{--<a href="{{url('/')}}/language/en" class="language-a"><i class="fa fa-globe" aria-hidden="true"></i> TIẾNG ANH</a>--}}
{{--@else--}}
{{--<a href="{{url('/')}}/language/vi" class="language-a"><i class="fa fa-globe" aria-hidden="true"></i> VIETNAMESE</a>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="header">--}}
{{--<div class="">--}}
{{--<div class="header-mdl1">--}}
{{--<!-- header-two -->--}}
{{--<a href="{{url('/')}}"><img src="{{asset('/')}}img/logo.jpg" class="img-responsive"></a>--}}
{{--</div>--}}
{{--<div class="header-nav">--}}
{{--<!-- header-three -->--}}
{{--<nav class="navbar navbar-default ed-navbar-default">--}}
{{--<div class="navbar-header">--}}
{{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">--}}
{{--<span class="sr-only">Toggle navigation</span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--</button>--}}
{{--</div>--}}
{{--<!-- top-nav -->--}}
{{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
{{--<ul class="nav navbar-nav cl-effect-16">--}}


{{--</ul>--}}
{{--<div class="clearfix"> </div>--}}
{{--</div>--}}
{{--</nav>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}


<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('/')}}img/logo2.png" class="img-responsive"
                                                                 alt="TMN">
                </a>
            </div>


            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="{{url('/')}}" @if(session()->get('active')==7) class="active"
                           @endif data-hover="{{trans('frontend.home')}}">{{trans('frontend.home')}}</a></li>
                    <li><a href="{{url('/gioi-thieu')}}" @if(session()->get('active')==1) class="active"
                           @endif data-hover="{{trans('frontend.about')}}">{{trans('frontend.about')}}</a></li>
                    <li><a href="{{url('/dich-vu')}}" @if(session()->get('active')==3) class="active"
                           @endif data-hover="{{trans('frontend.service')}}">{{trans('frontend.service')}}</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    {{--<li><a href="{{url('/tin-tuc')}}"@if(session()->get('active')==2) class="active" @endif data-hover="{{trans('frontend.news')}}">{{trans('frontend.news')}}</a></li>--}}
                    <li><a href="{{url('/bo-suu-tap')}}" @if(session()->get('active')==4) class="active"
                           @endif data-hover="{{trans('frontend.gallery')}}">{{trans('frontend.gallery')}}</a></li>
                    <li><a href="{{url('/video')}}" @if(session()->get('active')==5) class="active"
                           @endif data-hover="{{trans('frontend.video')}}">{{trans('frontend.video')}}</a></li>
                    <li><a href="{{url('/tin-tuc')}}" @if(session()->get('active')==2) class="active"
                           @endif data-hover="{{trans('frontend.news')}}">{{trans('frontend.news')}}</a></li>
                    <li><a href="{{url('/lien-he')}}" @if(session()->get('active')==6) class="active"
                           @endif data-hover="{{trans('frontend.contact')}}">{{trans('frontend.contact')}}</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>
</div>
<div class="sticky-container">
    <ul class="sticky">
        <li>
            <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
            <p>@if(session()->get('lang')=="vi")
                    <a href="{{url('/')}}/language/en" class="language-a">Change to<br>English</a>
                @else
                    <a href="{{url('/')}}/language/vi" class="language-a">Chuyển sang<br>Tiếng việt</a>
                @endif</p>
        </li>
        <li>
            <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
            <p><a href="{{$system['facebook']}}" target="_blank">Like Us on<br>Facebook</a></p>
        </li>

        <li>
            <i class="fa fa-youtube fa-2x" aria-hidden="true"></i>
            <p><a href="{{$system['google']}}" target="_blank">Subscribe on<br>YouYube</a></p>
        </li>

    </ul>
</div>
<style>
    .navbar-brand {
        transform: translateX(-50%);
        left: 50%;
        position: absolute;
    }

    /* DEMO example styles for logo image */
    .navbar-brand {
        padding: 0px;
    }

    .navbar-brand > img {
        height: 150%;
        /*width: auto;*/
        /*padding: 7px 14px;*/
        /*!*background: white;*!*/
    }

    @font-face {
        font-family: RobotoCondensedRegular;
        src: url({{url('')}}/fonts/RobotoCondensedRegular.woff2);
    }
    @font-face {
        font-family: OpenSansRegular;
        src: url({{url('')}}/fonts/OpenSansRegular.woff2);
    }
    /*body {*/
        /*font-family: "RobotoCondensedRegular";*/
        /*font-size: 17px;*/
    /*}*/

    @media (min-width: 768px) {
        .navbar-nav {
            border-bottom: 1px solid rgba(195, 195, 195, 0.38);
        }
    }

    .navbar-fixed-top {
        background-color: #26292c !important;
    }

    .sticky-container {
        padding: 0px;
        margin: 0px;
        position: fixed;
        right: -130px;
        bottom: 30px;
        width: 210px;
        z-index: 1100;
    }

    .sticky li {
        list-style-type: none;
        background-color: #26292c;
        color: white;
        height: 43px;
        padding: 0px;
        margin: 0px 0px 1px 0px;
        -webkit-transition: all 0.25s ease-in-out;
        -moz-transition: all 0.25s ease-in-out;
        -o-transition: all 0.25s ease-in-out;
        transition: all 0.25s ease-in-out;
        cursor: pointer;
    }

    .sticky li:hover {
        margin-left: -115px;
    }

    .sticky li i {
        float: left;
        margin: 5px 4px;
        margin-right: 5px;
        width: 32px;
    }

    .sticky li p {
        padding-top: 5px;
        margin: 0px;
        line-height: 16px;
        font-size: 11px;
    }

    .sticky li p a {
        text-decoration: none;
        color: white;
    }

    .sticky li p a:hover {
        text-decoration: underline;
    }
</style>