@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة الاعدادات</h1>
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
                                <th scope="col" class="text-center">رقم الواتس اب</th>
                                <th scope="col" class="text-center">الشعار</th>
                                <th scope="col" class="text-center">فاف ايكون</th>
                                <th scope="col" class="text-center">وصف الفوتر</th>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                    <th scope="col" class="text-center">تعديل</th>
                                @endif

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($settings as $setting)
                            <tr>
                                <td class="text-center">{{$setting->title}}</td>
                                <td class="text-center">{{$setting->whats_app_phone}}</td>
                                <td class="text-center"><img alt="detail" src="{{ asset('images/logos/'.$setting->logo) }}" class="responsive border-0 border-radius img-fluid mb-3" style="width: 40px" /></td>
                                <td class="text-center"><img alt="detail" src="{{ asset('images/fav_icon/'.$setting->fav_icon) }}" class="responsive border-0 border-radius img-fluid mb-3" style="width: 40px" /></td>
                                <td class="text-center">{{$setting->footer_description_ar}}</td>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                    <td class="text-center"><a href="settings-edit" class="btn btn-outline-info" role="button">تعديل</a></td>
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
