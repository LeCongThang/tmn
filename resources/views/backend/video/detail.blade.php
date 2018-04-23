@extends('backend.layout.master')
<?php

$isEdit = true;
?>
@section('title')
    TMN - Video
@endsection
@section('content')
    @include('backend.video._form')
    <!-- Main content -->

@endsection
