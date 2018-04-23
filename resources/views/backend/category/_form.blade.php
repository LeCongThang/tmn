<section class="content-header">
    <h1>
        Trang chủ
        <small>{{$isEdit ? 'Thông tin loại tin tức': 'Thêm mới loại tin tức'}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Trang chủ</a></li>
        <li class="active">Tin tức</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
                {{ Form::open(['url' => $isEdit ? "admin/category/$category->id": route('category.store'), 'method' => $isEdit? 'PUT':'POST', 'enctype'=>'multipart/form-data', 'spellcheck'=>'false']) }}
                <div class="box">
                    <div class="box-header">
                        <a href="{{route('category.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Quay lại</a>
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
                                        <input type="text" class="form-control" name="title_vi" value="{{$isEdit ? $category->title_vi : old("title_vi")}}">
                                    </div>
                                </div>
                                <div class="tab-pane" id="english">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title_en" value="{{$isEdit ? $category->title_en : old("title_en")}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
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

