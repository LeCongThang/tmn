<!DOCTYPE html>
<html lang="en">
<head>

    {!! \App\Http\Controllers\Frontend\HomeController::meta() !!}
    @include('frontend.partial.css')

</head>
<body>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-54272139-1', 'auto');
        ga('send', 'pageview');

    </script>
    @hasSection('content')
        @yield('content')
    @else
        Có lỗi trong quá trình đọc nội dung...
    @endif
{{--{!! \App\Http\Controllers\Frontend\HomeController::Footer() !!}--}}
    {{--@include('frontend.partial.footer')--}}
<div id="modalMessage" class="modal modal-ms fade" role="dialog">
        <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                        <div class="modal-header" style="background: #a41d21; color: #fff">
                                <h4 class="modal-title">{{trans('frontend.thongbao')}}</h4>
                        </div>
                        <div class="modal-body">
                                <p id="txtMessage"></p>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-spa" data-dismiss="modal">OK</button>
                        </div>
                </div>

        </div>
</div>
    <div style="display:none;">
        <div id="ninja-slider">
            <div class="slider-inner">
                <ul id="ulSlider">

                </ul>
                <div id="fsBtn" class="fs-icon" title="Expand/Close"></div>
            </div>
        </div>
    </div>
@if(Session::get('contact'))
        @if(Session::get('contact')==1)
                <script>
                    $(function() {
                        document.getElementById("txtMessage").innerHTML = "{{trans('frontend.lienhethanhcong')}}";
                        $('#modalMessage').modal('show');
                    });
                </script>
        @else
                <script>
                    $(function() {
                        document.getElementById("txtMessage").innerHTML = "{{trans('frontend.lienhethatbai')}}";
                        $('#modalMessage').modal('show');
                    });
                </script>
        @endif
@endif

    {!! \App\Http\Controllers\Frontend\HomeController::footer() !!}
    @include('frontend.partial.js')
</body>
</html>