<section class="content-header">
    <h1>
        Trang chủ
        <small>{{$isEdit ? 'Thông tin tin tức': 'Thêm mới tin tức'}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Trang chủ</a></li>
        <li class="active">Tin tức</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
                {{ Form::open(['url' => $isEdit ? "admin/news/$news->id": route('news.store'), 'method' => $isEdit? 'PUT':'POST', 'enctype'=>'multipart/form-data', 'spellcheck'=>'false']) }}
                <div class="box">
                    <div class="box-header">
                        <a href="{{route('news.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Quay lại</a>
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
                                        <input type="text" class="form-control" name="title_vi" value="{{$isEdit ? $news->title_vi : old("title_vi")}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả ngắn</label>
                                        <textarea class="form-control" rows="3" name="short_des_vi" id="short_des_vi">{{$isEdit ? $news->short_des_vi : old("short_des_vi")}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Giới thiệu</label>
                                        <textarea class="form-control editors" name="description_vi" id="description_vi">{{$isEdit ? $news->description_vi : old("description_vi")}}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane" id="english">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title_en" value="{{$isEdit ? $news->title_en : old("title_en")}}">
                                    </div>
                                    <div class="form-group">
                                        <label> Short description</label>
                                        <textarea class="form-control" rows="3" name="short_des_en" id="short_des_en">{{$isEdit ? $news->short_des_en : old("short_des_en")}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control editors" name="description_en" id="description_en">{{$isEdit ? $news->description_en : old("description_en")}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Số lượt xem</label>
                                <input type="number" class="form-control" name="count_view" value="{{$isEdit ? $news->count_view : 0}}">
                            </div>
                            <div class="form-group">
                                <label>Loại tin tức</label>
                                <select name="category_id" class="form-control">
                                    @if(count($category)!=0)
                                        @foreach($category as $item)
                                            @if($isEdit)
                                                <option value="{{$item->id}}" @if($news->category_id==$item->id) selected @endif>{{$item->title_vi}} ({{$item->title_en}})</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->title_vi}} ({{$item->title_en}})</option>
                                            @endif

                                        @endforeach

                                    @endif
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <textarea class="form-control" rows="3" name="tags" id="tags">{{$isEdit ? $news->tags : old("tags")}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh (400 x 300px)</label>
                                <img id="imgSmall" src="{{$isEdit ? asset('images/news/'.$news->image) : asset('img/default.png')}}" class="img-responsive"  alt="Slide Image">
                                <div class="input-group image-preview" style="margin-top: 10px">
                                    <input placeholder="" id="text-image1" type="text" value="{{$isEdit? $news->image:''}}" class="form-control image-preview-filename" disabled="disabled">
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
        $('.editors').each( function () {
            CKEDITOR.replace(this.id, {
                filebrowserUploadUrl: '/uploader/news',
                filebrowserBrowseUrl:'{{URL::asset('')}}folder/news'
            });
        });
    </script>
@endsection
