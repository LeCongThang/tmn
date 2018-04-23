<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morris.js/morris.min.js"></script>
<script src="vendor/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="vendor/moment/min/moment.min.js"></script>
<script src="vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="vendor/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/mymenu/menu.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    $(function () {
        $('#discovered_vi').wysihtml5();
        $('#discovered_en').wysihtml5();
    })
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });
</script>
<script src="dist/js/hadesker.js"></script>
<script src="js/hadesker_function.js"></script>
<script>
    var language = 'vi';
    var defaultPath = '{{asset('img/default.png')}}';
    var config_switchery = {
        color: 'rgb(247, 228, 201)',
        secondaryColor: 'rgb(247, 228, 201)',
        size: 'small',
        jackColor: 'green',
        jackSecondaryColor: 'red'
    };
</script>

<script src="plugins/loading/loadingoverlay.min.js"></script>
<script>
    $(document).ajaxStart(function(){
        $.LoadingOverlay("show");
    });
    $(document).ajaxStop(function(){
        $.LoadingOverlay("hide");
    });
</script>
<!-- PNotify -->
<script src="plugins/pnotify/dist/pnotify.js"></script>
<script src="plugins/pnotify/dist/pnotify.buttons.js"></script>
<script src="plugins/pnotify/dist/pnotify.nonblock.js"></script>
<script type="text/javascript" src="fileinput/js/fileinput.min.js"></script>
<script src="{{URL::asset('')}}ckeditor/ckeditor.js"></script>
<script src="js/hbbfinder.js"></script>
{{--<script>--}}
    {{--$('.editors').each( function () {--}}
        {{--CKEDITOR.replace(this.id, {--}}
            {{--filebrowserUploadUrl: '/uploader',--}}
            {{--filebrowserBrowseUrl:'{{URL::asset('')}}folder'--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
<script>
    function Notify(title, text, type) {
        new PNotify({
            title: title,
            text: text,
            type: type,
            styling: 'bootstrap3'
        });
    }
</script>

<script src="plugins/jquery-confirm/jquery-confirm.min.js"></script>
<script type="text/javascript">
    @if(session()->has('flash'))
    $(function(){
        $.confirm({
            icon: 'fa fa-warning',
            title: 'Thông báo',
            content: '{!! session('flash')  !!}',
            type: 'blue',
            theme: 'light',
            typeAnimated: true,
            buttons: {
                close: {
                    text: 'Đóng'
                }
            }
        });
    });
    @endif
</script>
<script src="plugins/iCheck/icheck.min.js"></script>

@yield('scripts')