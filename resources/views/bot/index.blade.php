@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة روبوت الدردشة</h1>
                        <div class="top-right-button-container">
                            @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                                <a href="{{Route('create.bot')}}" class="btn btn-primary btn-lg top-right-button mr-1">انشاء روبوت</a>
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
                                <th scope="col" class="text-center">السوال</th>
                                <th scope="col" class="text-center">الاجابة</th>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                    <th scope="col" class="text-center">تعديل</th>
                                @endif
                                @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                    <th scope="col" class="text-center">حذف</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bots as $bot)
                                <tr>
                                    <td class="text-center">{{$bot->question}}</td>
                                    <td class="text-center">{{$bot->answer}}</td>
                                    @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                        <td class="text-center"><a href="bots-{{$bot->id}}-edit" class="btn btn-outline-info" role="button">تعديل</a></td>
                                    @endif
                                    @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                        @if($bot->isDeleted == 0)
                                        <td class="text-center">
                                            <form method="post" action="{{Route('delete.bot.form')}}">
                                                @csrf
                                                <input hidden type="text" value="{{$bot->id}}" name="id">
                                                <input hidden type="text" value="{{$bot->isDeleted}}" name="isdeleted">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    حذف
                                                </button>
                                            </form>
                                        </td>
                                    @else
                                        <td class="text-center">
                                            <form method="post" action="{{Route('delete.bot.form')}}">
                                                @csrf
                                                <input hidden type="text" value="{{$bot->id}}" name="id">
                                                <input hidden type="text" value="{{$bot->isDeleted}}" name="isdeleted">
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
