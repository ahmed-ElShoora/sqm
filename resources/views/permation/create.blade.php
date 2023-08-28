@extends('layouts.admin')


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <h5 class="mb-4">انشاء مجموعة جديد</h5>


                    <div class="card mb-4">
                        <div class="card-body">

                            @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                            <form method="post" action="{{Route('create.permeation.form')}}">
                            @csrf
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>العنوان</label>
                                    <input name="title" required="" id="title" type="text" class="form-control">
                                    <div class="invalid-tooltip">العنوان</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>صلاحية الانشاء</label>
                                    <select name="canCreate" required class="custom-select" id="canCreate">
                                        <option value="1">تفعيل</option>
                                        <option value="0">تعطيل</option>
                                    </select>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>صلاحية التعديل</label>
                                    <select name="canEdit" required class="custom-select" id="canEdit">
                                        <option value="1">تفعيل</option>
                                        <option value="0">تعطيل</option>
                                    </select>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>صلاحية الحذف</label>
                                    <select name="canDelete" required class="custom-select" id="canDelete">
                                        <option value="1">تفعيل</option>
                                        <option value="0">تعطيل</option>
                                    </select>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>صلاحية روية الرسائل الداخلة</label>
                                    <select name="seeMessages" required class="custom-select" id="seeMessages">
                                        <option value="1">تفعيل</option>
                                        <option value="0">تعطيل</option>
                                    </select>
                                </div>
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
