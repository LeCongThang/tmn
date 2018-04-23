<section class="content-header">
    <h1>
        Trang chủ
        <small>{{$isEdit ? 'Thông tin Video': 'Thêm mới Video'}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Trang chủ</a></li>
        <li class="active">Video</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
                {{ Form::open(['url' => $isEdit ? "admin/video/$video->id": route('video.store'), 'method' => $isEdit? 'PUT':'POST', 'enctype'=>'multipart/form-data', 'spellcheck'=>'false']) }}
                <div class="box">
                    <div class="box-header">
                        <a href="{{route('video.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Quay lại</a>
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
                                        <input type="text" class="form-control" name="title_vi" value="{{$isEdit ? $video->title_vi : old("title_vi")}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Giới thiệu</label>
                                        <textarea class="form-control editors" name="description_vi" id="description_vi">{{$isEdit ? $video->description_vi : old("description_vi")}}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane" id="english">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title_en" value="{{$isEdit ? $video->title_en : old("title_en")}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control editors" name="description_en" id="description_en">{{$isEdit ? $video->description_en : old("description_en")}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Đường dẫn</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="password" maxlength="255"
                                           minlength="6" aria-required="true" aria-invalid="true"
                                           value="" id="inputLink">
                                    <div class="input-group-btn">
                                        <button style="margin-right: 0px" type="button" onclick="getId()" class="btn btn-warning btn-flat">Lấy Hình
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Link embed</label>
                                <input src="" id="embed_link" name="embed_link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <img src="" id="imagevideo" class="img-responsive">
                                <input id="image" name="image" class="form-control">
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
        function getId() {
            var url=$("#inputLink").val();

            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);
            console.log(match);
            if (match && match[2].length == 11) {

                $('#embed_link').val('//www.youtube.com/embed/'+match[2]);
                $("#imagevideo").attr('src','http://img.youtube.com/vi/'+match[2]+'/0.jpg');
                $('#image').val('http://img.youtube.com/vi/'+match[2]+'/0.jpg');
            } else {
                return 'error';
            }
        }
        $('.editors').each( function () {
            CKEDITOR.replace(this.id, {
                filebrowserUploadUrl: '/uploader/news',
                filebrowserBrowseUrl:'{{URL::asset('')}}folder/news'
            });
        });
    </script>
@endsection
