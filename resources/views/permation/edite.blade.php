@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">تعديل مجموعة</h5>

                    <div class="card mb-4">
                        <div class="card-body">

                            <form method="post" action="{{Route('edit.permeation.form')}}">

                            @csrf
                            <input hidden type="text" name="id" value="{{$group->id}}">
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>العنوان</label>
                                    <input name="title" required="" id="title" type="text" class="form-control" value={{ $group->title }}>
                                    <div class="invalid-tooltip">العنوان</div>
                                </div>
                            </div>


                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>صلاحية الانشاء</label>
                                    <select name="canCreate" required class="custom-select" id="canCreate">
                                        <option value="1" @if($group->canCreate == 1) selected @endif>تفعيل</option>
                                        <option value="0" @if($group->canCreate == 0) selected @endif>تعطيل</option>
                                    </select>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>صلاحية التعديل</label>
                                    <select name="canEdit" required class="custom-select" id="canEdit">
                                        <option value="1" @if($group->canEdit == 1) selected @endif>تفعيل</option>
                                        <option value="0" @if($group->canEdit == 0) selected @endif>تعطيل</option>
                                    </select>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>صلاحية الحذف</label>
                                    <select name="canDelete" required class="custom-select" id="canDelete">
                                        <option value="1" @if($group->canDelete == 1) selected @endif>تفعيل</option>
                                        <option value="0" @if($group->canDelete == 0) selected @endif>تعطيل</option>
                                    </select>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>صلاحية روية الرسائل الداخلة</label>
                                    <select name="seeMessages" required class="custom-select" id="seeMessages">
                                        <option value="1" @if($group->seeMessages == 1) selected @endif>تفعيل</option>
                                        <option value="0" @if($group->seeMessages == 0) selected @endif>تعطيل</option>
                                    </select>
                                </div>
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
