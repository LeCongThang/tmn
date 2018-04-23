@extends('backend.layout.master')
@section('title')
    TMN - Thông tin chung
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Trang chủ
            <small>Thông tin chung</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>  Trang chủ</a></li>
            <li class="active">Thông tin chung</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Form::open(['url' => "admin/config/0", 'method' => 'PUT', 'enctype'=>'multipart/form-data', 'spellcheck'=>'false']) }}
                <div class="box">
                    <div class="box-header">
                        <a href="{{route('config.index')}}" class="btn btn-success"><i class="fa fa-refresh"></i>&nbsp;&nbsp;&nbsp;Refresh</a>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số lần truy cập trang web:</label>
                                <input type="number" class="form-control" name="count_view_web" value="{{$setting? $setting->count_view_web : old("count_view_web")}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{$setting? $setting->email : old("email")}}">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" value="{{$setting? $setting->phone : old("phone")}}">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ (tiếng việt)</label>
                                <input type="text" class="form-control" name="address_vi" value="{{$setting? $setting->address_vi : old("address_vi")}}">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ (tiếng anh)</label>
                                <input type="text" class="form-control" name="address_en" value="{{$setting? $setting->address_en : old("address_en")}}">
                            </div>
                            <div class="form-group">
                                <label>Site map</label>
                                <textarea class="form-control" name="site_map" rows="3">{{$setting? $setting->site_map : old("site_map")}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn facebook</label>
                                <input type="text" class="form-control" name="facebook" value="{{$setting? $setting->facebook : old("facebook")}}">
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn zalo</label>
                                <input type="text" class="form-control" name="zalo" value="{{$setting? $setting->zalo : old("zalo")}}">
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn skype</label>
                                <input type="text" class="form-control" name="skype" value="{{$setting? $setting->skype : old("skype")}}">
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn viber</label>
                                <input type="text" class="form-control" name="viber" value="{{$setting? $setting->viber : old("viber")}}">
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn google</label>
                                <input type="text" class="form-control" name="google" value="{{$setting? $setting->google : old("google")}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Meta title</label>
                                <textarea class="form-control" name="meta_title" rows="3">{{$setting? $setting->meta_title : old("meta_title")}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta keysword</label>
                                <textarea class="form-control" name="meta_keysword" rows="3">{{$setting? $setting->meta_keysword : old("meta_keysword")}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta description</label>
                                <textarea class="form-control" name="meta_des" rows="5">{{$setting? $setting->meta_des : old("meta_des")}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Google_analytics</label>
                                <textarea class="form-control" name="google_analytics" rows="5">{{$setting? $setting->google_analytics : old("google_analytics")}}</textarea>
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