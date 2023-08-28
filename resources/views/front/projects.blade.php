@extends('layouts.front')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .data div{
        padding: 5px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }
</style>
@endsection
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

<section id="projects">
    <div class="projects-page">
        <div class="container">
            <h2>{{ __('messages.Projects') }}</h2>
            <img class="under-img" src="/assets/images/underser.png" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5 col-sm-12">
                    <div class="card-search">
                        <form method="get" action="{{Route('WebController.projectFilter')}}">
                        @csrf

                        
                        
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text input-i">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            <input name="searchText" type="text" class="form-control searchInput" value="" id="inlineFormInputGroup" placeholder="{{ __('messages.filter') }}">
                        </div>
                        <div class="form-group form-search">
                            <label class="text-right">{{ __('messages.projectType') }}</label>
                            <select class="form-control" name="type_id">
                                <option value="all" selected>{{ __('messages.all') }}</option>
                                @foreach ($types as $type)
                                <option value="{{$type->type}}">{{ $type->type }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group form-search">
                           {{--<label class="text-right">{{ __('messages.typeEgar') }}</label>--}}
                            <select class="form-control" name="rentType">
                                <option value="all" selected>{{ __('messages.all') }}</option>
                             <option value='='> {{ __('messages.sale') }}</option>
                              <option value='!='> {{ __('messages.notsale') }}</option>

                             </select>
                             
                       </div>
                       <div class="form-group form-search">
                           <label class="text-right">{{ __('messages.tasnef') }}</label>
                           <div class="form-check">
                             <input class="form-check-input" type="radio" name="radios" id="exampleRadios1" value="modern" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              {{ __('messages.moder') }}
                            </label>
                            </div>
                             <div class="form-check">
                               <input class="form-check-input" type="radio" name="radios" id="exampleRadios2" value="ancient">
                                 <label class="form-check-label" for="exampleRadios2">
                                {{ __('messages.ancient') }}
                                  </label>
                                 </div>
                             
                       </div>
                        <div class="form-group form-search">
                            <label class="text-right">{{ __('messages.rooms') }}</label>
                            <select class="form-control" name="room">
                                <option value="all" selected>{{ __('messages.all') }}</option>
                                @foreach ($rooms as $room)
                                <option value="{{ $room->room }}">{{ $room->room }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group form-search">
                            <label class="text-right">{{ __('messages.bathrooms') }}</label>
                            <select class="form-control" name="bathroom">
                                <option value="all" selected>{{ __('messages.all') }}</option>
                                @foreach ($bathRooms as $bathRoom)
                                <option value="{{ $bathRoom->bathroom }}">{{ $bathRoom->bathroom }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                              
                       
                        <div class="form-group form-search">
                            <label class="text-right">{{ __('messages.city') }}</label>
                            <select class="form-control" name="city">
                                <option value="all" selected>{{ __('messages.all') }}</option>
                                @foreach ($cities as $city)
                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-search">
                            <label class="text-right">{{ __('messages.town') }}</label>
                            <select class="form-control" name="town">
                                <option value="all" selected>{{ __('messages.all') }}</option>
                                @foreach ($towns as $town)
                                <option value="{{ $town->town }}">{{ $town->town }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group form-search">
                            <label class="text-right">{{ __('messages.price') }}</label>
                            <span class="rangeValues"></span>
                            <div class="range-slider">
                                {{--<p>{{__('messages.minprice')}}</p>--}}
                                <input value="1000" min="1000" max="4000000" step="500" type="range" name="min_price" class="rangeValues">
                                {{--<p>{{__('messages.maxprice')}}</p>--}}
                                                                <input value="4000000" min="1000" max="4000000" step="500" type="range" name="max_price" class="rangeValues">


                            </div>
                        </div>
                        <button type="submit">{{ __('messages.filter') }}</button>
                        </form>

                    </div>

                </div>
                <div class="col-lg-9 col-md-7 col-sm-12">
                    <div class="row">
                        @foreach ($projects as $project)
                                <div class="col-lg-4 col-md-12 col-sm-12" style="overflow: hidden; padding:0;margin: 20px 25px;">
                                    <a href="projects-{{$project->id}}-show">
                                    </a><div class="caro-content pro"><a href="projects-{{$project->id}}-show">
                                            <img class="img-caro" src="{{ asset($project->thumbnail) }}" width="100%">
                                        </a><div class="badge-pro git-fork" style="background-color: {{$project->nav_color}}"><a href="projects-{{$project->id}}-show">
                                            </a><a>{{$project->textnav}}</a>
                                        </div>
                                        <div class="content-caro-new">
                                            <h4>{{ $project->title }}</h4>
                                        </div>
                                        <div class="img-arrow">
                                            <a href="projects-{{$project->id}}-show"><img src="/assets/images/arrow-new.png"></a>
                                        </div>
                                        
                                            
                                           
                                        </div>
                                        <div class="data" style="display: flex;flex-direction: column;font-size: 18px; justify-content: space-between;">
                                                <div>
                                                <span>
                                                @if($project->rentType == 'Sale')
                                                  {{__('messages.sale')}}
                                                @else
                                                    {{__('messages.notsale')}}
                                                @endif
                                                </span>
                                                   
                                        
                                            </div>
                                            <div class="box2">
                                                <span>
                                                @if($project->type == 'ارض' OR $project->type == 'space' OR $project->type == 'معرض تجاري' OR $project->type == 'مستودع' OR $project->type == 'Store' OR $project->type == 'werehouse')
                                                    <svg style="position: relative;top: 9px;left: -2px;" version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 37" width="30" height="30"><style>.a{fill:#76787a}</style><path class="a" d="m35.5 18.1q0 7 0 13.9c0 0.6-0.2 0.9-0.7 1.2q-3.6 1.8-7.2 3.6c-0.3 0.2-0.6 0.2-1 0q-4.2-1.8-8.4-3.6c-0.3-0.2-0.6-0.2-0.9 0q-4.1 1.8-8.2 3.6c-0.4 0.2-0.8 0.2-1.2 0q-3.6-1.9-7.3-3.7c-0.4-0.2-0.6-0.5-0.6-0.9q0.1-14.1 0.1-28.3c0-0.7 0.2-0.8 0.8-0.5q3.5 1.8 7.1 3.6c0.4 0.2 0.7 0.2 1.1 0 0.5-0.3 1.1-0.5 1.7-0.8 0.2-0.1 0.5-0.2 0.7 0.2 0.1 0.3-0.2 0.4-0.4 0.6-0.6 0.2-1.2 0.5-1.7 0.7-0.4 0.1-0.5 0.4-0.5 0.7q0 3.6 0 7.2c0 0.3 0.1 0.8-0.4 0.8-0.5 0-0.4-0.5-0.4-0.8q0-3.6 0-7.2c0-0.3-0.1-0.6-0.4-0.7q-3.2-1.6-6.4-3.2c-0.4-0.2-0.5-0.2-0.5 0.3q0 13.5 0 27c0 0.4 0.2 0.6 0.5 0.8q3.2 1.6 6.3 3.1c0.5 0.3 0.5 0.3 0.5-0.3q0-2.1 0-4.2 0-0.2 0-0.4c0-0.2 0.1-0.4 0.4-0.4 0.3 0 0.4 0.2 0.4 0.4q0 0.3 0 0.7 0 1.8 0 3.7c0 0.8 0 0.8 0.7 0.5q3.6-1.6 7.2-3.1c0.4-0.2 0.6-0.5 0.6-0.9-0.1-1.2 0-2.4 0-3.6q0-0.3 0-0.5c0-0.2 0-0.6 0.4-0.6 0.3 0 0.4 0.4 0.4 0.6q0 1.7 0 3.4c0 1.6-0.2 1.2 1.2 1.8q3.3 1.5 6.7 2.9c0.7 0.3 0.7 0.3 0.7-0.5q0-4.1 0-8.3c0-0.3-0.2-0.8 0.4-0.8 0.5 0 0.3 0.5 0.3 0.8q0 4.2 0 8.5c0 0.6 0.1 0.6 0.6 0.3q3.1-1.6 6.2-3.1c0.3-0.2 0.4-0.4 0.4-0.8q0-13.5 0-27c0-0.5 0-0.5-0.5-0.3q-2.6 1.4-5.3 2.8-0.2 0.1-0.4 0.2c-0.2 0-0.4 0-0.5-0.2-0.1-0.2 0-0.4 0.2-0.5q0.3-0.2 0.7-0.4 2.8-1.4 5.6-2.9c0.8-0.4 1-0.3 1 0.5q0 7.1 0 14.1z"/><path fill-rule="evenodd" class="a" d="m27.2 7.9c0 1.1-0.3 2.2-0.6 3.3-1.2 3.4-2.7 6.7-4.7 9.7-0.4 0.6-0.8 1.1-1.3 1.6-0.6 0.5-1.1 0.5-1.7 0q-0.7-0.5-1.1-1.2c-2.5-3.6-4.3-7.4-5.4-11.7-1-4.3 1.9-8.3 6-9.1 4.1-0.7 8.1 2.2 8.7 6.2 0.1 0.4 0.1 0.8 0.1 1.2zm-14.2 0c0 0.4 0 0.8 0.1 1.2 1 4.3 2.8 8.2 5.3 11.8q0.3 0.5 0.8 0.9c0.4 0.4 0.6 0.4 1 0 0.4-0.4 0.8-0.9 1.1-1.4 1.7-2.5 3-5.2 4.1-8.1 0.5-1.2 0.9-2.5 1-3.8 0.4-4.3-3.3-7.7-7.4-7.3-3.4 0.4-6 3.2-6 6.7z"/><path fill-rule="evenodd" class="a" d="m15.5 24.1q0 2.1 0 4.2c0 0.8-0.3 1.2-1.2 1.2q-2.8 0-5.7 0c-0.8 0-1.1-0.3-1.2-1.1q0-4.2 0-8.4 0.1-0.7 0.5-1.3 1.6-1.8 3.1-3.7c0.4-0.5 0.6-0.5 1 0q1.5 1.9 3.1 3.7 0.4 0.6 0.4 1.4 0 2 0 4zm-0.7 0q-0.1-2 0-3.9c0-0.4-0.1-0.8-0.4-1.1q-1.3-1.5-2.6-3.1c-0.2-0.4-0.4-0.3-0.7 0q-1.2 1.6-2.5 3.2-0.4 0.4-0.4 1 0 4 0 7.9c0 0.5 0.1 0.6 0.6 0.6q2.7 0 5.4 0c0.4 0 0.6-0.1 0.6-0.6q-0.1-2 0-4z"/><path class="a" d="m19.8 26.2c-1.1 0-2-0.1-3-0.2-0.3-0.1-0.6-0.1-0.6-0.5 0.1-0.4 0.5-0.3 0.7-0.3q3.3 0.5 6.5-0.1c1.1-0.2 2.1-0.5 3.1-1q0.2-0.2 0.4-0.3c1.2-0.8 1.2-1.8 0-2.6-0.8-0.5-1.7-0.8-2.6-1.1q-0.2 0-0.4-0.1-0.3-0.1-0.3-0.4c0.1-0.2 0.2-0.3 0.4-0.3q0.5 0.1 0.9 0.2c1 0.3 2 0.7 2.8 1.3 1.2 1 1.2 2.3 0 3.3-1.1 1-2.4 1.4-3.8 1.7q-0.9 0.2-1.8 0.3c-0.8 0-1.6 0.1-2.3 0.1z"/><path class="a" d="m27.5 15.9q0 1.3 0 2.5c0 0.3 0 0.6-0.3 0.6-0.4 0-0.4-0.3-0.4-0.5q0-2.6 0-5.2c0-0.3 0-0.5 0.3-0.5 0.4 0 0.4 0.3 0.4 0.5q0 1.3 0 2.6z"/><path fill-rule="evenodd" class="a" d="m24 7.7c0 2.4-1.9 4.3-4.2 4.3-2.5 0-4.4-1.9-4.4-4.3 0-2.4 2-4.3 4.3-4.3 2.4 0 4.3 1.9 4.3 4.3zm-0.7 0c0-2-1.6-3.5-3.6-3.5-1.9-0.1-3.5 1.5-3.5 3.5-0.1 1.9 1.5 3.5 3.5 3.5 2 0 3.5-1.5 3.6-3.5z"/><path class="a" d="m10.4 22.2c0 0.8 0 0.9 0.8 0.9q0.2 0 0.4 0c1.9-0.1 2 1.2 1.7 2.5-0.1 0.5-0.5 0.7-1 0.8-0.2 0.1-0.4 0.2-0.4 0.5 0 0.3-0.1 0.5-0.4 0.5-0.3 0-0.4-0.3-0.4-0.5 0-0.3-0.1-0.4-0.4-0.5-0.5-0.1-0.9-0.3-1.1-0.9-0.1-0.2 0-0.5 0.3-0.6 0.2-0.1 0.4 0.1 0.4 0.3 0.1 0.4 0.4 0.5 0.8 0.5q0.3 0 0.7 0c0.7 0 0.9-0.2 0.9-0.9 0-0.8-0.1-0.9-1-0.9q-0.1 0-0.2 0c-1.6 0-1.9-0.4-1.9-1.9 0-0.8 0.3-1.2 1.1-1.4 0.3-0.1 0.4-0.2 0.4-0.5 0-0.2 0.1-0.4 0.4-0.4 0.3-0.1 0.4 0.2 0.4 0.4 0 0.3 0.1 0.4 0.4 0.5 0.6 0.1 1 0.4 1.1 1 0 0.2 0 0.4-0.2 0.5-0.3 0.1-0.4-0.1-0.5-0.3-0.2-0.4-0.5-0.5-0.8-0.5q-0.3 0-0.7 0c-0.7 0-0.8 0.1-0.8 0.9z"/></svg>
                                                @else
                                                    <svg style="position: relative;top: 9px;left: -2px;" version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37 38" width="30" height="30"><style>.a{fill:#000 !important}</style><path class="a" d="m16.9 0.9q0.5 0.3 0.4 0.8c0 0.3 0.1 0.4 0.4 0.4q1.8 0 3.6 0c0.6 0 0.9 0.2 0.9 0.9q0 0.5 0 1.1c0 0.3 0.1 0.4 0.4 0.4q1.7 0 3.5 0c0.7 0 0.9 0.2 0.9 0.9q0 1.3 0 2.5 0 0.2 0 0.4-0.1 0.5-0.6 0.5c-0.3 0-0.6-0.2-0.7-0.5 0-0.2 0-0.5 0-0.7q0-0.7 0-1.4c0-0.3-0.1-0.4-0.4-0.4q-0.7 0-1.4 0-6.4 0-12.8 0c-0.2 0-0.4 0-0.7 0q-0.4-0.2-0.4-0.7c0-0.3 0.2-0.5 0.5-0.6q0.2 0 0.4 0 4.8 0 9.5 0c0.5 0 0.5 0 0.5-0.5 0-0.6 0-0.6-0.6-0.6q-1.6 0-3.2 0c-0.7 0-1.1-0.2-1.1-1q0-0.3-0.3-0.3-0.9 0-1.8 0c-0.2 0-0.2 0.1-0.2 0.3-0.1 0.8-0.2 1-1 1q-1.7 0-3.4 0c-0.4 0-0.5 0.1-0.5 0.5q0.1 0.5 0 1c0 0.6-0.2 0.9-0.9 0.9q-1.7 0-3.4 0c-0.5 0-0.5 0-0.5 0.6q0 12.1 0 24.3 0 0.3-0.1 0.6c0 0.4-0.3 0.6-0.6 0.5-0.3 0-0.6-0.2-0.6-0.5q0-0.2 0-0.4 0-12.7 0-25.5c0-0.7 0.2-0.9 0.9-0.9q1.7 0 3.4 0c0.5 0 0.5 0 0.5-0.5q0-0.5 0-1.1c0-0.6 0.3-0.8 0.8-0.8q1.9 0 3.7 0c0.3 0 0.4-0.1 0.4-0.4-0.1-0.3 0.1-0.6 0.3-0.8q2.1 0 4.2 0z"/><path class="a" d="m36.7 1.8q-0.2 0.2-0.4 0.4-17.4 17.3-34.7 34.7-0.2 0.2-0.4 0.3-0.4 0.3-0.7-0.1-0.4-0.3-0.1-0.8 0.1-0.1 0.2-0.3 17.4-17.4 34.8-34.8 0.2-0.1 0.4-0.3c0.3 0 0.7-0.1 0.9 0.1 0.1 0.1 0 0.5 0 0.8z"/><path class="a" d="m36.7 25.4c-0.4 0.5-0.8 0.5-1.2 0.1q-5-5-10.1-10.1-0.1-0.1-0.2-0.2c-0.1-0.3-0.1-0.6 0.1-0.8q0.4-0.3 0.8-0.1 0.2 0.2 0.4 0.3 4.3 4.4 8.6 8.7c0.1 0.1 0.2 0.2 0.3 0.2 0.1-0.1 0-0.2 0-0.3q0-3.6 0.1-7.3c0-0.3-0.2-0.4-0.5-0.4q-1.8 0-3.5 0c-0.7 0-0.9-0.2-0.9-0.9 0-0.2-0.1-0.3-0.4-0.3q-0.1 0-0.2 0c-0.5 0-0.6-0.1-0.6 0.5 0 0.4-0.2 0.7-0.6 0.7-0.4 0-0.6-0.3-0.7-0.7q0-0.5 0-1.1 0.1-0.7 0.8-0.7 1.1-0.1 2.3 0c0.5 0 0.7 0.3 0.7 0.8 0 0.3 0.1 0.4 0.4 0.4q1.7 0 3.4 0c0.4 0 0.7 0 1 0.3q0 5.5 0 10.9z"/><path fill-rule="evenodd" class="a" d="m5.1 18.2q0-5.2 0-10.3c0-0.8 0.2-1 1-1q8.8 0 17.6 0c0.7 0 0.9 0.3 0.9 1q0 1.2 0 2.5c0 0.5-0.2 0.8-0.6 0.8-0.4 0.1-0.7-0.2-0.7-0.7q0-0.9 0-1.9c0-0.3-0.1-0.4-0.4-0.4q-0.8 0-1.6 0-0.3 0-0.3 0.3 0 1.5 0 3 0 0.3 0.3 0.3 0.4 0 0.7 0c0.5 0 0.8 0.3 0.8 0.6-0.1 0.4-0.4 0.7-0.8 0.7q-0.3 0-0.7 0c-0.3 0-0.3 0.1-0.3 0.3q0 0.5-0.1 0.9c0 0.4-0.3 0.6-0.6 0.6-0.4-0.1-0.6-0.3-0.6-0.7q0-0.4 0-0.8c0-0.2-0.1-0.3-0.3-0.3q-0.9 0-1.8 0-0.3 0-0.3 0.2 0 1.6 0 3.1 0 0.2 0.2 0.3 0.4 0.2 0.4 0.6 0 0.4-0.4 0.6-0.2 0-0.2 0.2-0.2 0.4-0.6 0.4c-0.3 0-0.5-0.1-0.6-0.4-0.1-0.2-0.2-0.2-0.4-0.2q-0.8 0-1.7 0c-0.3 0-0.3 0.1-0.3 0.3q0 1.6 0 3.1c0 0.4-0.1 0.7-0.5 0.8q-0.1 0.1-0.2 0.2c-0.1 0.4-0.4 0.5-0.8 0.5q-0.9 0-1.7 0c-0.5 0-0.5 0-0.5 0.5q0 0.9 0 1.8c0 0.3-0.1 0.5-0.4 0.6q-0.3 0.2-0.6-0.1c-0.2-0.1-0.3-0.3-0.3-0.6q0-0.9 0-1.8c0-0.3-0.1-0.4-0.3-0.4q-0.8 0-1.6 0c-0.3 0-0.4 0.1-0.4 0.3q0 1.5 0 2.9 0 0.4 0.3 0.3 0.1 0 0.2 0c0.4 0.1 0.7 0.3 0.7 0.7 0 0.3-0.3 0.6-0.7 0.6-0.5 0.1-0.5 0.1-0.5 0.6 0 0.2 0 0.5 0 0.7q-0.2 0.5-0.7 0.5c-0.3 0-0.5-0.2-0.6-0.5q0-0.2 0-0.5 0-5.1 0-10.2zm14.6-8.2q0-0.7 0-1.5 0-0.3-0.3-0.3-0.9 0-1.8 0-0.3 0-0.3 0.3 0 1.5 0 3 0 0.3 0.3 0.3 0.9 0 1.8 0 0.3 0 0.3-0.3 0-0.8 0-1.5zm-11 9.7q0-0.7 0-1.5c0-0.2 0-0.3-0.3-0.3q-0.8 0-1.7 0c-0.2 0-0.3 0.1-0.3 0.3q0 1.5 0 3c0 0.2 0.1 0.3 0.3 0.3q0.9 0 1.7 0c0.3 0 0.3-0.1 0.3-0.3q0-0.8 0-1.5zm1.3 0q0.1 0.7 0 1.4c0 0.3 0.1 0.4 0.4 0.4q0.8 0 1.6 0c0.3 0 0.4-0.1 0.4-0.3q0-1.5 0-3c0-0.2-0.1-0.3-0.4-0.3q-0.8 0-1.6 0c-0.3 0-0.4 0.1-0.4 0.4q0.1 0.7 0 1.4zm-1.3-9.7q0-0.7 0-1.4c0-0.3-0.1-0.4-0.3-0.4q-0.8 0-1.7 0c-0.2 0-0.3 0.1-0.3 0.3q0 1.5 0 3 0 0.3 0.3 0.3 0.9 0 1.7 0c0.3 0 0.3-0.1 0.3-0.4q0-0.7 0-1.4zm1.3 0q0 0.7 0 1.4c0 0.3 0.1 0.4 0.4 0.4q0.8 0 1.7 0 0.3 0 0.3-0.3 0-1.5 0-3 0-0.3-0.3-0.3-0.9 0-1.7 0c-0.3 0-0.4 0.1-0.4 0.4q0 0.7 0 1.4zm3.7 0q0 0.7 0 1.4c0 0.3 0 0.4 0.3 0.4q0.8 0 1.7 0c0.2 0 0.3-0.1 0.3-0.4q0-1.4 0-2.8c0-0.3-0.1-0.4-0.3-0.4q-0.9 0-1.7 0c-0.2 0-0.3 0.1-0.3 0.4q0 0.7 0 1.4zm-5 4.8q0-0.7 0-1.4c0-0.2 0-0.3-0.3-0.3q-0.8 0-1.7 0c-0.2 0-0.3 0.1-0.3 0.3q0 1.4 0 2.9 0 0.3 0.3 0.3 0.9 0 1.7 0 0.4 0 0.3-0.3 0-0.7 0-1.5zm1.3 0q0 0.8 0 1.5 0 0.3 0.4 0.3 0.8 0 1.7 0 0.3 0 0.3-0.3 0-1.5 0-2.9c0-0.2-0.1-0.3-0.3-0.3q-0.9 0-1.7 0c-0.3 0-0.4 0.1-0.4 0.3q0 0.7 0 1.4zm3.7 0q0 0.8 0 1.5 0 0.3 0.3 0.3 0.8 0 1.7 0 0.3 0 0.3-0.3 0-1.5 0-2.9 0-0.3-0.3-0.3-0.9 0-1.7 0c-0.3 0-0.3 0.1-0.3 0.3q0 0.7 0 1.4z"/><path class="a" d="m12.4 32.1q0-2.1 0-4.2-0.1-0.2 0-0.5 0.2-0.4 0.7-0.4 0.4 0 0.5 0.5 0.1 0.2 0.1 0.4 0 3.8 0 7.7c0 0.5 0 0.5 0.4 0.5q2.6-0.1 5.2 0c0.2 0 0.4-0.1 0.4-0.4 0-0.7 0.2-0.9 0.8-0.9q1.4 0 2.8 0 1.4 0 2.7 0c0.8 0 1 0.2 1 1q0 0.4 0 0.8c0 0.5-0.3 0.7-0.7 0.7-0.3 0-0.6-0.3-0.6-0.7 0-0.5 0-0.5-0.5-0.5q-1.9 0-3.8 0c-0.3 0-0.4 0.1-0.4 0.4-0.1 0.6-0.3 0.8-0.9 0.8q-3.4 0-6.9 0c-0.6 0-0.8-0.2-0.8-0.9q0-2.1 0-4.3z"/><path class="a" d="m20.9 29.4q0-1.7 0-3.5c0-0.5 0.2-0.8 0.8-0.8q1.7 0 3.3 0 0.8 0 0.8 0.8 0 3.5 0 7c0 0.5-0.3 0.8-0.7 0.8-0.3 0-0.6-0.3-0.6-0.8q0-1.2 0-2.5c0-0.3-0.1-0.4-0.4-0.3q0 0-0.1 0c-0.4-0.1-0.7-0.3-0.7-0.7 0-0.3 0.2-0.6 0.6-0.6 0.6-0.1 0.6-0.1 0.6-0.8q0-0.6 0-1.2c0-0.3-0.1-0.4-0.4-0.4q-0.7 0-1.5 0c-0.3 0-0.4 0.1-0.4 0.4q0 2.9 0 5.8c0 0.2 0 0.4-0.1 0.6q-0.1 0.5-0.6 0.5-0.5-0.1-0.6-0.6 0-0.1 0-0.3 0-1.7 0-3.4z"/><path fill-rule="evenodd" class="a" d="m31.9 28.2q0 1.1 0 2.2c0 0.6-0.3 0.9-0.9 0.9q-1.6 0-3.2 0c-0.6 0-0.9-0.3-0.9-0.9q0-2.2 0-4.4c0-0.6 0.3-0.9 0.9-0.9q1.6 0 3.2 0c0.6 0 0.9 0.3 0.9 0.9q0 1.1 0 2.2zm-3.7 0q0 0.7 0 1.4c0 0.3 0.1 0.4 0.3 0.4q0.9-0.1 1.7 0c0.3 0 0.4-0.1 0.4-0.4q0-1.4 0-2.8c0-0.3-0.1-0.4-0.4-0.4q-0.8 0-1.6 0c-0.3 0-0.4 0.1-0.4 0.4q0 0.7 0 1.4z"/><path fill-rule="evenodd" class="a" d="m19.7 28.2q0 1.1 0 2.2c0 0.6-0.2 0.9-0.8 0.9q-1.6 0-3.2 0c-0.6 0-0.9-0.3-0.9-0.9q0-0.8 0-1.5 0-1.4 0-2.8c0-0.8 0.2-1 1-1q1.5 0 3 0c0.7 0 0.9 0.2 0.9 1q0 1.1 0 2.1zm-3.6 0q0 0.7 0 1.4c0 0.3 0.1 0.4 0.3 0.4q0.9 0 1.8 0 0.3 0 0.3-0.3 0-1.5 0-3 0-0.3-0.3-0.3-0.9 0-1.8 0c-0.2 0-0.3 0.1-0.3 0.3q0 0.8 0 1.5z"/><path class="a" d="m34.3 31.2q0 2.6 0 5.3c0 0.6-0.2 0.8-0.9 0.8q-2.3 0-4.5 0c-0.4 0-0.7-0.2-0.7-0.5q-0.1-0.5 0.3-0.7c0.2-0.1 0.3 0 0.5 0q1.7 0 3.5 0c0.5 0 0.5 0 0.5-0.5q0-4.7 0-9.4c0-0.2 0-0.4 0-0.6q0.2-0.5 0.7-0.5c0.3 0 0.5 0.3 0.6 0.6q0 0.2 0 0.4 0 2.6 0 5.1z"/></svg>
                                                @endif
                                                    {{$project->type}}
                                                </span>
                                                @if($project->type == 'ارض' OR $project->type == 'مكتب' OR $project->type == 'office' OR $project->type == 'space' OR $project->type == 'معرض تجاري' OR $project->type == 'مستودع' OR $project->type == 'Store' OR $project->type == 'werehouse')
                                                   <span style="width: 40%;">
<span style="width: 40%;">
                                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.2" viewBox="0 0 403 411" width="30" height="30"><style>tspan{white-space:pre}.a{font-size: 98px;fill: #000000;font-weight: 700;font-family: "ElMessiri-Bold", "El Messiri"}</style><path d="m402.5 286.7c0 12-5.3 17.4-17.2 17.4q-87.7 0-175.3 0c-7.5 0-13.6-6-13.7-13.4q0-0.2 0-0.3c-0.1-7.6 6.1-13.8 13.6-13.8q1 0 1.5 0 79.4-0.2 158.8 0c3.5 0 4.8-0.9 4.8-4.7q-0.2-66.4 0-132.8c0-3.5 0-34.5 0-36.8q-0.2-34.6 0-69.2c0-3.8-1-5.1-4.9-5.1q-79.2 0.2-158.4 0c-4.1 0-33.9-0.1-37.9 0-11 0.3-22.1 0.1-33.2 0.1-5.2 0-5.2 0-5.2 5.4q0 59.4 0 118.8c0 39.7 0 79.4-0.1 119.2 0 4.1 1.2 5.2 5.2 5.1q1.1 0 2.2 0c7.7-0.2 14 6 14 13.7 0 7.7-6.2 13.8-13.8 13.8q-9 0-18 0c-12 0-17.2-5-17.2-16.9 0-90.3 0.1-180.5 0-270.8 0-7.5 2.8-12.8 9.9-15.6h275.2c7.2 3.3 9.8 9 9.8 16.7-0.1 89.7-0.1 179.5-0.1 269.2z"/><path d="m90.5 410.4c-3.5-1.8-6.4-4.3-9.2-7.1-7-7.1-14.2-14.1-21.2-21.3-7.9-8.1-7.8-15.4 0.2-23.5 8-8 16-15.9 23.9-23.9 3.5-3.5 8.5-5.3 13.4-4.3 9.8 2 13.8 13.2 8.3 21.3-1 1.5-2.7 2.5-3.3 4.7h251.9c-1.4-1.8-2.6-3.2-3.7-4.7-4.1-5.7-3.3-13.4 1.8-18.1 5-4.6 13.2-5 18.2-0.1 9.5 9.1 18.9 18.5 28 28 4.7 4.8 4.7 12.7 0.2 17.6-9.4 9.9-19.2 19.4-28.9 29-1 0.9-2.2 1.5-3.4 2.2-2.8 0.1-6.2 0.1-9.1 0.2-4.8-2.5-8.6-5.8-9.3-11.6-0.8-5.8 2.2-10.1 6.4-14.4h-252.5c1.8 2.6 3.9 4.4 5 6.8 3.2 7.2 0.7 13.6-7.6 18.9-2.9 0.1-6.2 0.2-9.1 0.3z"/><path d="m45.3 0.7c3.6 1.8 6.6 4.3 9.4 7.2 7.5 7.6 15.2 15 22.5 22.7 7.7 8 5.3 19.5-4.5 23.2-4.7 1.7-8.9 0.7-12.9-2-1.3-0.9-2.2-2.3-4.2-2.8v233c1.8 0 2.5-1.5 3.6-2.4 5.9-4.5 14-4 18.9 1.2 5 5.4 5.1 13.3-0.2 18.8q-13.4 13.8-27.2 27.2c-5.5 5.4-13.4 5.3-19-0.2q-13.5-13.1-26.6-26.5c-5.7-5.9-5.7-14-0.4-19.5 5.4-5.5 13.8-5.5 19.8 0 0.9 0.8 1.4 2 3 2.1v-234.2c-1.7-0.1-2.3 1.4-3.2 2.2-6.2 5.3-14 5.2-19.4-0.3-5.5-5.5-5.6-13.4 0.1-19.3 8.8-9 17.7-17.8 26.6-26.6 1.4-1.3 3.1-2.3 4.7-3.3 2.9-0.2 6.2-0.4 9-0.5z"/><path d="m168.8 240.7v-88.5q-0.1-11.4-3.2-18.3-3.2-7-14.5-7h-5.1v-5h22.8q9.6 0 14.5 2.6 4.9 2.7 6.9 7.5h1.3q4.8-4.8 13.1-8.7 8.4-4 19.8-4 6.5 0 12.2 1.6 5.7 1.5 10.4 5.3 4.7 3.8 7.7 10.8 6.6-8.6 16.9-13.1 10.4-4.6 21-4.6 9.6 0 17.6 3.8 7.9 3.8 12.9 13.6 4.9 9.7 4.9 28.1v75.9h-22.7v-75.9q0-18.9-5.4-26.5-5.3-7.6-14.9-7.6-7.3 0-15.1 5.3-7.9 5.3-11.4 11.1 1 2.8 1.1 8.4 0.2 5.5 0.2 9.3v75.9h-22.8v-75.9q0-18.9-5.3-26.5-5.3-7.6-14.9-7.6-7.6 0-14.1 4.1-6.4 4-11.2 9.3v96.6z"/><text style="transform:matrix(1,0,0,1,310.105,114.347)"><tspan x="0" y="0" class="a">2
</tspan></text></svg>
                                                   </span>                                                   {{$project->size}}
                                                   </span>
                                                @else
                                                    <span style="width: 40%;"><svg style="position: relative;top: 10px;" 0 version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 30" width="30" height="30"><style>.a{fill: #000 !important;}</style><path  fill-rule="evenodd" class="a" d="m0.4 0.8c0.4-0.7 1-0.9 2-0.7 1.4 0.3 2.1 1.3 2.2 2.9q0.2-0.1 0.3-0.2c1.6-0.7 3.4 0 3.9 1.6q0.2 0.8 0.4 1.6c0.1 0.4-0.1 0.7-0.4 0.7-0.3 0.1-0.6 0-0.7-0.4q-0.2-0.7-0.4-1.4c-0.2-0.9-1.1-1.4-1.9-1.2-0.9 0.3-1.4 1.1-1.1 2q0.5 2 1.1 4.1c0.2 0.8 1 1.3 1.8 1.1 0.9-0.2 1.4-1 1.3-1.8q-0.2-0.7 0.4-0.8 0.5-0.2 0.7 0.5c0.1 0.6 0 1.1-0.4 2.1q0.2 0 0.4 0 8 0 16.1 0 0.2 0 0.4 0.1 0.5 0.1 0.4 0.6 0 0.4-0.4 0.5-0.2 0-0.5 0-4.8 0-9.6 0c-1.1 0-1.7 0.5-1.7 1.7q0 1.7 0 3.4c0 0.3 0.1 0.4 0.4 0.4q10 0 19.9 0 0.2 0 0.3 0 0-0.5 0-1 0-1.5 0-2.9c0-1-0.6-1.6-1.5-1.6q-2.2 0-4.4 0c-0.2 0-0.4 0-0.4 0-0.2-0.2-0.5-0.4-0.5-0.5 0-0.2 0.2-0.4 0.4-0.6 0-0.1 0.3-0.1 0.4-0.1q2.2 0 4.4 0c1.7 0 2.8 1.1 2.8 2.8 0 0.4 0 0.7 0 1.1 0.6-0.4 1.3-0.5 2-0.5 0.7 0 1 0.4 1 1.1q0 6.6 0 13.2c0 0.7-0.3 1.1-1 1.1q-1.1 0-2.1 0c-0.7 0-1.1-0.4-1.1-1.1q0-2.3 0-4.7 0-0.2 0-0.5-0.2 0-0.5 0-13.2 0-26.5 0-0.2 0.1-0.5 0-0.4-0.1-0.4-0.5c-0.1-0.3 0.1-0.5 0.4-0.6q0.2 0 0.5 0 13.2 0 26.4 0 0.3 0 0.6 0 0-1.8 0-3.5-15.3 0-30.7 0 0 1.7 0 3.5c0.5 0.1 1.2-0.2 1.2 0.6 0 0.7-0.7 0.5-1.2 0.6q0 0.2 0 0.4 0 2.3 0 4.6c0 0.8-0.4 1.2-1.2 1.2-0.6 0-1.2 0-1.8 0-0.5 0-1-0.2-1.2-0.7q0-14.1 0-28.2zm1.2 0.5q0 13.6 0 27.2 0.9 0 1.8 0 0-0.2 0-0.3 0-12.7 0-25.3c0-1.1-0.7-1.8-1.8-1.6zm3 16.3c2 0 3.9 0 5.9 0q0-1.4 0-2.7c0.1-0.9-0.1-1.9 0.5-2.8-1.8 0-3.4 0-5.1 0-0.7 0-1.3 0.6-1.3 1.3 0 1.4 0 2.8 0 4.2zm33.8 10.9q0-6.5 0-13c-1.1-0.2-1.9 0.5-1.9 1.6q0 5.6 0 11.1 0 0.2 0 0.3 0.9 0 1.9 0zm-24.8-10.9c0-0.7-0.1-1.4 0-2.1 0-1.2-0.3-2.3 0.4-3.4-0.3 0-0.6 0-0.8 0-0.9 0-1.5 0.6-1.5 1.5q0 1.9 0 3.7 0 0.1 0 0.3c0.6 0 1.2 0 1.9 0zm-8.5-6.5q-0.2-0.5-0.5-1 0 0.6 0 1.3 0.3-0.2 0.5-0.3z"/></svg>
                                                    {{$project->room}}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="box3">
                                                <span  style="width: 50%;position: relative;"><svg style="position: relative;top: 5px;left:-2px;" version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 39" width="30" height="30"><style>.a{fill:#000 !important}</style><path fill-rule="evenodd" class="a" d="m2.9 38.4c-1.1-0.3-1.9-0.8-2.3-1.8q-0.4-0.6-0.4-1.3 0-10 0-19.9 0.1-1.1 0.7-2 2.7-3.3 5.4-6.7c0.8-1 1.8-1.6 3-1.9 0.3 0 0.4-0.1 0.4-0.4q0-1.5 0-3c0-0.4 0.3-0.7 0.7-0.8 0.4 0 0.8 0.2 0.9 0.6q0.1 0.2 0.1 0.4 0 1.4 0 2.8c0 0.3 0 0.4 0.3 0.4 1.4 0.3 2.5 1.1 3.3 2.2q2.5 3.1 5 6.2 0.8 1.1 0.8 2.4c0 6.4 0 12.8 0 19.1 0 2-1.1 3.3-2.6 3.7q-7.7 0-15.3 0zm-1-13.1c0 3.3 0 6.5 0 9.7 0 1.1 0.8 1.8 1.8 1.8q6.8 0 13.7 0 1.7 0 1.8-1.8 0-9.7 0-19.4c0-0.5-0.2-0.9-0.5-1.4q-2.6-3.1-5.1-6.3-0.7-1-1.8-1.3c-0.4-0.2-0.4-0.1-0.4 0.3q0 1.8 0 3.7c0 0.3 0 0.4 0.3 0.5 2 0.6 3.1 2.6 2.6 4.6-0.5 2.1-2.4 3.3-4.5 3-2-0.4-3.5-2.4-3.1-4.4q0.3-2.4 2.6-3.2c0.3-0.1 0.4-0.2 0.4-0.5q0-1.9 0-3.7c0-0.4 0-0.5-0.4-0.3q-1.1 0.3-1.9 1.3-2.5 3.2-5 6.3c-0.4 0.5-0.5 0.9-0.5 1.5q0 4.8 0 9.6zm10.9-10.5c0-1.2-1-2.3-2.3-2.3-1.2 0-2.2 1.1-2.2 2.3 0 1.2 1 2.3 2.2 2.3 1.3-0.1 2.3-1.1 2.3-2.3z"/><path class="a" d="m13.2 26.3c0 0.6-0.3 1-0.8 1-0.4 0.1-0.8-0.3-0.9-0.8 0-0.6-0.4-1-0.9-1-0.6 0-1.1 0.4-1.1 1 0 0.6 0.4 1 1.1 1q1.2 0.1 2 1.1c1.1 1.3 0.6 3.3-0.9 4-0.3 0.1-0.3 0.3-0.4 0.5 0 0.5-0.3 0.8-0.8 0.8-0.4 0-0.8-0.3-0.8-0.8 0-0.3-0.1-0.4-0.4-0.5q-1.3-0.7-1.4-2.1c-0.1-0.6 0.2-1.1 0.7-1.1 0.5-0.1 0.8 0.3 0.9 0.9 0.1 0.5 0.5 0.9 1.1 0.9 0.5 0 0.9-0.4 0.9-1 0-0.5-0.4-1-1-1-1.3-0.1-2.3-0.9-2.6-2.2-0.2-1.2 0.3-2.3 1.6-2.9 0.1-0.1 0.2-0.2 0.2-0.4 0-0.6 0.4-0.9 0.9-0.9 0.4 0 0.7 0.4 0.8 0.9 0 0.2 0.1 0.3 0.3 0.4 0.9 0.5 1.4 1.3 1.5 2.2z"/></svg>
                                                {{$project->price}} SR</span>
                                                <span style="width: 40%;"><i class="fa-solid fa-location-dot"></i> {{$project->town}}</span>
                                            </div>
                                            
                                    </div>
                                    
                                </div>
                        @endforeach
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

@section('script')

        <script>
    let carousel = document.querySelector(".carousel-in")
    fetch("api/sliders")
    .then(res => res.json())
    .then(data => {
        
        data.project.forEach(data => {
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
    let range = document.querySelectorAll(".range-slider input")
    let valu = document.querySelector(".rangeValues")
    valu.innerHTML=  `${range[0].value} SR`
    range.forEach(ele => {
        ele.onchange = e => {
            valu.innerText=  `${e.target.value} SR`
        }
        ele.oninput = e => {
            valu.innerText=  `${e.target.value} SR`
        }
    })
    
    
    
    
    
</script>

<script>

// Utils
function get(selector, root = document) {
  return root.querySelector(selector);
}

function formatDate(date) {
  const h = "0" + date.getHours();
  const m = "0" + date.getMinutes();

  return `${h.slice(-2)}:${m.slice(-2)}`;
}

function random(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}
// function getVals(){
//   // Get slider values
//   let parent = this.parentNode;
//   let slides = parent.getElementsByTagName("input");
//     let slide1 = parseFloat( slides[0].value );
//     let slide2 = parseFloat( slides[1].value );
//   // Neither slider will clip the other, so make sure we determine which is larger
//   if( slide1 > slide2 ){ let tmp = slide2; slide2 = slide1; slide1 = tmp; }

//   let displayElement = parent.getElementsByClassName("rangeValues")[0];
//       displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
// }

window.onload = function(){
  // Initialize Sliders
  let sliderSections = document.getElementsByClassName("range-slider");
      for( let x = 0; x < sliderSections.length; x++ ){
        let sliders = sliderSections[x].getElementsByTagName("input");
        for( let y = 0; y < sliders.length; y++ ){
          if( sliders[y].type ==="range" ){
            sliders[y].oninput = getVals;
            // Manually trigger event first time to display values
            sliders[y].oninput();
          }
        }
      }
}</script>
@endsection
