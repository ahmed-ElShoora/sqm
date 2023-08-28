@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة الاعلانات</h1>
                        <div class="top-right-button-container">
                            @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                                <a href="{{Route('create.ad')}}" class="btn btn-primary btn-lg top-right-button mr-1">انشاء اعلان</a>
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
                                <th scope="col" class="text-center">الصورة</th>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                <th scope="col" class="text-center">تعديل</th>
                                @endif
                                @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                <th scope="col" class="text-center">حذف</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ads as $ad)
                                <tr>
                                    <td class="text-center"> <img src="{{ asset('images/ads/'.$ad->image) }}" style="width:40px"/></td>
                                        <td class="text-center"><a href="ads-{{$ad->id}}-edit" class="btn btn-outline-info" role="button">تعديل</a></td>
                                    @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                        @if($ad->isDeleted == 0)
                                            <td class="text-center">
                                                <form method="post" action="{{Route('del.re.ad')}}">
                                                @csrf
                                                    <input hidden type="text" value="{{$ad->id}}" name="id">
                                                    <input hidden type="text" value="{{$ad->isDeleted}}" name="isdeleted">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    حذف
                                                </button>
                                                </form>
                                            </td>
                                        @else
                                        <td class="text-center">
                                            <form method="post" action="{{Route('del.re.ad')}}">
                                                @csrf
                                                <input hidden type="text" value="{{$ad->id}}" name="id">
                                                <input hidden type="text" value="{{$ad->isDeleted}}" name="isdeleted">
                                                <button type="submit" class="btn btn-sm btn-outline-success">
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



        </div>
    </main>
@endsection
