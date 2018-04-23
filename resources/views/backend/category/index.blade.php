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
            <small>Loại Tin tức</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Loại Tin tức</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <a href="{{route('category.create')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Thêm Loại Tin tức</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Tiêu đề (tiếng việt)</th>
                                    <th>Tiêu đề (tiếng anh)</th>
                                    <th width="100px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($category)!=0)
                                @foreach($category as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->title_vi}}</td>
                                        <td>{{$item->title_en}}</td>
                                        <td>
                                            <a href="{{url('admin/category/')}}/{{$item->id}}/edit" class="btn btn-primary" title="Chi thiết"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="{{url('admin/category/delete')}}/{{$item->id}}" class="btn btn-danger delete" title="Xóa"><i class="fa fa-close"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>


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
                    $('#modal_DeleteCategory').modal('show');
                }
            });
        });
    </script>
@endsection