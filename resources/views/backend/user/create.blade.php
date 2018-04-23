@extends('backend.layout.master')

<?php
$isEdit = false;
?>
@section('title')
    TMN - Quản trị
@endsection
@section('content')
    <div class="user-create">
        @include('backend.user._form')
    </div>
@endsection