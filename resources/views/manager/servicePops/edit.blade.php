@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h5 class="mb-4">تعديل الخدمات</h5>

                <div class="card mb-4">
                    <div class="card-body">

<form method="post" action="{{Route('ServicePopController.update', $service->id)}}">
                        @csrf
                        <div class="tooltip-center-bottom position-relative form-group">
                            <h5 class="">الشعار</h5>
                            <input type="file" id="inputImage" name="icon" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                        </div>
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>العنوان باللغة الانجليزية</label>
                                <input name="title_en" required="" id="title_en" type="text" class="form-control" value="{{ $service->title_en }}">
                                <div class="invalid-tooltip">العنوان باللغة الانجليزية</div>
                            </div>
                        </div>
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>العنوان باللغة العربية</label>
                                <input name="title_ar" required="" id="title_ar" type="text" class="form-control" value="{{ $service->title_ar }}">
                                <div class="invalid-tooltip">العنوان باللغة العربية</div>
                            </div>
                        </div>
                        @if($service->type != 4)
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الوصف باللغة الانجليزية</label>
                                <textarea name="description_en" required="" id="description_en" class="form-control" value="{{ $service->description_en }}">{{ $service->description_en }}</textarea>
                                <div class="invalid-tooltip">الوصف باللغة الانجليزية</div>
                            </div>
                        </div>
                         <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الوصف باللغة العربية</label>
                                <textarea name="description_ar" required="" id="description_ar" class="form-control" value="{{ $service->description_ar }}">{{ $service->description_ar }}</textarea>
                                <div class="invalid-tooltip">الوصف باللغة العربية</div>
                            </div>
                        </div>
                        <div class="tooltip-center-bottom position-relative form-group">
                            <label>نقاط باللغة الانجليزية</label><br>
                            <h6>يرجي مراعاه ادخال النقاط مع فصلهم باستحدام [,] لفصلهم</h6>
                            <textarea name="notes_en" required="" id="notes_en" class="form-control" value="{{ $service->notes_en }}">{{ $service->notes_en }}</textarea>
                            <div class="invalid-tooltip">نقاط باللغة الانجليزية</div>
                        </div>
                        <div class="tooltip-center-bottom position-relative form-group">
                            <label>نقاط باللغة العربية</label><br>
                            <h6>يرجي مراعاه ادخال النقاط مع فصلهم باستحدام [,] لفصلهم</h6>
                            <textarea name="notes_ar" required="" id="notes_ar" class="form-control" value="{{ $service->notes_ar }}">{{ $service->notes_ar }}</textarea>
                            <div class="invalid-tooltip">نقاط باللغة العربية</div>
                        </div>
                        @endif

                        @if($service->type == 4)
                        <div class="tooltip-center-bottom position-relative form-group">
                            <label>الاسئلة باللغة الانجليزية</label><br>
                            <h6>يرجي مراعاه ادخال الاسئلة مع فصلهم باستحدام [,] لفصلهم</h6>
                            <textarea name="notes_en" required="" id="notes_en" class="form-control" value="{{ $service->notes_en }}">{{ $service->notes_en }}</textarea>
                            <div class="invalid-tooltip">الاسئلة باللغة الانجليزية</div>
                        </div>
                         <div class="tooltip-center-bottom position-relative form-group">
                            <label>الاسئلة باللغة العربية</label><br>
                            <h6>يرجي مراعاه ادخال الاسئلة مع فصلهم باستحدام [,] لفصلهم</h6>
                            <textarea name="notes_ar" required="" id="notes_ar" class="form-control" value="{{ $service->notes_ar }}">{{ $service->notes_ar }}</textarea>
                            <div class="invalid-tooltip">الاسئلة باللغة العربية</div>
                        </div>
                        <div class="tooltip-center-bottom position-relative form-group">
                            <label>الاجابات باللغة الانجليزية</label><br>
                            <h6>يرجي مراعاه ادخال الاجابات مع فصلهم باستحدام [,] لفصلهم</h6>
                            <textarea name="description_en" required="" id="description_en" class="form-control" value="{{ $service->description_en }}">{{ $service->description_en }}</textarea>
                            <div class="invalid-tooltip">الاجابات باللغة الانجليزية</div>
                        </div>
                        <div class="tooltip-center-bottom position-relative form-group">
                            <label>الاجابات باللغة العربية</label><br>
                            <h6>يرجي مراعاه ادخال الاجابات مع فصلهم باستحدام [,] لفصلهم</h6>
                            <textarea name="description_ar" required="" id="description_ar" class="form-control" value="{{ $service->description_ar }}">{{ $service->description_ar }}</textarea>
                            <div class="invalid-tooltip">الاجابات باللغة العربية</div>
                        </div>
                        @endif


                        @if($service->type == 1 || $service->type == 4)
                        <div class="tooltip-center-bottom position-relative form-group col-4">
                            <h5 class="">الصورة</h5>
                            <input type="file" id="inputImage" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                        </div>
                        @endif

                        <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
