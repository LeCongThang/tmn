@extends('backend.layout.master')
@section('title')
    TMN - Tin tức
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
            <small>Tin tức</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Tin tức</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <a href="{{route('news.create')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Thêm Tin tức</a>
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
                                @if(count($news)!=0)
                                <table id="datatable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th style="width: 150px">Hình ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th>Loại tin</th>
                                        <th>Lượt xem</th>
                                        <th width="100px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <img src="{{asset('images/news')}}/{{$item->image}}" style="width: 100%">
                                            </td>
                                            <td>{{$item->title_vi}}</td>
                                            <td>{{$item->category_vi}}</td>
                                            <td>{{$item->count_view}}</td>

                                            <td>
                                                <a href="{{url('admin/news/')}}/{{$item->id}}/edit" class="btn btn-primary" title="Chi thiết"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="{{url('admin/news/delete')}}/{{$item->id}}" class="btn btn-danger delete" title="Xóa"><i class="fa fa-close"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                            <div class="tab-pane" id="english">
                                @if(count($news)!=0)
                                    <table id="datatable1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th style="width: 150px">Image</th>
                                            <th>Title</th>
                                            <th>News Category</th>
                                            <th>View</th>
                                            <th width="100px"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($news as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    <img src="{{asset('images/news')}}/{{$item->image}}" style="width: 100%">
                                                </td>
                                                <td>{{$item->title_en}}</td>
                                                <td>{{$item->category_en}}</td>
                                                <td>{{$item->count_view}}</td>
                                                <td>
                                                    <a href="{{url('admin/news/')}}/{{$item->id}}/edit" class="btn btn-primary" title="Chi thiết"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="{{url('admin/news/delete')}}/{{$item->id}}" class="btn btn-danger delete" title="Xóa"><i class="fa fa-close"></i></a>
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
                    $('#modal_DeleteNews').modal('show');
                }
            });
        });
    </script>
@endsection