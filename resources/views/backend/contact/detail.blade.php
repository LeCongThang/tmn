@extends('backend.layout.master')
@section('title')
    TMN - Liên hệ
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Trang chủ
            <small>Thông tin liên hệ</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>  Trang chủ</a></li>
            <li class="active">Liên hệ</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Form::open(['url' => "admin/contact/$contact->id", 'method' => 'PUT', 'enctype'=>'multipart/form-data', 'spellcheck'=>'false']) }}
                <div class="box">
                    <div class="box-header">
                        <a href="{{route('contact.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Quay lại</a>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" class="form-control" value="{{$contact->name}}">
                            </div>
                            <div class="form-group">
                                <label>Nội dung tin nhắn</label>
                                <textarea class="form-control" rows="5">{{$contact->message}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" value="{{$contact->phone}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{$contact->email}}">
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="0"@if(!$contact->status) selected @endif>Chưa liên hệ</option>
                                    <option value="1" @if($contact->status) selected @endif>Đã liên hệ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">

                    </div>
                </div>
                {{ Form::close() }}
            </div>

        </div>
    </section>
    @endsection
@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgSmall').attr('src', e.target.result);
                    $('#text-image').val(input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


@endsection