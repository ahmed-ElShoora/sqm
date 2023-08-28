@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="d-flex justify-content-between">
            <div class="mb-2">
                    <h1>{{ $offer->title_ar }}</h1>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                <a href="offers-{{ $offer->id }}-edit">تعديل</a>
                                @endif
                            </li>
                            <li class="breadcrumb-item">
                                <a href="offers">المشاريع</a>
                            </li>
                        </ol>
                    
                    </nav>
                </div>


            </div>


                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-xl-12 col-left">
                <div class="card mb-4">
                    <div class="card-body">

                        <div class="glide details">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    @foreach ($images as $image)
                                    <li class="glide__slide">
                                        <img alt="detail" src="{{ asset($image->image) }}" class="responsive border-0 border-radius img-fluid mb-3" style="object-fit: cover; height: 50vh" />
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="glide thumbs">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    @foreach ($images as $image)
                                    <li class="glide__slide">
                                        <img alt="thumb" src="{{ asset($image->image) }}" class="responsive border-0 border-radius img-fluid" style="" />
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="glide__arrows" data-glide-el="controls">
                                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="simple-icon-arrow-left"></i></button>
                                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="simple-icon-arrow-right"></i></button>
                            </div>
                        </div>

                    </div>
                    <div style="display: flex;flex-direction: row;align-items: center;justify-content: flex-end;margin: 20px;">
                        <p class="text-muted mb-1 " style="font-size: 16px;font-weight: bold;">Views : {{ $offer->views }}</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs " role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">البائع</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">التفاصيل</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="false">مواصفات المشروع</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="third-tab" data-toggle="tab" href="#forth" role="tab" aria-controls="third" aria-selected="false">خدمات المشروع</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="forth-tab" data-toggle="tab" href="#fifth" role="tab" aria-controls="forth" aria-selected="false">الوصف</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">

                                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                    <a href="#">
                                        <img src="{{ asset($offer->seller_image) }}" alt="Mimi Carreira" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                    </a>
                                    <div class="pl-3 flex-grow-1">
                                        <p class="font-weight-medium mb-1">{{ $offer->seller_name }}</p>
                                        <p class="text-muted mb-1 text-small">{{ $offer->seller_phone }}</p>
                                        <p class="text-muted mb-1 text-small">{{ $offer->seller_email }}</p>
                                        <p class="text-muted mb-1 text-small">{{ $offer->seller_domain }}</p>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                    <p class="font-weight-bold">صورة رئيسية للمشروع</p>
                                    <div class="pl-3 flex-grow-1">
                                        <img src="{{ asset($offer->thumbnail) }}" alt="Mimi Carreira" class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                    </div>

                                </div>
                                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                    <p class="font-weight-bold">العنوان</p>
                                    <div class="pl-3 flex-grow-1">
                                        <p>
                                            {{ $offer->title_ar }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                    <p class="font-weight-bold">الوصف</p>
                                    <div class="pl-3 flex-grow-1">
                                        <p>
                                            {{ $offer->description_ar }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                    <p class="font-weight-bold">السعر</p>
                                    <div class="pl-3 flex-grow-1">
                                        <p>
                                            {{ $offer->price }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                    <p class="font-weight-bold">المدينة</p>
                                    <div class="pl-3 flex-grow-1">
                                        <p>
                                            {{ $offer->city_ar }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                    <p class="font-weight-bold">الحي</p>
                                    <div class="pl-3 flex-grow-1">

                                        <p>
                                            {{ $offer->town_ar }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                    <p class="font-weight-bold">عدد الغرف</p>
                                    <div class="pl-3 flex-grow-1">
                                        <p>
                                            {{ $offer->room }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                    <p class="font-weight-bold">عدد الحمامات</p>
                                    <div class="pl-3 flex-grow-1">
                                        <p>
                                            {{ $offer->bathroom }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                    <p class="font-weight-bold">الحالة</p>
                                    <div class="pl-3 flex-grow-1">
                                        <p>
                                            {{ $offer->offerStatus }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                    <p class="font-weight-bold">نوع الايجار</p>
                                    <div class="pl-3 flex-grow-1">
                                        <p>
                                            {{ $offer->rentType }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                    <p class="font-weight-bold">هل هو جديد</p>
                                    <div class="pl-3 flex-grow-1">
                                        <p>
                                            @if($offer->isNew == '1')
                                                <img src="https://img.icons8.com/ios-filled/24/26e07f/active-state.png" />
                                            @else
                                                <img src="https://img.icons8.com/ios-filled/24/fa314a/active-state.png" />
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                    <p class="font-weight-bold">هل تم حذفة</p>
                                    <div class="pl-3 flex-grow-1">
                                        <p>
                                            @if($offer->isDeleted == '1')
                                            <img src="https://img.icons8.com/ios-filled/24/26e07f/active-state.png" />
                                            @else
                                            <img src="https://img.icons8.com/ios-filled/24/fa314a/active-state.png" />
                                            @endif
                                        </p>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
                                <p class="font-weight-bold">مواصفات المشروع</p>
                                @foreach(explode(',',$offer->facilities) as $row)
                                <li>{{ $row }}</li>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="forth" role="tabpanel" aria-labelledby="third-tab">
                                <p class="font-weight-bold">خدمات المشروع</p>
                                @foreach(explode(',',$offer->services) as $row)
                                <li>{{ $row }}</li>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="fifth" role="tabpanel" aria-labelledby="forth-tab">
                                <p class="font-weight-bold">الوصف</p>
                                <p>
                                    {{ $offer->description_ar }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">



                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
