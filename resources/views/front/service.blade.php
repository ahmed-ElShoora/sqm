@extends('layouts.front')
@section('content')
<section id="about-head">
    <div class="head-about">
        <h2>{{ __('messages.services') }}</h2>
    </div>
</section>

<section id="services">
    <div class="services container">
        <h1>{{ __('messages.services') }}</h1>
        <img class="under-img" src="/assets/images/underser.png" />
        <p class="prag-ser">
            {{$desc->descreption}}
        </p>
        <div class="content-services">
            @foreach ($popups as $popup)
                <div style="width: 19%" class="one-ser">
                    <img src="{{ asset($popup->icon) }}" />
                    <h5>{{ $popup->title }}</h5>
                    <a style="cursor: pointer" data-toggle='model{{ $popup->id }}' class="more-ser">{{__('messages.showmore')}}<i class="fas fa-long-arrow-alt-left"></i></a>
                </div>
            @endforeach
        </div>
    </div>

</section>

@foreach ($services as $service)
    @if($service->type == 1)
        <section id="service-page">
            <div class="container container-vision">

                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-12 col-service">
                        <div class="img-service">
                            <img src="{{ asset($service->image) }}" />
                            <div class="content-ser-img">
                                <div class="redbox">
                                    <b>{{ $service->title }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="content-left-ser">
                            <p class="prag-services">
                                {{$service->description}}
                            </p>
                            <ul class="ul-services">
                                @if (request()->segment(1) == 'en')
                                    @foreach(explode(',', $service->notes) as $note)
                                        @if ($loop->index == 0)
                                            <li>
                                                <div class="media media-services">
                                                    <i class="fas fa-circle ml-3 i-gray"></i>
                                                    <div class="media-body">
                                                        <p class="p-gray">
                                                            {{ $note }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($loop->index == 1)
                                            <li>
                                                <div class="media media-services">
                                                    <i class="fas fa-circle ml-3 i-red"></i>
                                                    <div class="media-body">
                                                        <p class="p-red">
                                                            {{ $note }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($loop->index == 2)
                                            <li>
                                                <div class="media media-services">
                                                    <i class="fas fa-circle ml-3 i-gray"></i>
                                                    <div class="media-body">
                                                        <p class="p-gray">
                                                            {{ $note }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($loop->index == 3)
                                            <li>
                                                <div class="media media-services">
                                                    <i class="fas fa-circle ml-3 i-red"></i>
                                                    <div class="media-body">
                                                        <p class="p-red">
                                                            {{ $note }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach

                                @else
                                    @foreach(explode(',', $service->notes) as $note)
                                        @if ($loop->index == 0)
                                            <li>
                                                <div class="media media-services">
                                                    <i class="fas fa-circle ml-3 i-gray"></i>
                                                    <div class="media-body">
                                                        <p class="p-gray">
                                                            {{ $note }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($loop->index == 1)
                                            <li>
                                                <div class="media media-services">
                                                    <i class="fas fa-circle ml-3 i-red"></i>
                                                    <div class="media-body">
                                                        <p class="p-red">
                                                            {{ $note }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($loop->index == 2)
                                            <li>
                                                <div class="media media-services">
                                                    <i class="fas fa-circle ml-3 i-gray"></i>
                                                    <div class="media-body">
                                                        <p class="p-gray">
                                                            {{ $note }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($loop->index == 3)
                                            <li>
                                                <div class="media media-services">
                                                    <i class="fas fa-circle ml-3 i-red"></i>
                                                    <div class="media-body">
                                                        <p class="p-red">
                                                            {{ $note }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif

                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    @endif

    @if($service->type == 2)
        <section id="sells">
            <div class="container">
                <div class="content-sells">
                    <h3>{{ $service->title }}</h3>
                    <p>{{$service->description}}</p>
                </div>
                <div class="row">

                    @if (request()->segment(1) == 'en')
                        @foreach(explode(',',$service->notes) as $note)
                            @if ($loop->index == 0)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-sells d-flex align-items-center">
                                        <p>{{ $note }}</p>
                                        <div class="line-bottom"></div>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->index == 1)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-sells d-flex align-items-center">
                                        <p>{{ $note }}</p>
                                        <div class="line-bottom1"></div>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->index == 2)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-sells d-flex align-items-center">
                                        <p>{{ $note }}</p>
                                        <div class="line-bottom2"></div>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->index == 3)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-sells d-flex align-items-center">
                                        <p>{{ $note }}</p>
                                        <div class="line-bottom3"></div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        @foreach(explode(',',$service->notes) as $note)
                            @if ($loop->index == 0)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-sells d-flex align-items-center">
                                        <p>{{ $note }}</p>
                                        <div class="line-bottom"></div>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->index == 1)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-sells d-flex align-items-center">
                                        <p>{{ $note }}</p>
                                        <div class="line-bottom1"></div>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->index == 2)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-sells d-flex align-items-center">
                                        <p>{{ $note }}</p>
                                        <div class="line-bottom2"></div>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->index == 3)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-sells d-flex align-items-center">
                                        <p>{{ $note }}</p>
                                        <div class="line-bottom3"></div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif


                </div>

            </div>
        </section>
    @endif

    @if($service->type == 3)
        <section id="chances">
            <div class="container">
                <div class="head-chance">
                    <h3 class="">{{$service->title}}</h3>
                    <p> {{$service->description}}
                    </p>
                </div>
                <div class="row">
                    @if (request()->segment(1) == 'en')
                        @foreach(explode(',',$service->notes) as $note)
                            @if ($loop->index == 0)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-chances align-items-center">
                                        <img src="{{asset('https://sqm.sa/assets/images/1.svg')}}" />
                                        <br>
                                        <p>{{ $note }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->index == 1)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-chances align-items-center">
                                        <img src="{{asset('https://sqm.sa/assets/images/2.svg')}}" />
                                        <br>
                                        <p>{{ $note }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->index == 2)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-chances align-items-center">
                                        <img src="{{asset('https://sqm.sa/assets/images/3.svg')}}" />
                                        <br>
                                        <p>{{ $note }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->index == 3)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-chances align-items-center">
                                        <img src="{{asset('https://sqm.sa/assets/images/4.svg')}}" />
                                        <br>
                                        <p>{{ $note }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    @else
                        @foreach(explode(',',$service->notes) as $note)
                            @if ($loop->index == 0)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-chances align-items-center">
                                        <img src="{{asset('https://sqm.sa/assets/images/1.svg')}}" />
                                        <br>
                                        <p>{{ $note }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->index == 1)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-chances align-items-center">
                                        <img src="{{asset('https://sqm.sa/assets/images/2.svg')}}" />
                                        <br>
                                        <p>{{ $note }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->index == 2)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-chances align-items-center">
                                        <img src="{{asset('https://sqm.sa/assets/images/3.svg')}}" />
                                        <br>
                                        <p>{{ $note }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->index == 3)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card-chances align-items-center">
                                        <img src="{{asset('https://sqm.sa/assets/images/4.svg')}}" />
                                        <br>
                                        <p>{{ $note }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>

            </div>
        </section>
    @endif

    @if($service->type == 4)
        <section id="ideas">
            <div class="container container-vision">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        @if (request()->segment(1) == 'en')
                            @foreach(explode(',',$service->notes) as $question)
                                <div class="ideas-right">
                                    <div class="content-idea">
                                        <h4>{{ $question }}</h4>
                                        @foreach(explode(',',$service->description) as $answer)
                                            @if($loop->index == $loop->parent->index)
                                                <p>{{ $answer }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        @else
                            @foreach(explode(',',$service->notes) as $question)
                                <div class="ideas-right">
                                    <div class="content-idea">
                                        <h4>{{ $question }}</h4>
                                        @foreach(explode(',',$service->description) as $answer)
                                            @if($loop->index == $loop->parent->index)
                                                <p>{{ $answer }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12 col-service1">
                        <div class="img-service">
                            <img src="{{ asset($service->image) }}" />
                            <div class="content-ser-img1">
                                <div class="redbox1">
                                    <b>{{$service->title}}</b>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    @endif
@endforeach

@foreach ($popups as $popup)
    @if($popup->type == 1)
        <!-- moodel1 -->
        <div class="modal  fade {{ $popup->id }}" id='model{{ $popup->id }}' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content model-service">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="container-fluid">
                            <h4 class="model-head-service">{{$popup->title}}</h4>
                            <div id="carouselExampleControls6" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="img-service">
                                                    <img src="{{ asset($popup->image) }}" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="content-left-ser-model">
                                                    <p class="prag-services">{{$popup->description}}</p>
                                                    <ul class="ul-services-model">
                                                        @if (request()->segment(1) == 'en')
                                                            @foreach(explode(',',$popup->notes) as $note)
                                                                @if ($loop->index == 0)
                                                                    <li>
                                                                        <div class="media media-services">
                                                                            <i class="fas fa-circle ml-3 i-gray"></i>
                                                                            <div class="media-body">
                                                                                <p class="p-gray">
                                                                                    {{ $note }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                                @if ($loop->index == 1)
                                                                    <li>
                                                                        <div class="media media-services">
                                                                            <i class="fas fa-circle ml-3 i-red"></i>
                                                                            <div class="media-body">
                                                                                <p class="p-red">
                                                                                    {{ $note }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                                @if ($loop->index == 2)
                                                                    <li>
                                                                        <div class="media media-services">
                                                                            <i class="fas fa-circle ml-3 i-gray"></i>
                                                                            <div class="media-body">
                                                                                <p class="p-gray">
                                                                                    {{ $note }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                                @if ($loop->index == 3)
                                                                    <li>
                                                                        <div class="media media-services">
                                                                            <i class="fas fa-circle ml-3 i-red"></i>
                                                                            <div class="media-body">
                                                                                <p class="p-red">
                                                                                    {{ $note }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            @foreach(explode(',',$popup->notes) as $note)
                                                                @if ($loop->index == 0)
                                                                    <li>
                                                                        <div class="media media-services">
                                                                            <i class="fas fa-circle ml-3 i-gray"></i>
                                                                            <div class="media-body">
                                                                                <p class="p-gray">
                                                                                    {{ $note }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                                @if ($loop->index == 1)
                                                                    <li>
                                                                        <div class="media media-services">
                                                                            <i class="fas fa-circle ml-3 i-red"></i>
                                                                            <div class="media-body">
                                                                                <p class="p-red">
                                                                                    {{ $note }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                                @if ($loop->index == 2)
                                                                    <li>
                                                                        <div class="media media-services">
                                                                            <i class="fas fa-circle ml-3 i-gray"></i>
                                                                            <div class="media-body">
                                                                                <p class="p-gray">
                                                                                    {{ $note }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                                @if ($loop->index == 3)
                                                                    <li>
                                                                        <div class="media media-services">
                                                                            <i class="fas fa-circle ml-3 i-red"></i>
                                                                            <div class="media-body">
                                                                                <p class="p-red">
                                                                                    {{ $note }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endif
    @if($popup->type == 2)
        <!-- moodel2 -->
        <div class="modal fade {{ $popup->id }}" id='model{{ $popup->id }}' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content model-service">

                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="container-fluid">
                            <h4 class="model-head-service">{{$popup->title}}</h4>


                            <div class="service-sells-model">
                                <h5>{{$popup->title}}</h5>
                                <p>{{$popup->description}}</p>
                            </div>
                            <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            @if (request()->segment(1) == 'en')
                                                @foreach(explode(',',$popup->notes) as $note)
                                                    @if ($loop->index == 0)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-sells d-flex align-items-center">
                                                                <p>{{ $note }}</p>
                                                                <div class="line-bottom"></div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($loop->index == 1)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-sells d-flex align-items-center">
                                                                <p>{{ $note }}</p>
                                                                <div class="line-bottom1"></div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($loop->index == 2)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-sells d-flex align-items-center">
                                                                <p>{{ $note }}</p>
                                                                <div class="line-bottom2"></div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($loop->index == 3)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-sells d-flex align-items-center">
                                                                <p>{{ $note }}</p>
                                                                <div class="line-bottom3"></div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach

                                            @else
                                                @foreach(explode(',',$popup->notes) as $note)
                                                    @if ($loop->index == 0)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-sells d-flex align-items-center">
                                                                <p>{{ $note }}</p>
                                                                <div class="line-bottom"></div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($loop->index == 1)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-sells d-flex align-items-center">
                                                                <p>{{ $note }}</p>
                                                                <div class="line-bottom1"></div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($loop->index == 2)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-sells d-flex align-items-center">
                                                                <p>{{ $note }}</p>
                                                                <div class="line-bottom2"></div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($loop->index == 3)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-sells d-flex align-items-center">
                                                                <p>{{ $note }}</p>
                                                                <div class="line-bottom3"></div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endif
    @if($popup->type == 3)
        <!-- moodel3 -->
        <div class="modal fade {{ $popup->id }}" id='model{{ $popup->id }}' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content model-service">

                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="container-fluid">
                            <h4 class="model-head-service">{{$popup->title}}</h4>


                            <div class="service-sells-model">
                                <p class="text-center">{{$popup->description}}</p>
                            </div>
                            <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row text-center">
                                            @if (request()->segment(1) == 'en')
                                                @foreach(explode(',',$popup->notes) as $note)
                                                    @if ($loop->index == 0)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-chances align-items-center">
                                                                <img src="{{asset('https://sqm.sa/assets/images/1.svg')}}" />
                                                                <br>
                                                                <p>{{ $note }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($loop->index == 1)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-chances align-items-center">
                                                                <img src="{{asset('https://sqm.sa/assets/images/2.svg')}}" />
                                                                <br>
                                                                <p>{{ $note }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($loop->index == 2)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-chances align-items-center">
                                                                <img src="{{asset('https://sqm.sa/assets/images/3.svg')}}" />
                                                                <br>
                                                                <p>{{ $note }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($loop->index == 3)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-chances align-items-center">
                                                                <img src="{{asset('https://sqm.sa/assets/images/4.svg')}}" />
                                                                <br>
                                                                <p>{{ $note }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach(explode(',',$popup->notes) as $note)
                                                    @if ($loop->index == 0)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-chances align-items-center">
                                                                <img src="{{asset('https://sqm.sa/assets/images/1.svg')}}" />
                                                                <br>
                                                                <p>{{ $note }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($loop->index == 1)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-chances align-items-center">
                                                                <img src="{{asset('https://sqm.sa/assets/images/2.svg')}}" />
                                                                <br>
                                                                <p>{{ $note }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($loop->index == 2)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-chances align-items-center">
                                                                <img src="{{asset('https://sqm.sa/assets/images/3.svg')}}" />
                                                                <br>
                                                                <p>{{ $note }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($loop->index == 3)
                                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                                            <div class="card-chances align-items-center">
                                                                <img src="{{asset('https://sqm.sa/assets/images/4.svg')}}" />
                                                                <br>
                                                                <p>{{ $note }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endif
    @if($popup->type == 4)
        <!-- moodel4 -->
        <div class="modal  fade {{ $popup->id }}" id='model{{ $popup->id }}' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content model-service">

                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="container-fluid">
                            <h4 class="model-head-service">{{$popup->title}}</h4>
                            <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">

                                            <div class="col-lg-6 col-md-12">
                                                @if (request()->segment(1) == 'en')
                                                    @foreach(explode(',',$popup->notes) as $question)
                                                        <div class="ideas-right">
                                                            <div class="content-idea">
                                                                <h4>{{ $question }}</h4>
                                                                @foreach(explode(',',$popup->description) as $answer)
                                                                    @if($loop->index == $loop->parent->index)
                                                                        <p>{{ $answer }}</p>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    @foreach(explode(',',$popup->notes) as $question)
                                                        <div class="ideas-right">
                                                            <div class="content-idea">
                                                                <h4>{{ $question }}</h4>
                                                                @foreach(explode(',',$popup->description) as $answer)
                                                                    @if($loop->index == $loop->parent->index)
                                                                        <p>{{ $answer }}</p>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="img-service">
                                                    <img src="{{ asset($popup->image) }}" />

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endif
@endforeach
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



@section('script')
@endsection
