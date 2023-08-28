@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة الرسائل</h1>
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
                                <th scope="col" class="text-center">الجوال</th>
                                <th scope="col" class="text-center">الرسالة</th>
                                <th scope="col" class="text-center">الحالة</th>
                                @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                <th scope="col" class="text-center">العملية</th>
                                @endif
                                <th scope="col" class="text-center">قيد التنفيذ بواسطة</th>
                                <th scope="col" class="text-center">تم الاغلاق بواسطة</th>
                                <th scope="col" class="text-center">تاريخ الانشاء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($inboxes as $inbox)
                                <tr>
                                    <td class="text-center">{{$inbox->name}}</td>
                                    <td class="text-center">{{$inbox->email}}</td>
                                    <td class="text-center">{{$inbox->phone}}</td>
                                    <td class="text-center">{{$inbox->message}}</td>
                                    <td class="text-center">
                                        @if($inbox->inProgress == 1 && $inbox->isDone == 1)
                                            تم الاغلاق
                                        @elseif($inbox->inProgress == 1 && $inbox->isDone == 0)
                                            قيد التنفيذ
                                        @elseif($inbox->inProgress == 0&& $inbox->isDone == 0)
                                            مفتوح
                                        @endif
                                    </td>
                                    @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                                    <td class="text-center">
                                        @if($inbox->inProgress == 1 && $inbox->isDone == 1)

                                        @elseif($inbox->inProgress == 1 && $inbox->isDone == 0)
                                            <form method="post" action="{{Route('InboxController.makeDone', $inbox->id)}}">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                                    اغلاق
                                                </button>
                                            </form>
                                        @elseif($inbox->inProgress == 0&& $inbox->isDone == 0)
                                            <form method="post" action="{{URL('inboxes-'.$inbox->id)}}">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                                    تنفيذ
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                    @endif
                                    <td class="text-center">
                                        @if($inbox->inProgress == 1 && $inbox->isDone == 1)

                                        @elseif($inbox->inProgress == 1 && $inbox->isDone == 0)
                                            {{$inbox->userName}}
                                        @elseif($inbox->inProgress == 0&& $inbox->isDone == 0)

                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($inbox->inProgress == 1 && $inbox->isDone == 1)
                                            {{$inbox->userName}}
                                        @elseif($inbox->inProgress == 1 && $inbox->isDone == 0)

                                        @elseif($inbox->inProgress == 0&& $inbox->isDone == 0)

                                        @endif
                                    </td>
                                    <td class="text-center">{{$inbox->inboxCreatedAt}}</td>
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
