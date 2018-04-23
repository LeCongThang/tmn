<section class="content-header">
    <h1>
        Trang chủ
        <small>{{$isEdit ? 'Thông tin Banner': 'Thêm mới Banner'}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Trang chủ</a></li>
        <li class="active">Banner</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
                {{ Form::open(['url' => $isEdit ? "admin/banner/$banner->id": route('banner.store'), 'method' => $isEdit? 'PUT':'POST', 'enctype'=>'multipart/form-data', 'spellcheck'=>'false']) }}
                <div class="box">
                    <div class="box-header">
                        <a href="{{route('banner.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Quay lại</a>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-8">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#vietnam" data-toggle="tab">Tiếng Viêt</a></li>
                                    <li><a href="#english" data-toggle="tab">English</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="active tab-pane" id="vietnam">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input type="text" class="form-control" name="title_vi" value="{{$isEdit ? $banner->title_vi : old("title_vi")}}">
                                    </div>
                                </div>
                                <div class="tab-pane" id="english">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title_en" value="{{$isEdit ? $banner->title_en : old("title_en")}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh (800px x 600px)</label>
                                <img id="imgSmall" src="{{$isEdit ? asset('images/banner/'.$banner->image) : asset('img/default.png')}}" class="img-responsive"  alt="Slide Image">
                                <div class="input-group image-preview" style="margin-top: 10px">
                                    <input placeholder="" id="text-image1" type="text" value="{{$isEdit? $banner->image:''}}" class="form-control image-preview-filename" disabled="disabled">
                                    <!-- don't give a name === doesn't send on POST/GET -->
                                    <span class="input-group-btn">
                                            <div class="btn btn-success image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
                                                <input type="file" @if(!$isEdit) required @endif accept="image/png, image/jpeg, image/gif" name="image" onchange="readURL(this);"/>
                                                <!-- rename it -->
                                            </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Loại banner</label>
                                @if($isEdit)
                                    @if($banner->type==1)
                                       <label class="label label-success">Giới thiệu</label>
                                    @endif
                                    @if($banner->type==2)
                                        <label class="label label-success">TIn tức</label>
                                    @endif
                                    @if($banner->type==3)
                                        <label class="label label-success">Dịch vụ</label>
                                    @endif
                                    @if($banner->type==6)
                                        <label class="label label-success">Liên hệ</label>
                                    @endif
                                    @if($banner->type==4)
                                        <label class="label label-success">Bộ sưu tập</label>
                                    @endif
                                    @if($banner->type==5)
                                        <label class="label label-success">Video</label>
                                    @endif
                                @else
                                    <input type="number" class="form-control" name="type">
                                @endif
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
