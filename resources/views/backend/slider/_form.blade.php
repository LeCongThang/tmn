<section class="content-header">
    <h1>
        Trang chủ
        <small>{{$isEdit ? 'Thông tin Slider': 'Thêm mới Slider'}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Trang chủ</a></li>
        <li class="active">Slider</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
                {{ Form::open(['url' => $isEdit ? "admin/slider/$slider->id": route('slider.store'), 'method' => $isEdit? 'PUT':'POST', 'enctype'=>'multipart/form-data', 'spellcheck'=>'false']) }}
                <div class="box">
                    <div class="box-header">
                        <a href="{{route('slider.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Quay lại</a>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Đường dẫn</label>
                                <input type="text" class="form-control" name="link" value="{{$isEdit ? $slider->link : old("link")}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh (360px x 260px)</label>
                                <img id="imgSmall" src="{{$isEdit ? asset('images/slider/'.$slider->image) : asset('img/default.png')}}" class="img-responsive"  alt="Slide Image">
                                <div class="input-group image-preview" style="margin-top: 10px">
                                    <input placeholder="" id="text-image" type="text" value="{{$isEdit? $slider->image:''}}" class="form-control image-preview-filename" disabled="disabled">
                                    <!-- don't give a name === doesn't send on POST/GET -->
                                    <span class="input-group-btn">
                                            <div class="btn btn-success image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="image" onchange="readURL(this);"/>
                                                <!-- rename it -->
                                            </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Thứ tự hiển thị</label>
                                <input type="number" class="form-control" name="sort_order" value="{{$isEdit ? $slider->sort_order : old("sort_order")}}">
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control" name="status">
                                    @if($isEdit)
                                        <option value="1" {{$slider->status ? "selected":""}}>Hiển thị</option>
                                        <option value="0" {{$slider->status ? "":"selected"}}>Ẩn</option>
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
