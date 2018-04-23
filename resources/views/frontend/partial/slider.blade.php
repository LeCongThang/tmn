<div class="banner-slide">
    {{--<div>--}}
    {{--<div class="slider" id="slider3">--}}
    {{--@if(count($slider)!=0)--}}
    {{--@foreach($slider as $item)--}}
    {{--<div class="pic-banner img-background" data-original="{{asset('images/slider')}}/{{$item->image}}" style="background:url({{asset('images/slider')}}/{{$item->image}}) no-repeat; background-size: cover; background-position: center center;">--}}
    {{--<span>--}}

    {{--</span>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--@endif--}}

    {{--<!-- The Arrows -->--}}
    {{--<i class="left" class="arrows" style="z-index:2; position:absolute;">--}}
    {{--<svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path>--}}
    {{--</svg>--}}
    {{--</i>--}}
    {{--<i class="right" class="arrows" style="z-index:2; position:absolute;">--}}
    {{--<svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) ">--}}
    {{--</path>--}}
    {{--</svg>--}}
    {{--</i>--}}
    {{--</div>--}}

    {{--</div>--}}
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @if(count($slider)!=0)
                @foreach($slider as $item)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$loop->iteration-1}}"></li>

                @endforeach
            @endif

        </ol>
        <div class="carousel-inner" role="listbox">
            @if(count($slider)!=0)
                @foreach($slider as $item)

                    <div class="item">
                        <img src="{{asset('images/slider')}}/{{$item->image}}">
                    </div>
                @endforeach
            @endif

        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>
</div>
<style>
    .carousel .item {
        width: 100%; /*slider width*/
        max-height: 100%; /*slider height*/
    }

    .carousel .item img {
        width: 100%; /*img width*/
    }
</style>
<script>
    $("#carousel-example-generic .carousel-inner .item:first").addClass("active");
    $("#carousel-example-generic .carousel-indicators li:first").addClass("active");
</script>