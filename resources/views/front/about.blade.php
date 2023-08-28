@extends('layouts.front')
@section('content')

<section id="about-head">
    <div class="head-about">
        <h2>{{ __('messages.About') }}</h2>
    </div>
</section>
<section id="about">
    <div class="container">
        <img src="/assets/images/logored.png" />
        <h2>{{ __('messages.About') }}</h2>
        <p>
            {{$about->description}}
        </p>
    </div>

</section>
<section id="vision">
    <div class="container container-vision">
        <div class="row">
            <div class="col-md-7">
                <div class="content-first-vision">
                    <h3>{{ __('messages.vision') }}...</h3>
                    <p>
                        {{$about->vision}}
                    </p>
                </div>
                <div class="content-second-vision">
                    <h3>{{ __('messages.mission') }}...</h3>
                    <p>{{$about->mission}}</p>
                </div>
            </div>
            <div class="col-md-5 col-vision">
                <div class="img-vision">
                    <img src="{{asset($about->image)}}" />
                </div>
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
            <img width="280px" src="{{asset('images/links/'.$div->image)}}" />
        </div>
    </div>
</section>
@endsection


