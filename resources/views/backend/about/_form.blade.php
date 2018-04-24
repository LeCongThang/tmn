<section class="content-header">
    <h1>
        Trang chủ
        <small>Thông tin giới thiệu</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Trang chủ</a></li>
        <li class="active">Giới thiệu</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
                {{ Form::open(['url' => $isEdit ? "admin/about/$about->id": route('about.store'), 'method' => $isEdit? 'PUT':'POST', 'enctype'=>'multipart/form-data', 'spellcheck'=>'false']) }}

                <div class="box">
                    <div class="box-header">
                        <a href="{{route('about.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Quay lại</a>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
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
                                        <label>Mô tả ngắn</label>
                                        <textarea class="form-control" rows="4" name="short_des_vi" id="short_des_vi">{{$isEdit ? $about->short_des_vi : old("short_des_vi")}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Thông tin trên</label>
                                        <textarea class="form-control editors" name="info_head_vi" id="info_head_vi">{{$isEdit ? $about->info_head_vi : old("info_head_vi")}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Thông tin dưới</label>
                                        <textarea class="form-control editors" name="info_footer_vi" id="info_footer_vi">{{$isEdit ? $about->info_footer_vi : old("info_footer_vi")}}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane" id="english">
                                    <div class="form-group">
                                        <label>Short description</label>
                                        <textarea class="form-control" rows="4" name="short_des_en" id="short_des_en">{{$isEdit ? $about->short_des_en : old("short_des_en")}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Information header</label>
                                        <textarea class="form-control editors" name="info_head_en" id="info_head_en">{{$isEdit ? $about->info_head_en : old("info_head_en")}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Information footer</label>
                                        <textarea class="form-control editors" name="info_footer_en" id="info_footer_en">{{$isEdit ? $about->info_footer_en : old("info_footer_en")}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh (600px x 400px)</label>
                                <img id="imgBig" src="{{$isEdit ? asset('images/about/'.$about->image_big) : asset('img/default.png')}}" class="img-responsive"  alt="Slide Image">
                                <div class="input-group image-preview" style="margin-top: 10px">
                                    <input placeholder="" id="text-image2" type="text" value="{{$isEdit? $about->image_big:''}}" class="form-control image-preview-filename" disabled="disabled">
                                    <!-- don't give a name === doesn't send on POST/GET -->
                                    <span class="input-group-btn">
                                            <div class="btn btn-success image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="image_big" onchange="readURL1(this);"/>
                                                <!-- rename it -->
                                            </div>
                                    </span>
                                </div>
                            </div>
                        </div>
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
                    $('#text-image1').val(input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgBig').attr('src', e.target.result);
                    $('#text-image2').val(input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('.editors').each( function () {
            CKEDITOR.replace(this.id, {
                filebrowserUploadUrl: '/uploader/about',
                filebrowserBrowseUrl:'{{URL::asset('')}}folder/about'
            });
        });
    </script>
@endsection

