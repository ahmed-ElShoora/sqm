@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>سكشن افضل العقارات</h1>
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
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                    <th scope="col" class="text-center">تعديل</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">{{$best->title_ar}}</td>
                                <td class="text-center">{{$best->desc_ar}}</td>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                    <td class="text-center"><a href="houses-edit" class="btn btn-outline-info" role="button">تعديل</a></td>
                                @endif
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </main>
@endsection
