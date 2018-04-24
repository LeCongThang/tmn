@extends('backend.layout.master')
@section('title')
    TMN - Giới thiệu
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Trang chủ
            <small>Giới thiệu</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Giới thiệu</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        @if(count($about)==0)
                            <a href="{{route('about.create')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;Thông tin</a>
                        @endif
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
                                @if(count($about)!=0)
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Hình ảnh</th>
                                        <th>Nội dung</th>
                                        <th width="100px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($about as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><img src="{{asset('images/about')}}/{{$item->image_big}}" style="width: 150px"></td>
                                            <td>{!!  $item->short_des_vi!!}</td>
                                            <td>
                                                <a href="{{url('admin/about/')}}/{{$item->id}}" class="btn btn-primary" title="Chi tiết"><i class="fa fa-pencil-square-o"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                            <div class="tab-pane" id="english">
                                @if(count($about)!=0)
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th width="100px"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($about as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img src="{{asset('images/about')}}/{{$item->image_big}}" style="width: 150px"></td>
                                                <td>{!! $item->short_des_en !!}</td>
                                                <td>
                                                    <a href="{{url('admin/about/')}}/{{$item->id}}" class="btn btn-primary" title="Detail"><i class="fa fa-pencil-square-o"></i></a>
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
                    $('.body-home').prepend(data);
                    $('#modal-DeleteSlide').modal('show');
                }
            });
        });
    </script>
@endsection