@extends('frontend.layout.master')

<?php
$title = $menu["name_$lang"];
$source = $menu->slug;
?>

@section('css')
    <style>
        .error{
            color: red;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#contactForm").validate({
                rules: {
                    first_name: "required",
                    last_name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    subject: {
                        required: true,
                        minlength: 5,
                        maxlength:250
                    },
                    message: {
                        required: true,
                        minlength: 8,
                        maxlength: 1000
                    }
                },
                messages: {
                    first_name: "{{trans('frontend.r_first_name')}}",
                    last_name: "{{trans('frontend.r_last_name')}}",
                    email: {
                        required: "{{trans('frontend.r_email')}}",
                        email: "{{trans('frontend.e_email')}}"
                    },
                    subject: {
                        required: "{{trans('frontend.r_subject')}}",
                        minlength: "{{trans('frontend.min_subject')}}",
                        maxlength: "{{trans('frontend.max_subject')}}"
                    },
                    message: {
                        required: "{{trans('frontend.r_message')}}",
                        minlength: "{{trans('frontend.min_message')}}",
                        maxlength: "{{trans('frontend.max_message')}}"
                    }
                }
            });
        });
    </script>
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h3 class="our-office">{{trans('frontend.our_office')}}</h3>
                <div>
                    <p>{{trans('frontend.office_hour')}}: {{$s_setting["office_hour_$lang"]}}</p>
                    <p>{{trans('frontend.office_number')}}: {{$s_setting['phone']}}</p>
                    <p>EMAIL: {{$s_setting['email']}}</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.574815066575!2d106.68554931537786!3d10.767215262306562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f181c80d37b%3A0x5835c373976580db!2sHBB+Solutions!5e0!3m2!1svi!2s!4v1516355571395" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="margin-top"></div>
        <div class="row">
            {{--<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">--}}
                {{--<h3 class="our-office">{{trans('frontend.contact_us')}}!</h3>--}}
                {{--<div>--}}
                    {{--<p>WE ARE EXCITED TO HEAR FROM YOU! </p>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form id="contactForm" action="{{assetLang('contact')}}" method="POST" role="form" class="form-contact">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <label for="">{{trans('frontend.name')}} *</label>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" required id="first_name" >

                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required id="last_name">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" name="email" id="email" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="subject">{{trans('frontend.subject')}} *</label>
                                <input type="text" class="form-control" name="subject" id="subject" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="message">{{trans('frontend.message')}} *</label>
                                <textarea rows="5" class="form-control" name="message" id="message" ></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-submit">{{trans('frontend.send')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection