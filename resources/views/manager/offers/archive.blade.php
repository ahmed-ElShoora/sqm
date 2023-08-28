@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>قائمة العروض المحذوفة</h1>


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
                                @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                <th scope="col" class="text-center">استعادة</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($offers as $offer)
                            <tr>
                                <td class="text-center">{{$offer->title_ar}}</td>
                                <td class="text-center">{{$offer->description_ar}}</td>
                                <td class="text-center">{{$offer->price}}</td>
                                <td class="text-center">{{$offer->city_ar}}</td>
                                <td class="text-center">{{$offer->town_ar}}</td>
                                <td class="text-center">
                                    @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                    <a href="{{Route('OfferController.restore', $offer->id)}}" class="btn btn-sm btn-outline-primary">
                                        استرجاع
                                    </a>
                                    @endif
                                </td>
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
