@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <h1>من نحن</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">الوصف</th>
                                <th scope="col" class="text-center">الروية</th>
                                <th scope="col" class="text-center">الرسالة</th>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                <th scope="col" class="text-center">تعديل</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">{{$about->description_ar}}</td>
                                <td class="text-center">{{$about->vision_ar}}</td>
                                <td class="text-center">{{$about->mission_ar}}</td>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                <td class="text-center"><a href="pages-about-{{$about->id}}-edit" class="btn btn-outline-info" role="button">تعديل</a></td>
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
