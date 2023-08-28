@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h5 class="mb-4">تعديل</h5>

                <div class="card mb-4">
                    <div class="card-body">

<form method="post" action="{{Route('AboutPageController.update', $about->id)}}" enctype='multipart/form-data'>
                        @csrf
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الوصف باللغة الانجليزية</label>
                                <input name="description_en" required="" id="description_en" type="text" class="form-control" value={{ $about->description_en }}>
                                <div class="invalid-tooltip">الوصف باللغة الانجليزية</div>
                            </div>
                        </div>

                         <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الوصف باللغة العربية</label>
                                <input name="description_ar" required="" id="description_ar" type="text" class="form-control" value={{ $about->description_ar }}>
                                <div class="invalid-tooltip">الوصف باللغة العربية</div>
                            </div>
                        </div>


                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الروية باللغة الانجليزية</label>
                                <input name="vision_en" required="" id="vision_en" type="text" class="form-control" value={{ $about->vision_en }}>
                                <div class="invalid-tooltip">الروية باللغة الانجليزية</div>
                            </div>
                        </div>

                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الروية باللغة العربية</label>
                                <input name="vision_ar" required="" id="vision_ar" type="text" class="form-control" value={{ $about->vision_ar }}>
                                <div class="invalid-tooltip">الروية باللغة العربية</div>
                            </div>
                        </div>

                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الرسالة باللغة الانجليزية</label>
                                <input name="mission_en" required="" id="mission_en" type="text" class="form-control" value={{ $about->mission_en }}>
                                <div class="invalid-tooltip">الرسالة باللغة الانجليزية</div>
                            </div>
                        </div>

                         <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الرسالة باللغة العربية</label>
                                <input name="mission_ar" required="" id="mission_ar" type="text" class="form-control" value={{ $about->mission_ar }}>
                                <div class="invalid-tooltip">الرسالة باللغة العربية</div>
                            </div>
                        </div>
<div class="row">

                                    <div class="tooltip-center-bottom position-relative form-group col-6" style="margin: 10px">
                                        <label>الصورة الثابتة</label>
                                        <input type="file" id="inputImage3" name="image" accept=".jpg,.jpeg,.png">
                                        <div class="invalid-tooltip">خط الطول</div>
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
