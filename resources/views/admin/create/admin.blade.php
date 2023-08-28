@extends('layouts.admin')


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <h5 class="mb-4">انشاء مستخدم جديد</h5>


                    <div class="card mb-4">
                        <div class="card-body">

                            @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                        <form method="post" action="{{Route('create.user.req')}}">
                            @csrf
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الاسم</label>
                                    <input name="name" required="" id="Name" type="text" class="form-control">
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            <div class="tooltip-center-top position-relative form-group">
                                <label>البريد الاكتروني</label>
                                <input name="email" required="" id="email" type="email" class="form-control">
                                <div class="invalid-tooltip">E-mail</div>
                            </div>
                            <div class="tooltip-center-bottom position-relative form-group">
                                <label>كلمة المرور</label>
                                <input name="password" required="" id="password" type="password" class="form-control">
                                <div class="invalid-tooltip">Password</div>
                            </div>
                            <div class="tooltip-center-bottom position-relative form-group">

                                <label>المجموعة</label>
                                <select name="group_id" class="custom-select" id="group_id">
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="tooltip-center-bottom position-relative form-group">

                                <label>الحاله</label>
                                <select name="status" class="custom-select" id="status">
                                    <option value="1">نشط</option>
                                    <option value="0">غير نشط</option>

                                </select>

                            </div>
                            <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
                        </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
