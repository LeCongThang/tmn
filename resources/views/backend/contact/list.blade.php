@extends('backend.layout.master')
@section('title')
    TMN - Liên hệ
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
                { 'bSortable': false, 'aTargets': [5 ] }
            ]
        });
    </script>
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách</h3>
        </div>
        <div class="box-body">
            <div>
                <table id="datatable"  class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle;">#</th>
                        <th>Họ tên</th>
                        <th>Số điện thoai</th>
                        <th>Email</th>
                        <th>Ngày gửi</th>
                        <th>Tin nhắn</th>
                        <th>Trạng thái</th>
                        <th style="text-align: center; vertical-align: middle;">...</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contact as $key=>$value)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{($key+1)}}
                            </td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->phone}}</td>
                            <td style="vertical-align: middle;">{{$value->email}}</td>
                            <td style="vertical-align: middle;">{{Date2String($value->created_at,'H:i d/m/Y')}}</td>
                            <td>{{$value->message}}</td>
                            <td style="vertical-align: middle;">@if($value->status)
                                    <label class="label label-success">Đã liên hệ</label>
                                @else
                                    <label class="label label-danger">Chưa liên hệ</label>
                                @endif</td>

                            <td style="text-align: center; vertical-align: middle;">
                                <a href="{{url('admin/contact/')}}/{{$value->id}}/edit" class="btn btn-primary" title="Chi thiết"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{{url('admin/contact/delete')}}/{{$value->id}}" class="btn btn-danger delete" title="Xóa"><i class="fa fa-close"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                    $('#modal_Deletecontact').modal('show');
                }
            });
        });
    </script>
@endsection