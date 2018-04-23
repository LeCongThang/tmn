@extends('backend.layout.master')

<?php
$title = 'Liên hệ';
?>

@section('css')
@endsection

@section('js')
    <script>
        function callback_after_delete(res) {
            if(res.status)
                window.location.href = '{{asset('admin/contact')}}';
        }
    </script>
@endsection

@section('content')
    <div class="box contact-list">
        <div class="box-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('contact.index')}}" class="btn btn-primary pull-left"><i class="fa fa-backward"></i> Trở về danh sách</a>
                    <a onclick="deleteObj(null,'{{asset("admin/contact/$contact->id")}}','{{$contact->first_name}}')" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Xóa liên hệ này</a>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div>
                <table id="" class="table table-striped table-bordered detail-view">
                    <tbody>
                    <tr>
                        <th style="width: 20%">Họ tên:</th>
                        <td>{{$contact->first_name . ' ' . $contact->last_name}}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></td>
                    </tr>
                    <tr>
                        <th>Nội dung:</th>
                        <td>{{$contact->message}}</td>
                    </tr>
                    <tr>
                        <th>Ngày tạo:</th>
                        <td>{{Date2String($contact->created_at,'H:i d/m/Y')}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection