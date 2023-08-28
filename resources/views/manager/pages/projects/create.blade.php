@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h5 class="mb-4">سلايدر جديد</h5>

                <div class="card mb-4">
                    <div class="card-body">
                        @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                        <form method="post" action="{{Route('ProjectPageController.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الوصف باللغة الانجليزية</label>
                                <textarea name="description_en" id="description_en" class="form-control"></textarea>
                                <div class="invalid-tooltip">الوصف باللغة الانجليزية</div>
                            </div>
                        </div>

                          <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الوصف باللغة العربية</label>
                                <textarea name="description_ar" id="description_ar" class="form-control"></textarea>
                                <div class="invalid-tooltip">الوصف باللغة العربية</div>
                            </div>
                        </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>اللون</label>
                                    <input name="color" id="color" type="color" class="form-control">
                                    <div class="invalid-tooltip">الوصف باللغة العربية</div>
                                </div>
                            </div>

                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <h5 class="">الصوره للكمبوتر</h5>
                                <input type="file" required id="image" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>
                        </div>
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <h5 class="">الصورة للجوال</h5>
                                <input type="file" required id="image_phone" name="photo" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
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
