@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة المستخدمين</h1>
                        <div class="top-right-button-container">
                            @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                                <form method="get" action="{{Route('create.user')}}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-lg top-right-button mr-1">انشاء مستخدم</button>
                                </form>
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
                                <th scope="col" class="text-center">البريد الاكتروني</th>
                                <th scope="col" class="text-center">المجموعة</th>
                                <th scope="col" class="text-center">نشط</th>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                <th scope="col" class="text-center">تعديل</th>
                                @endif
                                    @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                <th scope="col" class="text-center">حذف</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->email}}</td>
                                    <td class="text-center">{{App\Models\Permutation::getTitle($user->permition)->first()->title}}</td>
                                        @if($user->userStatus == 1)
                                            <td class="text-center"><img src="https://img.icons8.com/ios-filled/24/26e07f/active-state.png" /></td>
                                        @else
                                            <td class="text-center"><img src="https://img.icons8.com/ios-filled/24/fa314a/active-state.png" /></td>
                                        @endif
                                    @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                    <td class="text-center">
                                        <form method="post" action="{{url('/edite-user')}}">
                                            @csrf
                                            <input type="text" name="id" value="{{$user->id}}" hidden>
                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                تعديل
                                            </button>
                                        </form>
                                    </td>
                                    @endif
                                        @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                    <td class="text-center">
                                                <form method="post" action="{{url('/delete-user/'.$user->id)}}">
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
