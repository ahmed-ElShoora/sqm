@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">تعديل مستخدم</h5>

                    <div class="card mb-4">
                        <div class="card-body">

                            <form method="post" action="{{Route('edite.users.form')}}">

                            @csrf
                                <input name="id" hidden type="text" value="{{ $user->id }}">
                                <input name="oldpassword" hidden type="text" value="{{ $user->password }}">
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الاسم</label>
                                    <input name="name" required="" id="Name" type="text" class="form-control" value={{ $user->name }}>
                                    <div class="invalid-tooltip">Name</div>
                                </div>
                            </div>
                            <div class="tooltip-center-top position-relative form-group">
                                <label>البريد الاكتروني</label>
                                <input name="email" required="" id="email" type="email" class="form-control" value={{ $user->email }}>
                                <div class="invalid-tooltip">E-mail</div>
                            </div>
                            <div class="tooltip-center-bottom position-relative form-group">
                                <label>كلمة المرور</label>
                                <input name="password" id="password" type="password" class="form-control">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
