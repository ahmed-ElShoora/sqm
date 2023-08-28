@extends('layouts.front')
@section('content')
<section id="about-head">
    <div class="head-about">
        <h2>{{ __('messages.contact')}}</h2>
    </div>
</section>
<section id="contactus">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="">
                    <mg src="/assets/images/shape-contact.svg" />
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
    </div>
</section>

<section id="contactus-page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card-contact">
                    <img src="/assets/images/location.svg" />
                    <h4>{{ __('messages.address')}}</h4>
                    <p>{{ $contact->address }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-contact">
                    <img src="/assets/images/mail.svg" />
                    <h4>{{ __('messages.email')}}</h4>
                    <a href="mailto:{{ $contact->mail }}"><p>{{ $contact->mail }}</p></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-contact">
                    <img src="/assets/images/phone-call.svg" />
                    <h4>{{ __('messages.phone')}}</h4>
                    <a href="tel:+{{ $contact->phone }}" style="color:#000;text-direction:none;">
                        @if(App::getLocale() == 'en')
                            +
                        @endif    
                        {{ $contact->phone }}
                        @if(App::getLocale() == 'ar')
                            +
                        @endif    
                        </a>
                </div>
            </div>
        </div>
        <div class="form-contact">
            <div class="row">
                <div class="col-lg-1 col-md-0"></div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe style="border-radius: 15px" width="100%" height="400" id="gmap_canvas" >
                            </iframe>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="form-soci-page">
                        <h5>{{ __('messages.contact')}}</h5>
                        <form method="post" action="{{Route('WebController.storeMessage')}}">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="name" class="form-control input-contact" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('messages.name') }}" />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control input-contact" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('messages.email')}}" />
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control input-contact" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('messages.phone')}}" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control input-contact" name="message" placeholder="{{ __('messages.message') }}" rows="5"></textarea>
                        </div>
                        <div class="text-left">
                            <button type="submit" class="btn-contact">{{ __('messages.send') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-1 col-md-0"></div>
            </div>
        </div>
    </div>
</section>
<section id="houses">
    <div class="houses">
        <div class="container">
            <div class="cont-house">
                <h2>{{$div->title}}</h2>
                <h5>
                    {{$div->desc}}
                </h5>
                <div class="browse-building">
                    <a href="{{$div->link}}">{{$div->name}}</a>
                </div>
            </div>
        </div>
        <div class="buildong-img">
            @if($div->image != 'ahmed.jpg')
                <img width="280px" src="{{asset('images/links/'.$div->image)}}" />
            @endif
        </div>
    </div>
</section>
<script>
    let lang = window.location.pathname.split("/")[1]
    let ifrm = document.querySelector("iframe")
    if(lang == "ar"){
        ifrm.src = "https://maps.google.com/maps?q={{ $contact->latitude }},{{ $contact->longitude }}&hl=ar&z=14&output=embed"
    }else{
                ifrm.src = "https://maps.google.com/maps?q={{ $contact->latitude }},{{ $contact->longitude }}&hl=en&z=14&output=embed"
    }
</script>
@endsection
