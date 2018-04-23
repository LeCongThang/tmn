@extends('frontend.layout.master')

@section('css')
    
@endsection


@section('content')

    @include('frontend.partial.header_other')
    <section>
        
        <article class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">

                                <details open class="wow animated fadeInUp">
                                    <summary>TMN - Custom Design</summary>
                                    <ul>
                                        <li><i class="fa fa-map-marker"></i> <b>{{trans('frontend.diachict')}}:</b> {{$system['address']}}</li>
                                        <li><i class="fa fa-phone"></i> <b>Tel:</b> {{$system['phone']}}</li>
                                        <li class="bot-addes"><i class="fa fa-envelope"></i> <b>Email:</b> {{$system['email']}}</li>
                                    </ul>
                                </details>

                    </div>
                    <div class="col-md-8 wow animated fadeInRight">
                        <div class="bg-col-form-mess">
                            <h2>{{trans('frontend.gui')}} <span style="color: #a41d21">{{trans('frontend.tinnhan')}}</span></h2>

                            <div class="row">
                                <form action="{{url('submit-contact')}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="col-sm-6 ed-input-cta">
                                        <div class="form-group">
                                            <label for="name">{{trans('frontend.ten')}}*</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">{{trans('frontend.sdt')}}:</label>
                                            <input type="text" class="form-control" name="phone" id="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 ed-input-cta">
                                        <div class="form-group">
                                          <label for="comment">{{trans('frontend.tinnhan')}}:</label>
                                          <textarea class="form-control" name="message" rows="10" id="comment" style="resize: none"></textarea>
                                      </div>
                                  </div>
                                      <div class="col-xs-12 ed-butt-sendmail">
                                          <div class="form-group">
                                              <button type="submit">{{trans('frontend.guitinnhan')}}</button>
                                          </div>
                                      </div>
                                </form>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </article>
        


    </section>


@endsection

@section('js')
   
@endsection