@extends('layouts.front')

@section('style')
<style>
    .popup-f{
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 98vw;
        height: 98vh;
        background: #504e4e8c;
        z-index: 999999;
        position: fixed;
        top: 6px;
        left: 6px;
        overflow: hidden;
    }
    .popup-f .boxs{
        width: 57%;
        display: flex;
        position: relative;
    }
    .popup-f .boxs form{
        width: 100%;
        padding: 41px 20px;
        margin-top: 30px;
    }
    .popup-f .boxs form label,
    .popup-f .boxs form button{
        font-size: 18px;
    }
    .boxs .close-x{
        position: absolute;
        top: 20px;
        left: 20px;
        padding: 8px;
        font-size: 18px;
        cursor: pointer;
    }
    @media only screen and (max-width: 768px){
        .boxs{
            width: 80% !important;
        }
    }
</style>
@endsection

@section('content')


<section id="about-head">
    <div class="head-about">
        <h2>{{ __('messages.projectDetails') }}</h2>
    </div>
</section>
<section id="detailsPro">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-0"></div>
            <div class="col-lg-5 col-md-12 col-sm-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($images as $image)
                        <li data-target="#carouselExampleControls" data-slide-to="{{ $image->id }}" @if ($loop->first) class="active" @else class="" @endif></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($images as $image)
                        @if ($loop->first)
                        <div class="carousel-item active">
                            @else
                            <div class="carousel-item">
                                @endif
                                <img class="d-block w-100 projectImages" src="{{ asset($image->image) }}" alt="First slide">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev prvdetail prvLink" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span><i class="fas fa-angle-left"></i></span>
                        </a>
                        <a class="carousel-control-next nextLink" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span><i class="fas fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="content-details">
                        <h3>{{ $offer->title }}</h3>
                        <h5> {{ $offer->price }} {{ __('messages.currency') }}</h5>
                        <p class="location"><img src="/assets/images/location1.png" /> {{ $offer->city }}</p>
                        <h4>{{ __('messages.sellerDetails') }}</h4>
                        <h6 class="logo-det"><img src="{{ asset($offer->seller_image) }}" />{{ $offer->seller_name }}</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="mailto:{{ $offer->seller_email }}"><p class="con-pg"><img src="/assets/images/mail1.png" />{{ $offer->seller_email }}</p></a>
                            </div>
                            <div class="col-md-6">
                                <a href="tel:+966{{ $offer->seller_phone }}"><p class="phone-pg"><img src="/assets/images/phone.png" />{{ $offer->seller_phone }}</p></a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ $offer->seller_domain }}"><p class="website-pg"><img src="/assets/images/website.png" />{{ $offer->seller_domain }}</p></a>
                            </div>
                             <div class="col-md-6" style="display: flex;flex-direction: row;align-items: center;justify-content: flex-start;padding-left: 30px;top: -10px;">
                                <button class="btn btn-secondary btn-call" style="font-size: 16px;width: 120%;background: rgb(87, 87, 86);color: #fff;line-height: normal;">{{__('messages.contactbutton')}}</button>
                            </div>
                        </div>
                        <a class="btn whatsuppg" href="https://api.whatsapp.com/send?phone=+966{{ $offer->seller_phone }}&text=Title:{{ $offer->title }}.Link:https://sqm.sa/en/projects-{{$offer->id}}-show"><i class="fab fa-whatsapp"></i> {{ __('messages.whatsContact') }}</a>
                        <button class="printer" onclick="window.print()"><img src="/assets/images/printer.png" />{{ __('messages.print') }}</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="card-pro">
                    <div>
                        <span>{{ __('messages.projectDetails') }}</span>
                    </div>

                    <br>
                    <pre style="overflow: hidden;font-size:15px;white-space: pre-line;">{{ $offer->description }}</pre>
                </div>
                <div class="card-pro">
                    <div>
                        <span>{{ __('messages.projectDesc') }}</span>
                    </div>

                    <br>
                    <div class="row">
                        @foreach(explode(',',$offer->facilities) as $facility)
                        <div class="col-md-2 col-no" style="max-width: 100%;flex:0;">
                            <p class="offer" style="white-space: nowrap;"><i class="fas fa-check"></i>{{ $facility }}</p>
                            <br>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-pro">
                    <div>
                        <span>{{ __('messages.projectServices') }}</span>
                    </div>

                    <br>
                    <div class="row">
                        @foreach(explode(',',$offer->services) as $service)
                        <div class="col-md-2 col-no" style="max-width: 100%;flex:0;">
                            <p class="offer" style="white-space: nowrap;"><i class="fas fa-check"></i>{{ $service }}</p>
                            <br>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col-lg-5 col-md-12">
                <div class="place-map">
                    <h4>{{ __('messages.projectMap') }}</h4>
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe style="border-radius: 15px" width="100%" height="400" id="gmap_canvas"></iframe>
                        </div>
                        <div>
                            <center>
                                <a href="https://maps.google.com/maps?q={{ $offer->latitude }},{{ $offer->longitude }}" class="btn btn-success">{{ __('messages.directbutton') }}</a>
                            </center>
                        </div>
                    </div>
                    <h4 style="margin-top: 20px">{{ __('messages.share') }}</h4>
                    <div class="links-socials">
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=http://sqm.sa/en/projects-{{$offer->id}}-show"><img src="/assets/images/linked.png" /></a>
                        <a href="http://twitter.com/share?url=http://sqm.sa/en/projects-{{$offer->id}}-show"><img src="/assets/images/twitter.png" /></a>
                        <a href="http://www.facebook.com/sharer.php?s=100&p[url]=http://sqm.sa/en/projects-{{$offer->id}}-show"><img src="/assets/images/facebook.png" /></a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<div class="popup-f">
    <div class="boxs bg-light">
        <span class="close-x">X</span>
        <form method="post" action="{{URL('/projects-show')}}">
            @csrf
            <input hidden name="id" value="{{$offer->id}}">
            <input hidden name="project_name" value="{{$offer->title}}">
          <div class="form-group input-group-lg">
            <label for="exampleInputName">{{ __('messages.enteryourname') }}</label>
            <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="{{ __('messages.enteryourname') }}" required>
          </div>
          <div class="form-group input-group-lg">
            <label for="exampleInputNum">{{ __('messages.enteryourphone') }}</label>
            <input type="text" class="form-control" name="phone" id="exampleInputNum" placeholder="{{ __('messages.enteryourphone') }}" required>
          </div>
          <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
        </form>
    </div>
</div>

<script>
    let lang = window.location.pathname.split("/")[1]
    let ifrm = document.querySelector("iframe")
    if(lang == "ar"){
        ifrm.src = "https://maps.google.com/maps?q={{ $offer->latitude }},{{ $offer->longitude }}&hl=ar&z=14&output=embed"
    }else{
                ifrm.src = "https://maps.google.com/maps?q={{ $offer->latitude }},{{ $offer->longitude }}&hl=en&z=14&output=embed"
    }
</script>
@endsection
@section('link-best',\App\Models\Link::getLinks()->projects_link)
@section('script')
<script>
    let pop = document.querySelector(".popup-f")
    let close = document.querySelector(".close-x")
    let btn = document.querySelector(".btn-call")
    btn.onclick = _ => {
        pop.style.display = "flex"
    }
    close.onclick = _=> {
         pop.style.display = "none"
    }
</script>
@endsection
