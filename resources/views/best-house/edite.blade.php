@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">تعديل افضل العقارات</h5>

                    <div class="card mb-4">
                        <div class="card-body">
                        @foreach($bests_new as $best)
                            <form method="post" action="{{Route('edite.best.house.form')}}">

                            @csrf
                            <input hidden name="id" value="{{$best->id}}">
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>العنوان باللغة الانجليزية</label>
                                    <input name="title_en" required="" id="title_en" type="text" class="form-control" value={{$best->title_en}}>
                                    <div class="invalid-tooltip">العنوان باللغة الانجليزية</div>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>العنوان باللغة العربية</label>
                                    <input name="title_ar" required="" id="title_ar" type="text" class="form-control" value={{$best->title_ar}}>
                                    <div class="invalid-tooltip">العنوان باللغة العربية </div>
                                </div>
                            </div>
                            <div class="tooltip-center-top position-relative form-group">
                                <label>الوصف باللغة الانجليزية</label>
                                <input name="desc_en" required="" id="description_en" type="text" class="form-control" value={{$best->desc_en}}>
                                <div class="invalid-tooltip">الوصف باللغة الانجليزية</div>
                            </div>
                            <div class="tooltip-center-top position-relative form-group">
                                <label>الوصف باللغة العربية</label>
                                <input name="desc_ar" required="" id="description_ar" type="text" class="form-control" value={{$best->desc_ar}}>
                                <div class="invalid-tooltip">الوصف باللغة العربية </div>
                            </div>

                            <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
