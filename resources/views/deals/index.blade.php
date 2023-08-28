@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة الصفقات</h1>
                        <div class="top-right-button-container">
                            @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                                <a href="{{Route('create.deal')}}" class="btn btn-primary btn-lg top-right-button mr-1">انشاء صفقة</a>
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
                                <th scope="col" class="text-center">اسم العميل</th>
                                <th scope="col" class="text-center">البريد الاكتروني</th>
                                <th scope="col" class="text-center">الجوال</th>
                                <th scope="col" class="text-center">عنوان المشروع</th>
                                <th scope="col" class="text-center">سعر المشروع</th>
                                <th scope="col" class="text-center">المستخدم المسئول</th>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                    <th scope="col" class="text-center">تعديل</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deals as $deal)
                                <tr>
                                    <td class="text-center">{{$deal->dealClientName}}</td>
                                    <td class="text-center">{{$deal->dealClientEmail}}</td>
                                    <td class="text-center">{{$deal->dealClientPhone}}</td>
                                    <td class="text-center">{{$deal->offerTitle}}</td>
                                    <td class="text-center">{{$deal->offerPrice}}</td>
                                    <td class="text-center">{{$deal->userName}}</td>
                                    @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                        <td class="text-center"><a href="deals-{{$deal->dealID}}-edit" class="btn btn-outline-info" role="button">تعديل</a></td>
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
