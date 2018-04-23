<section class="content-header">
    <h1>
        Trang chủ
        <small>{{$isEdit ? 'Thông tin Bộ sưu tập': 'Thêm mới Bộ sưu tập'}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Trang chủ</a></li>
        <li class="active">Bộ sưu tập</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">

                {{ Form::open(['url' => $isEdit ? "admin/gallery/$gallery->id": route('gallery.store'), 'method' => $isEdit? 'PUT':'POST', 'enctype'=>'multipart/form-data', 'spellcheck'=>'false']) }}
                <div class="box">
                    <div class="box-header">
                        <a href="{{route('gallery.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Quay lại</a>
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
                                        <label>Tiêu đề</label>
                                        <input type="text" class="form-control" name="title_vi" value="{{$isEdit ? $gallery->title_vi : old("title_vi")}}">
                                    </div>

                                </div>
                                <div class="tab-pane" id="english">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title_en" value="{{$isEdit ? $gallery->title_en : old("title_en")}}">
                                    </div>

                                </div>
                            </div>
                            @if($isEdit)
                                @if(count($image)!=0)
                                    <div class="form-group">
                                        <h5>Hình ảnh</h5>
                                        <input name="arrImage" hidden id="arrImage">
                                        @foreach($image as $img)
                                            <div class="col-md-3" id="Img-{{$img->id}}" style="position: relative;margin-bottom: 5px;">
                                                   <a onclick="ftDeleteImage('{{$img->id}}')" style="position: absolute;background: #c73b3b; padding: 5px 7px;">
                                                           <i class="fa fa-close" style="color:#fff;"></i>
                                                       </a>
                                               <img src="{{asset('images/gallery')}}/{{$img->image}}" style="width: 100%;border: 1px #ddd solid;padding: 1px;">
                                           </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endif
                            <div class="form-group">
                               <label for="introduce" style="width:100%;">
                                          Thêm hình ảnh (tối đa 5 hình) (300 x 400px)
                                       </label>
                               <input class="image file" type="file" name="image[]" multiple data-preview-file-type="text">
                           </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                @if($isEdit)
                                        <option value="1" @if($gallery->status) selected @endif>Hiển thị</option>
                                        <option value="0" @if(!$gallery->status) selected @endif>Ẩn</option>
                                @else
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                @endif
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
@section('scripts')
    <script>

        $(document).ready(function() {
            $('.image').fileinput();
        });
//        function readURL(input) {
//            if (input.files && input.files[0]) {
//                var reader = new FileReader();
//                reader.onload = function (e) {
//                    $('#imgF').attr('src', e.target.result);
//                };
//                reader.readAsDataURL(input.files[0]);
//            }
//        }
        function ftDeleteImage(id) {
            // $('#Img-'+img).css("display","none");
            document.getElementById('Img-'+id).style.display = "none";
            var t = $('#arrImage').val();
            $('#arrImage').val(t+id+',');

        }
    </script>
@endsection
