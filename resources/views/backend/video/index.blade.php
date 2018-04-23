@extends('backend.layout.master')
@section('title')
    TMN - Video
@endsection
@section('css')
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('js')
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
        var table = $('#datatable').DataTable({
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 0,2 ] }
            ]
        });
        var table1 = $('#datatable1').DataTable({
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 0,2 ] }
            ]
        });
    </script>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Trang chủ
            <small>Video</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Video</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <a href="{{route('video.create')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Thêm Video</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#vietnam" data-toggle="tab">Tiếng Viêt</a></li>
                                <li><a href="#english" data-toggle="tab">English</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="active tab-pane" id="vietnam">
                                @if(count($video)!=0)
                                <table id="datatable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th style="width: 150px">Hình ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th>Trang chủ</th>
                                        <th width="200px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($video as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <img src="{{$item->image}}" style="width: 100%">
                                            </td>
                                            <td>{{$item->title_vi}}</td>
                                            <td>
                                                @if($item->is_show==1)
                                                    <label class="label label-success">Đang hiển thị</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('admin/video/check')}}/{{$item->id}}" class="btn btn-primary" title="Hiển thị">Hiển thị trang chủ</a>
                                                <a href="{{url('admin/video/')}}/{{$item->id}}/edit" class="btn btn-primary" title="Chi thiết"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="{{url('admin/video/delete')}}/{{$item->id}}" class="btn btn-danger delete" title="Xóa"><i class="fa fa-close"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                            <div class="tab-pane" id="english">
                                @if(count($video)!=0)
                                    <table id="datatable1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th style="width: 150px">Image</th>
                                            <th>Title</th>
                                            <th>Show home</th>

                                            <th width="200px"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($video as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    <img src="{{$item->image}}" style="width: 100%">
                                                </td>
                                                <td>{{$item->title_en}}</td>
                                                <td>
                                                    @if($item->is_show==1)
                                                        <label class="label label-success">Đang hiển thị</label>
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{url('admin/video/check/')}}/{{$item->id}}" class="btn btn-primary" title="">Show home</a>
                                                    <a href="{{url('admin/video/')}}/{{$item->id}}/edit" class="btn btn-primary" title="Chi thiết"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="{{url('admin/video/delete')}}/{{$item->id}}" class="btn btn-danger delete" title="Xóa"><i class="fa fa-close"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $('.delete').click(function (e) {
            var a_href = $(this).attr('href');
            e.preventDefault();
            $.ajax({
                url: a_href,
                type: 'GET',
                contentType: 'application/json; charset=utf-8',
                success: function (data) {
                    $('body').prepend(data);
                    $('#modal_Deletevideo').modal('show');
                }
            });
        });
        $('input[type=radio][name=is_show]').change(function() {
            alert(this.value);
            if (this.value == 'allot') {
                alert("Allot Thai Gayo Bhai");
            }
            else if (this.value == 'transfer') {
                alert("Transfer Thai Gayo");
            }
        });
        function onCheck(id) {
            alert(id);
            var url='{{url('video/check')}}/'.id;
            $.ajax({
                url: url,
                type: 'GET',
                contentType: 'application/json; charset=utf-8',
                success: function (data) {
                    window.location.href=window.location.href;
                }
            });
        }

    </script>
    <script>
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })
    </script>
@endsection