@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>المشاريع</h1>
                    <div class="row">
                        @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                        <a href="{{Route('ProjectPageController.create')}}" class="btn btn-primary btn-lg top-right-button mr-5">اضافة سلايدر</a>
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
                                <td class="text-center"><a href="pages-projects-slide-{{$slide->id}}-edit" class="btn btn-outline-info" role="button">تعديل</a></td>
                                @endif
                                @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                    @if($slide->isDeleted == 0)
                                    <td class="text-center">
                                        <form method="post" action="{{Route('ProjectPageController.delete',$slide->id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            حذف
                                        </button>
                                        </form>
                                    </td>
                                    @endif
                                    @if($slide->isDeleted == 1)
                                    <td class="text-center">
                                        <form method="post" action="{{Route('ProjectPageController.restore',$slide->id)}}">
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
    </div>
</main>
@endsection
