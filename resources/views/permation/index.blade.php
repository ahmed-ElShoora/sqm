@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة المجموعات</h1>
                            <div class="top-right-button-container">
                                @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                                <a href="{{Route('create.permeation')}}" class="btn btn-primary btn-lg top-right-button mr-1">انشاء مجموع</a>
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
                                <th scope="col" class="text-center">امكانية الاضافة</th>
                                <th scope="col" class="text-center">امكانية التعديل</th>
                                <th scope="col" class="text-center">امكانية الحذف</th>
                                <th scope="col" class="text-center">قراءة الرساءل</th>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                    <th scope="col" class="text-center">تعديل</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <td class="text-center">{{$group->title}}</td>
                                    @if($group->canCreate == 1)
                                        <td class="text-center"><img src="https://img.icons8.com/ios-filled/24/26e07f/active-state.png" /></td>
                                    @else
                                        <td class="text-center"><img src="https://img.icons8.com/ios-filled/24/fa314a/active-state.png" /></td>
                                    @endif
                                    @if($group->canEdit == 1)
                                        <td class="text-center"><img src="https://img.icons8.com/ios-filled/24/26e07f/active-state.png" /></td>
                                    @else
                                        <td class="text-center"><img src="https://img.icons8.com/ios-filled/24/fa314a/active-state.png" /></td>
                                    @endif
                                    @if($group->canDelete == 1)
                                        <td class="text-center"><img src="https://img.icons8.com/ios-filled/24/26e07f/active-state.png" /></td>
                                    @else
                                        <td class="text-center"><img src="https://img.icons8.com/ios-filled/24/fa314a/active-state.png" /></td>
                                    @endif
                                    @if($group->seeMessages == 1)
                                        <td class="text-center"><img src="https://img.icons8.com/ios-filled/24/26e07f/active-state.png" /></td>
                                    @else
                                        <td class="text-center"><img src="https://img.icons8.com/ios-filled/24/fa314a/active-state.png" /></td>
                                    @endif
                                    @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                        <td class="text-center"><a href="edit-{{$group->id}}-permeation" class="btn btn-outline-info" role="button">تعديل</a></td>
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
