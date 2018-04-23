<footer class="ed-footer">
    <div class="container ">
        {{--<div class="scroll-top">--}}
            {{--<a  href="#top" class="top0 fa fa-angle-up"></a>--}}
        {{--</div>--}}
        <div class="footer-bottom">
            <div class="col-md-4">
                <img src="{{asset('/')}}img/logo2.png" class="img-responsive">
                <div class="contact">
                    {{--<p>{{trans('frontend.diachict')}}: {{$system['address']}}</p>--}}
                    <p>{{trans('frontend.sdt')}}: {{$system['phone']}}</p>
                    <p>email: {{$system['email']}} </p>
                </div>
            </div>
            <div class="col-md-4 text-left">
                <p><b>Xưởng:</b></p>
                <p>Công Ty TNHH Phát Thái Hưng
                    96-98A</p>
                <p> Đường Liên Khu 2-5, P. Bình Trị Đông, Q.BT, HCM</p>
                <p><b>Văn phòng:</b></p>
                <p>
                    290 An Dương Vương F4 Q5</p>
                <p>
                    Everich Infiniti
                    Lầu 01- phòng 02.35
                </p>
            </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <iframe src="{{$system['site_map']}}" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <p>©TMN Custom Design 2018.</p>
            </div>
        </div>
    </div>
</footer>