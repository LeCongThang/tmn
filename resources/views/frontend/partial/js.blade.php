<script type="text/javascript" src="{{asset('/')}}js/frontend/numscroller-1.0.js"></script>
<script type="text/javascript" src="{{asset('/')}}js/frontend/easing.js"></script>
{{--<script type="text/javascript" src="{{asset('/')}}js/frontend/sliderResponsive.js"></script>--}}
<script type="text/javascript" src="{{asset('/')}}js/frontend/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
        });
    });
</script>
<script src="{{asset('/')}}js/wow.min.js"></script>
<script src="{{asset('js/frontend')}}/ninja-slider.js" type="text/javascript"></script>
<script>
    new WOW().init();
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    });
</script>
<script>
    $('.click-gallery').click(function (e) {
        var a_href = $(this).attr('href');
        e.preventDefault();
        $.ajax({
            url: a_href,
            type: 'GET',
            contentType: 'application/json; charset=utf-8',
            success: function (data) {
                $("#ulSlider").append(data);
                var ninjaSldr = document.getElementById("ninja-slider");
                ninjaSldr.parentNode.style.display = "block";
                nslider.init(0);
                var fsBtn = document.getElementById("fsBtn");
                fsBtn.click();
            }
        });
    });
    function fsIconClick(isFullscreen, ninjaSldr) {
        if (isFullscreen) {
            ninjaSldr.parentNode.style.display = "none";
            window.location.href=window.location.href;
        }
    }
</script>
<script type="text/javascript">
    $(function() {
        $(".img-lazyload").lazyload({
            effect : "fadeIn"
        });
    });
</script>
@yield('js')