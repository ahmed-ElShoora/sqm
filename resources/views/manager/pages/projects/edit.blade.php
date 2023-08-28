@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h5 class="mb-4">Edit Slide</h5>

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{Route('ProjectPageController.update',$slide->id)}}">

                        @csrf
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الوصف باللغة الانجليزية</label>
                                <input name="description_en" id="description_en" type="text" class="form-control" value={{ $slide->description_en }}>
                                <div class="invalid-tooltip">الوصف باللغة الانجليزية</div>
                            </div>
                        </div>

                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الوصف باللغة العربية</label>
                                <input name="description_ar" id="description_ar" type="text" class="form-control" value={{ $slide->description_ar }}>
                                <div class="invalid-tooltip">الوصف باللغة العربية</div>
                            </div>
                        </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>اللون</label>
                                    <input name="color" id="color" value="{{$slide->color}}" type="color" class="form-control">
                                    <div class="invalid-tooltip">الوصف باللغة العربية</div>
                                </div>
                            </div>

                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <h5 class="">الصوره للكمبوتر</h5>
                                <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>
                        </div>
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <h5 class="">الصورة للجوال</h5>
                                <input type="file" id="image_phone" name="image_phone" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
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
