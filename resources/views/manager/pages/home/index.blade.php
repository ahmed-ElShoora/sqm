@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>الرئيسية</h1>
                    <div class="row">
                        @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                        <a href="{{Route('HomePageController.createSlide')}}" class="btn btn-primary btn-lg top-right-button mr-5">اضافة سلايدر</a>

                        <a href="{{Route('HomePageController.createPartner')}}" class="btn btn-primary btn-lg top-right-button mr-5">اضافة شركاء</a>
                        @endif
                    </div>
                </div>

                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 mb-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        سلايدر
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">الصورة</th>
                                <th scope="col" class="text-center">الوصف</th>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                <th scope="col" class="text-center">تعديل</th>
                                @endif
                                @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                <th scope="col" class="text-center">حذف</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slides as $slide)
                            <tr>
                                <td class="text-center"> <img alt="detail" src="{{ asset($slide->image) }}" class="responsive border-0 border-radius img-fluid mb-3" style="width: 40px" />
                                </td>
                                <td class="text-center">{{$slide->description_ar}}</td>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                <td class="text-center"><a href="pages-home-slide-{{$slide->id}}-edit" class="btn btn-outline-info" role="button">تعديل</a></td>
                                @endif
                                @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                @if($slide->isDeleted == 0)
                                <td class="text-center">
                                    <form method="post" action="{{Route('HomePageController.deleteSlide',$slide->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        حذف
                                    </button>
                                    </form>
                                </td>
                                @endif
                                @if($slide->isDeleted == 1)
                                <td class="text-center">
                                    <form method="post" action="{{Route('HomePageController.restoreSlide',$slide->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-primary">
                                        استرجاع
                                    </button>
                                    </form>
                                </td>
                                @endif
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-lg-12 col-md-12 mb-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        الشركاء
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">الشعار</th>
                                <th scope="col" class="text-center">تعديل</th>
                                <th scope="col" class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partners as $partner)
                            <tr>
                                <td class="text-center"> <img alt="detail" src="{{ asset($partner->logo) }}" class="responsive border-0 border-radius img-fluid mb-3" style="width: 40px" />
                                </td>
                                <td class="text-center"><a href="pages-home-partner-{{$partner->id}}-edit" class="btn btn-outline-info" role="button">تعديل</a></td>
                                @if($partner->isDeleted == 0)
                                <td class="text-center">
                                    <form method="post" action="{{Route('HomePageController.deletePartner',$partner->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        حذف
                                    </button>
                                    </form>
                                </td>
                                @endif
                                @if($partner->isDeleted == 1)
                                <td class="text-center">
                                    <form method="post" action="{{Route('HomePageController.restorePartner',$partner->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-primary">
                                        استرجاع
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
