@extends('backend.layout.master')
<?php

$isEdit = true;
?>
@section('title')
    TMN - Tin tức
@endsection
@section('content')
    @include('backend.news._form')
    <!-- Main content -->

@endsection
