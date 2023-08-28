@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">تعديل انجاز </h5>

                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="{{Route('edit.progress.form')}}">
                            @csrf
                                <input name="id" hidden type="text" value="{{$progress->id}}">
                                <input name="old_image" hidden type="text" value="{{$progress->image}}">
                            <div class="row">
                                <div class="tooltip-center-bottom position-relative form-group col-12">
                                    <label>العنوان باللغة الانجليزية</label>
                                    <input name="title_en" type="text" required="" id="title_en" class="form-control" value={{ $progress->title_en }}>
                                    <div class="invalid-tooltip">العنوان باللغة الانجليزية</div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="tooltip-center-bottom position-relative form-group col-12">
                                    <label>العنوان باللغة العربية</label>
                                    <input name="title_ar" type="text" required="" id="title_ar" class="form-control" value={{ $progress->title_ar }}>
                                    <div class="invalid-tooltip">العنوان باللغة العربية</div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="tooltip-center-bottom position-relative form-group col-12">
                                    <label>الرقم</label>
                                    <input name="num" type="numb" step="0.01" required="" id="number" class="form-control" value={{ $progress->num }}>
                                    <div class="invalid-tooltip">الرقم</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tooltip-center-bottom position-relative form-group col-4">
                                    <h5 class="">الشعار</h5>
                                    <input type="file" id="inputImage" name="image" accept="image/x-png,image/gif,image/jpeg">
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

@section('script')

@endsection
