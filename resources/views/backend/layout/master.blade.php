<!DOCTYPE html>
<html>
@include('backend.partial.head')
<body class="hold-transition skin-blue sidebar-mini {{isset($sidebar) ? 'sidebar-collapse' : ''}}">
<div class="wrapper">

    @include('backend.partial.header')

    @include('backend.partial.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            {{$title or ""}}<small>{{$subtitle or ""}}</small>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @include('backend.partial.alert')
                </div>
            </div>
            @hasSection('content')
                @yield('content')
            @else
                Có lỗi trong quá trình đọc nội dung...
            @endif
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.1.0
        </div>
        <strong>Copyright &copy; 2017-2018 Team.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->

@include('backend.partial.js')
@yield('js')
<script>
    $(window).bind("load", function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>
