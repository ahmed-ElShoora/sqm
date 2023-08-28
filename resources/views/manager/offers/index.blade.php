@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة المشاريع</h1>
                            <div class="top-right-button-container">
                                @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                                    <a href="{{Route('create.offer')}}" class="btn btn-primary btn-lg top-right-button mr-1">انشاء مشروع</a>
                                @endif
                            </div>

                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">العنوان</th>
                                <th scope="col" class="text-center">الوصف</th>
                                <th scope="col" class="text-center">السعر</th>
                                <th scope="col" class="text-center">المدينة</th>
                                <th scope="col" class="text-center">الحي</th>
                                <th scope="col" class="text-center">نوع الايجار</th>
                                <th scope="col" class="text-center">عرض</th>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                    <th scope="col" class="text-center">تعديل</th>
                                @endif

                                    <th scope="col" class="text-center">متاح</th>

                                    <th scope="col" class="text-center">موجر</th>

                                    <th scope="col" class="text-center">مباع</th>
                                @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                    <th scope="col" class="text-center">حذف</th>
                                @endif

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($offers as $offer)
                                <tr>
                                    <td class="text-center">{{$offer->title}}</td>
                                    <td class="text-center">{{$offer->description_ar}}</td>
                                    <td class="text-center">{{$offer->price}}</td>
                                    <td class="text-center">{{$offer->city_ar}}</td>
                                    <td class="text-center">{{$offer->town_ar}}</td>
                                    <td class="text-center">{{$offer->offerRentType}}</td>
                                    <td class="text-center"><a href="offers-{{$offer->id}}-show" class="btn btn-outline-primary" role="button">عرض</a></td>
                                    @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                        <td class="text-center"><a href="offers-{{$offer->id}}-edit" class="btn btn-outline-info" role="button">تعديل</a></td>
                                    @endif
                                    @if($offer->offerOfferStatus == 'available' && $offer->offerRentType != 'Sale')
                                        <td></td>
                                        <td class="text-center">
                                            <a href="{{Route('OfferController.makeRented', $offer->id)}}" class="btn btn-sm btn-outline-primary">
                                                موجر
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{Route('OfferController.makeSoldOut', $offer->id)}}" class="btn btn-sm btn-outline-primary">
                                                مباع
                                            </a>
                                        </td>
                                    @endif



                                     @if($offer->offerOfferStatus == 'available' && $offer->offerRentType == 'Sale')
                                         <td></td>
                                         <td></td>
                                         <td class="text-center">
                                             <a href="{{Route('OfferController.makeSoldOut', $offer->id)}}" class="btn btn-sm btn-outline-primary">
                                                 مباع
                                             </a>
                                         </td>
                                     @endif

                                     @if($offer->offerOfferStatus == 'rented')
                                         <td class="text-center">

                                             <a href="{{Route('OfferController.makeAvailable', $offer->id)}}" class="btn btn-sm btn-outline-primary">
                                                 متاح
                                             </a>
                                         </td>
                                         <td></td>
                                         <td class="text-center">

                                             <a href="{{Route('OfferController.makeSoldOut', $offer->id)}}" class="btn btn-sm btn-outline-primary">
                                                 مباع
                                             </a>
                                         </td>
                                     @endif

                                     @if($offer->offerOfferStatus == 'soldout' && $offer->offerRentType != 'Sale')
                                         <td class="text-center">

                                             <a href="{{Route('OfferController.makeAvailable', $offer->id)}}" class="btn btn-sm btn-outline-primary">
                                                 متاح
                                             </a>
                                         </td>
                                         <td class="text-center">

                                             <a href="{{Route('OfferController.makeRented', $offer->id)}}" class="btn btn-sm btn-outline-primary">
                                                 موجر
                                             </a>
                                         </td>
                                         <td></td>
                                     @endif

                                     @if($offer->offerOfferStatus == 'soldout' && $offer->offerRentType == 'Sale')
                                         <td class="text-center">

                                             <a href="{{Route('OfferController.makeAvailable', $offer->id)}}" class="btn btn-sm btn-outline-primary">
                                                 متاح
                                             </a>

                                         </td>
                                         <td></td>
                                         <td></td>
                                     @endif
                                    @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                        <td class="text-center">

                                            <form method="post" action="{{Route('OfferController.isDeleted', $offer->id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                حذف
                                            </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </main>
@endsection
