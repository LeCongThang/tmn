@extends('backend.layout.master')

<?php
$isEdit = true;
$profile = true;
?>
@section('title')
    TMN - Thông tin cá nhân
@endsection
@section('content')
    <div class="user-profile">
        @include('backend.user._form')
    </div>
@endsection