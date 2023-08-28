@extends('layouts.front')
@section('content')

    <section id="header">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner  carousel-in" style="height:810px;">
                <a class="carousel-control-prev prvLink" href="#carouselExampleControls" role="button" data-slide="prev" style="z-index: 888888;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span><i class="fas fa-angle-left"></i></span>
                </a>
    
                <a class="carousel-control-next nextLink" href="#carouselExampleControls" role="button" data-slide="next" style="z-index: 888888;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span><i class="fas fa-angle-right"></i></span>
                </a>
            </div>
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
                            <a style="cursor: pointer" data-toggle='model{{ $popup->id }}' class="more-ser">{{__('messages.showmore')}}<i class="fas fa-long-arrow-alt-left pop"></i></a>
                            
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section id="news">
        <div class="news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="head-new">
                            
                            <div class="content-head-new">
                                <h1>{{ __('messages.ourNew') }}</h1>
                            </div>
                        </div>

                        <h4 class="prag-new">
                            {{ __('messages.ourNewDesc') }}
                        </h4>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="new-carosl">
                            <div class="owl-carousel owl-carousel1 owl-theme">
                                @foreach ($newOffers as $newOffer)

                                    <div class="item" style="overflow: hidden;">
                                        <a href="projects-{{$newOffer->id}}-show">
                                        </a><div class="caro-content pro"><a href="projects-{{$newOffer->id}}-show">
                                                <img class="img-caro" src="{{ asset($newOffer->thumbnail) }}" width="100%">
                                            </a><div class="badge-pro git-fork" style="background-color: {{$newOffer->nav_color}}"><a href="projects-{{$newOffer->id}}-show">
                                                </a><a>{{$newOffer->textnav}}</a>
                                            </div>
                                            <div class="content-caro-new">
                                                <h4>{{ $newOffer->title }}</h4>
                                            </div>
                                            <div class="img-arrow">
                                                <a href="projects-{{$newOffer->id}}-show"><img src="/assets/images/arrow-new.png"></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="progress">
        <div class="progress-content">
            <div class="container">
                <h2>{{ __('messages.ourProgress') }}</h2>
                <div class="row">
                    @foreach ($progress as $myProgress)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="media">
                                <div class="pro-img">
                                    <img src="{{ asset('/images/icons/'.$myProgress->image) }}" />
                                </div>
                                <div class="media-body media-progress">
                                    <h5 class="mt-0">{{ $myProgress->title }}</h5>
                                    <p>{{ $myProgress->num }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="partner">
        <div class="partners">
            <h2>{{ __('messages.ourPartners') }}</h2>
            <div class="owl-carousel owl-carousel2 owl-theme">
                @foreach ($partners as $partner)

                    <div class="item">

                        <div class="caro-partner">
                            <img src="{{ asset($partner->logo) }}" />

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <div class="boxs">
        @if(\App\Models\setting::getSetting()->show_filter)
        <!-- filter modal -->
        <div class="modal animated fadeInLeft" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="    z-index: 2147483647;">
            <div class="modal-dialog modal-dialogleft modal-dialog-centered" role="document">
                <div class="modal-content model-search">
    
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('messages.filter') }}</h5>
                         <form method="get" action="{{Route('WebController.projectFilter')}}">
                        @csrf
                        
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text input-i">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                                <input name="searchText" type="text" class="form-control searchInput input-model" id="inlineFormInputGroup" placeholder="{{ __('messages.filter') }}">
                            </div>
    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-search select-search">
                                        <label class="text-right">{{ __('messages.projectType') }}</label>
                                        <select class="form-control" name="type_id">
                                <option value="all" selected>{{ __('messages.all') }}</option>
                                @foreach ($types as $type)
                                <option value="{{ $type->name }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-search select-search">
                                        <label class="text-right">{{ __('messages.rooms') }}</label>
                                        <select class="form-control" name="room">
                                            <option value="all" selected>{{ __('messages.all') }}</option>
                                            @foreach ($rooms as $room)
                                                <option value="{{ $room->room }}">{{ $room->room }}</option>
                                            @endforeach
                                        </select>
    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-search select-search">
                                        <label class="text-right">{{ __('messages.bathrooms') }}</label>
                                        <select class="form-control" name="bathroom">
                                            <option value="all" selected>{{ __('messages.all') }}</option>
                                            @foreach ($bathRooms as $bathRoom)
                                                <option value="{{ $bathRoom->bathroom }}">{{ $bathRoom->bathroom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-search select-search">
                                        <label class="text-right">{{ __('messages.rentType') }}</label>
                                        <select class="form-control" name="rentType">
                                <option value="all" selected>{{ __('messages.all') }}</option>
                             <option value='='> {{ __('messages.sale') }}</option>
                              <option value='!='> {{ __('messages.notsale') }}</option>

                             </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-search">{{ __('messages.filter') }}</button>
    
                        </form>
                    </div>
    
                </div>
            </div>
        </div>
        @endif

    </div>
<div class='boxs'>
            <!-- ads modal -->
        @if(\App\Models\setting::getSetting()->show_ads)
        <div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="    z-index: 2147483647;">
            <div class="modal-dialog modal-dialogcen modal-dialog-centered" role="document">
                <div class="modal-content model-search model-add">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="images-sc">
                        <div id="carouselExampleControlsS" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                        </div>

                        <a class="carousel-control-prev prvLink" style="left: -6px;" href="#carouselExampleControlsS" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span><i class="fas fa-angle-left"></i></span>
                        </a>

                        <a class="carousel-control-next nextLink" href="#carouselExampleControlsS" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span><i class="fas fa-angle-right"></i></span>
                        </a>
                        </div>
                        
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif
</div>
@foreach ($popups as $popup)
    @if($popup->type == 1)
        <!-- moodel1 -->
        <div class="modal  fade {{ $popup->id }}" id='model{{ $popup->id }}' style="z-index: 99999999999999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <div style="z-index: 99999999999999;" class="modal fade {{ $popup->id }}" id='model{{ $popup->id }}' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <div style="z-index: 99999999999999;"  class="modal fade {{ $popup->id }}" id='model{{ $popup->id }}' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <div style="z-index: 99999999999999;" class="modal  fade {{ $popup->id }}" id='model{{ $popup->id }}' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

@section('link-best',\App\Models\Link::getLinks()->home_link)

@section('script')
        <script>
    let carousel = document.querySelector(".carousel-in")
    fetch("api/sliders")
    .then(res => res.json())
    .then(data => {
        
        data.home.forEach(data => {
            if(data.isDeleted == 0){
                
                 carousel.innerHTML += `
                            <div class="carousel-item">
            
                                <div class=" ">

                                    <img class="d-block w-100 h-img slider-im" src="${window.innerWidth > 700 ? data.image: data.image_phone}" alt="First slide" />
                                    
                                    <div class="carousel-caption d-md-block">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-8 col-sm-12">
                                                    <p style="color:${data.color?data.color:"#000"}" >
                                                        ${window.location.pathname.split("/")[1]== "ar"? data.description_ar?data.description_ar:"": data.description_en?data.description_en:''}
                                                    </p>
                                                </div>
                                                <div class="col-md-6 col-md-4 col-sm-0"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `
                    
                document.querySelectorAll(".carousel-in  > div.carousel-item")[0].classList.add("active")
            }
           
        })
        
    })
        
        
        
    </script>
    <script>
        $(".owl-carousel1").owlCarousel({

            loop: false
            , margin: 10
            , nav: true
            , mouseDrag: true
            , autoplay: true
            , dots: false
            , rtl: true,


            responsive: {
                0: {

                    items: 1
                    , }
                , 440: {
                    items: 1
                    , }
                , 770: {
                    items: 2
                    , }
                , 1000: {
                    items: 2
                    , }
                , }
            , });

    </script>
    <script>
        $(".owl-carousel2").owlCarousel({

            loop: false
            , margin: 10
            , nav: true
            , mouseDrag: true
            , autoplay: true
            , dots: false
            , rtl: true,


            responsive: {
                0: {

                    items: 2
                    , }
                , 440: {
                    items: 3
                    , }
                , 770: {
                    items: 5
                    , }
                , 1000: {
                    items: 6
                    , }
                , }
            , });

    </script>


    <script type="text/javascript">
        $(window).on("load", function() {

            $("#myModal").modal("show");
        });

        $(window).on("load", function() {

            $("#myModal11").modal("show");
        });


    </script>


@endsection
