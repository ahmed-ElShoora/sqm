@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h5 class="mb-4">انشاء عرض جديد</h5>

                <div class="card mb-4">
                    <div class="card-body">
                        @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                        <form method="post" enctype="multipart/form-data" action="{{Route('OfferController.store')}}" id="action-data">
                        @csrf
                        <div class="row">
                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>توع العقار بالعربية</label>
                                <select name="type_id_ar" class="custom-select" id="type_id">
                                    @foreach($types as $type)
                                        <option value="{{$type->name}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>توع العقار بالانجليزية</label>
                                <select name="type_id_en" class="custom-select" id="type_id">
                                    @foreach($types as $type)
                                        <option value="{{$type->name}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>ar العنوان</label>
                                <input name="title_ar" type="text" required="" id="title" class="form-control">
                                <div class="invalid-tooltip">العنوان</div>
                            </div>

                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>en العنوان</label>
                                <input name="title_en" type="text" required="" id="title" class="form-control">
                                <div class="invalid-tooltip">العنوان</div>
                            </div>

                        </div>
                        <div class="row">
                            
                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>الوصفar</label>
                                <textarea name="description_ar" required="" id="description" class="form-control"></textarea>
                                <div class="invalid-tooltip">الوصف</div>
                            </div>
                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>enالوصف</label>
                                <textarea name="description_en" required="" id="description" class="form-control"></textarea>
                                <div class="invalid-tooltip">الوصف</div>
                            </div>
                            
                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>السعر</label>
                                <input name="price" type="number" step="0.01" required="" id="price" class="form-control">
                                <div class="invalid-tooltip">السعر</div>
                            </div>
                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>المساحة</label>
                                <input name="size" type="text" id="price" class="form-control">
                                <div class="invalid-tooltip">السعر</div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>المدينةar</label>
                                <input name="city_ar" type="text" required="" id="city" class="form-control">
                                <div class="invalid-tooltip">المدينة</div>
                            </div>

                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>arالحي</label>
                                <input name="town_ar" type="text" required="" id="town" class="form-control">
                                <div class="invalid-tooltip">الحي</div>
                            </div>

                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>المدينةen</label>
                                <input name="city_en" type="text" required="" id="city" class="form-control">
                                <div class="invalid-tooltip">المدينة</div>
                            </div>

                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>enالحي</label>
                                <input name="town_en" type="text" required="" id="town" class="form-control">
                                <div class="invalid-tooltip">الحي</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>عدد الغرف</label>
                                <input name="room" type="number" id="room" class="form-control">
                                <div class="invalid-tooltip">عدد الغرف</div>
                            </div>

                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>عدد الحمامات</label>
                                <input name="bathroom" type="number" id="bathroom" class="form-control">
                                <div class="invalid-tooltip">عدد الحمامات</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>بالعربية : مواصفات المشروع</label><br>
                                <h6>  يرجي مراعاه ادخال مواصفات المشروع مع فصلهم باستحدام [,] لفصلهم</h6>
                                <textarea name="facilities_ar" required="" id="facilities" class="form-control"></textarea>
                                <div class="invalid-tooltip">مواصفات المشروع</div>
                            </div>
                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>بالعربية : خدمات المشروع</label><br>
                                <h6>يرجي مراعاه ادخال خدمات المشروع مع فصلهم باستحدام [,] لفصلهم</h6>
                                <textarea name="services_ar" required="" id="services" class="form-control"></textarea>
                                <div class="invalid-tooltip">خدمات المشروع</div>
                            </div>


                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>بالانجليزية : مواصفات المشروع</label><br>
                                <h6>يرجي مراعاه ادخال مواصفات المشروع مع فصلهم باستحدام [,] لفصلهم</h6>
                                <textarea name="facilities_en" required="" id="facilities" class="form-control"></textarea>
                                <div class="invalid-tooltip">مواصفات المشروع</div>
                            </div>
                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>بالانجليزية : خدمات المشروع</label><br>
                                <h6>يرجي مراعاه ادخال خدمات المشروع مع فصلهم باستحدام [,] لفصلهم</h6>
                                <textarea name="services_en" required="" id="services" class="form-control"></textarea>
                                <div class="invalid-tooltip">خدمات المشروع</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tooltip-label-right col-6">
                                <div class="error-l-100 position-relative form-group">
                                    <label>نوع الايجار</label>
                                    <select name="rentType" required class="custom-select" id="rentType">
                                        <option value="Sale">للبيع</option>
                                        <option value="yearly">سنوي</option>
                                        <option value="6months">نصف سنوي</option>
                                        <option value="3months">ربع سنوي</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tooltip-label-right col-6">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الحاله</label>
                                    <select name="isNew" required class="custom-select" id="isNew">
                                        <option value="1">جديد</option>
                                        <option value="0">قديم</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>خط العرض</label>
                                <input name="latitude" type="text" required="" id="latitude" class="form-control">
                                <div class="invalid-tooltip">خط العرض</div>
                            </div>

                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>خط الطول</label>
                                <input name="longitude" type="text" required="" id="longitude" class="form-control">
                                <div class="invalid-tooltip">خط الطول</div>
                            </div>

                        </div>
                            <div class="row">
                                <div class="tooltip-center-bottom position-relative form-group col-6">
                                    <label>نص العلامة بالعربية</label>
                                    <input name="nav_text_ar" type="text" required="" id="latitude" class="form-control">
                                    <div class="invalid-tooltip">نص العلامة بالعربية</div>
                                </div>

                                <div class="tooltip-center-bottom position-relative form-group col-6">
                                    <label>نص العلامة بالانجليزية</label>
                                    <input name="nav_text_en" type="text" required="" id="latitude" class="form-control">
                                    <div class="invalid-tooltip">نص العلامة بالانجليزية</div>
                                </div>

                                <div class="tooltip-center-bottom position-relative form-group col-6">
                                    <label>لون العلامه</label>
                                    <input name="nav_color" type="color" required="" id="longitude" class="form-control">
                                    <div class="invalid-tooltip">لون العلامه</div>
                                </div>

                            </div>
                        <div class="row">
                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>اسم البائع</label>
                                <input name="seller_name" type="text" required="" id="seller_name" class="form-control">
                                <div class="invalid-tooltip">اسم البائع</div>
                            </div>

                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>جوال البائع</label>
                                <input name="seller_phone" type="tel" required="" id="seller_phone" class="form-control">
                                <div class="invalid-tooltip">جوال البائع</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>البريد الاكتروني للبائع</label>
                                <input name="seller_email" type="email" required="" id="seller_email" class="form-control">
                                <div class="invalid-tooltip">البريد الاكتروني للبائع</div>
                            </div>

                            <div class="tooltip-center-bottom position-relative form-group col-6">
                                <label>موفع البائع الالكترونى</label>
                                <input name="seller_domain" type="text" required="" id="seller_domain" class="form-control">
                                <div class="invalid-tooltip">موفع البائع الالكترونى</div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="tooltip-center-bottom position-relative form-group col-4">
                                <h5 class="">صورة البائع</h5>
                                <input type="file" required id="inputImage2" name="seller_image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>

                            <div class="tooltip-center-bottom position-relative form-group col-4">
                                <h5 class="">صورة رئيسية للمشروع</h5>
                                <input type="file" required id="inputImage3" name="thumbnail" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>

                            <div class="tooltip-center-bottom position-relative form-group col-4">
                                <h5 class="">صورة للمشروع</h5>
                                <input type="file" multiple="multiple" maxlength="1024" required id="inputImage4" name="image[]" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>
                        </div>
                        <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
                        </form>
                        @endif
                        <div id="approvedFiles">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')

@endsection
