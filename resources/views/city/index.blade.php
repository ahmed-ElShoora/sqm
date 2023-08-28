@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة المدن</h1>
                        <div class="top-right-button-container">
                            @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                                <a href="{{Route('create.city')}}" class="btn btn-primary btn-lg top-right-button mr-1">انشاء مدينة</a>
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
                                <th scope="col" class="text-center">الاسم</th>
                                @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                    <th scope="col" class="text-center">حذف</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($citys as $city)
                                <tr>
                                    <td class="text-center"> <p>{{$city->name_ar}}</p></td>
                                    <td class="text-center"><a href="delete-{{$city->id}}-city" class="btn btn-outline-danger" role="button">حذف</a></td>
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
