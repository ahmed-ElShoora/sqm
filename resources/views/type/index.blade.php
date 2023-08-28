@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة انواع المشاريع</h1>
                        <div class="top-right-button-container">
                            @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                                <a href="{{Route('create.type')}}" class="btn btn-primary btn-lg top-right-button mr-1">انشاء نوع</a>
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
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                    <th scope="col" class="text-center">تعديل</th>
                                @endif
                                @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                    <th scope="col" class="text-center">حذف</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($types as $type)
                                <tr>
                                    <td class="text-center">{{$type->name}}</td>
                                    @if($type->name == 'ارض' OR $type->name == 'مكتب' OR $type->name == 'office' OR $type->name == 'space' OR $type->name == 'معرض تجاري' OR $type->name == 'مستودع' OR $type->name == 'Store' OR $type->name == 'werehouse')
                                    @else
                                        @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                            <td class="text-center"><a href="edite-{{$type->id}}-type" class="btn btn-outline-info" role="button">تعديل</a></td>
                                        @endif
                                        @if(App\Models\Permutation::canDelete(Auth()->user()->permition)->first()->canDelete == 1)
                                            <td class="text-center">
                                                    <form method="post" action="{{Route('delete.type')}}">
                                                        @csrf
                                                        <input type="text" name="id" hidden value="{{$type->id}}">
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            حذف
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
