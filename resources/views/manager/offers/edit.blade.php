@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">انشاء عرض جديد</h5>

                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="{{Route('OfferController.store.update')}}">
                                @csrf
                                <input hidden name="id" type="text" value="{{$offer->id}}">
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>توع العقار بالعربية</label>
                                        <select name="type_id_ar" class="custom-select" id="type_id">
                                            @foreach($types as $type)
                                                @if($type->name == $offer->type_id_ar)
                                                    <option value="{{$type->name}}" selected>{{$type->name}}</option>
                                                @else
                                                    <option value="{{$type->name}}">{{$type->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>توع العقار بالانجليزية</label>
                                        <select name="type_id_en" class="custom-select" id="type_id">
                                            @foreach($types as $type)
                                                @if($type->name == $offer->type_id_en)
                                                    <option value="{{$type->name}}" selected>{{$type->name}}</option>
                                                @else
                                                    <option value="{{$type->name}}">{{$type->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>ar العنوان</label>
                                        <input name="title_ar" value="{{$offer->title_ar}}" type="text" required="" id="title" class="form-control">
                                        <div class="invalid-tooltip">العنوان</div>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>en العنوان</label>
                                        <input name="title_en" value="{{$offer->title_en}}" type="text" required="" id="title" class="form-control">
                                        <div class="invalid-tooltip">العنوان</div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الوصفar</label>
                                        <textarea name="description_ar" required="" id="description" class="form-control">{{$offer->description_ar}}</textarea>
                                        <div class="invalid-tooltip">الوصف</div>
                                    </div>
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>enالوصف</label>
                                        <textarea name="description_en" required="" id="description" class="form-control">{{$offer->description_en}}</textarea>
                                        <div class="invalid-tooltip">الوصف</div>
                                    </div>
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>السعر</label>
                                        <input name="price" type="number" value="{{$offer->price}}" step="0.01" required="" id="price" class="form-control">
                                        <div class="invalid-tooltip">السعر</div>
                                    </div>
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>المساحة</label>
                                        <input name="size" type="number" value="{{$offer->size}}" step="0.01" id="price" class="form-control">
                                        <div class="invalid-tooltip">السعر</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>المدينةar</label>
                                        <input name="city_ar" type="text" value="{{$offer->city_ar}}" required="" id="city" class="form-control">
                                        <div class="invalid-tooltip">المدينة</div>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>arالحي</label>
                                        <input name="town_ar" type="text" value="{{$offer->town_ar}}" required="" id="town" class="form-control">
                                        <div class="invalid-tooltip">الحي</div>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>المدينةen</label>
                                        <input name="city_en" type="text" value="{{$offer->city_en}}" required="" id="city" class="form-control">
                                        <div class="invalid-tooltip">المدينة</div>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>enالحي</label>
                                        <input name="town_en" type="text" value="{{$offer->town_en}}" required="" id="town" class="form-control">
                                        <div class="invalid-tooltip">الحي</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>عدد الغرف</label>
                                        <input name="room" type="number" value="{{$offer->room}}" id="room" class="form-control">
                                        <div class="invalid-tooltip">عدد الغرف</div>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>عدد الحمامات</label>
                                        <input name="bathroom" type="number" value="{{$offer->bathroom}}" id="bathroom" class="form-control">
                                        <div class="invalid-tooltip">عدد الحمامات</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>بالعربية : مواصفات المشروع</label><br>
                                        <h6>  يرجي مراعاه ادخال مواصفات المشروع مع فصلهم باستحدام [,] لفصلهم</h6>
                                        <textarea name="facilities_ar" required="" id="facilities" class="form-control">{{$offer->facilities_ar}}</textarea>
                                        <div class="invalid-tooltip">مواصفات المشروع</div>
                                    </div>
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>بالعربية : خدمات المشروع</label><br>
                                        <h6>يرجي مراعاه ادخال خدمات المشروع مع فصلهم باستحدام [,] لفصلهم</h6>
                                        <textarea name="services_ar" required="" id="services" class="form-control">{{$offer->services_ar}}</textarea>
                                        <div class="invalid-tooltip">خدمات المشروع</div>
                                    </div>


                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>بالانجليزية : مواصفات المشروع</label><br>
                                        <h6>يرجي مراعاه ادخال مواصفات المشروع مع فصلهم باستحدام [,] لفصلهم</h6>
                                        <textarea name="facilities_en" required="" id="facilities" class="form-control">{{$offer->facilities_en}}</textarea>
                                        <div class="invalid-tooltip">مواصفات المشروع</div>
                                    </div>
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>بالانجليزية : خدمات المشروع</label><br>
                                        <h6>يرجي مراعاه ادخال خدمات المشروع مع فصلهم باستحدام [,] لفصلهم</h6>
                                        <textarea name="services_en" required="" id="services" class="form-control">{{$offer->services_en}}</textarea>
                                        <div class="invalid-tooltip">خدمات المشروع</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tooltip-label-right col-6">
                                        <div class="error-l-100 position-relative form-group">
                                            <label>نوع الايجار</label>
                                            <select name="rentType" required class="custom-select" id="rentType">
                                                <option value="Sale" 
                                                @if($offer->rentType == 'Sale')
                                                    selected
                                                @endif
                                                >للبيع</option>
                                                <option value="yearly"
                                                @if($offer->rentType == 'yearly')
                                                    selected
                                                @endif
                                                >سنوي</option>
                                                <option value="6months"
                                                @if($offer->rentType == '6months')
                                                    selected
                                                @endif
                                                >نصف سنوي</option>
                                                <option value="3months"
                                                @if($offer->rentType == '3months')
                                                    selected
                                                @endif
                                                >ربع سنوي</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right col-6">
                                        <div class="error-l-100 position-relative form-group">
                                            <label>الحاله</label>
                                            <select name="isNew" required class="custom-select" id="isNew"> // value="{{$offer->title_en}}"
                                                <option value="1">جديد</option>
                                                <option value="0">قديم</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>خط العرض</label>
                                        <input name="latitude" value="{{$offer->latitude}}" type="text" required="" id="latitude" class="form-control">
                                        <div class="invalid-tooltip">خط العرض</div>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>خط الطول</label>
                                        <input name="longitude" type="text" value="{{$offer->longitude}}" required="" id="longitude" class="form-control">
                                        <div class="invalid-tooltip">خط الطول</div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>نص العلامة بالعربية</label>
                                        <input name="nav_text_ar" type="text" value="{{$offer->nav_text_ar}}" required="" id="latitude" class="form-control">
                                        <div class="invalid-tooltip">نص العلامة بالعربية</div>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>نص العلامة بالانجليزية</label>
                                        <input name="nav_text_en" value="{{$offer->nav_text_en}}" type="text" required="" id="latitude" class="form-control">
                                        <div class="invalid-tooltip">نص العلامة بالانجليزية</div>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>لون العلامه</label>
                                        <input name="nav_color" value="{{$offer->nav_color}}" type="color" required="" id="longitude" class="form-control">
                                        <div class="invalid-tooltip">لون العلامه</div>
                                    </div>
                                    <select name="comer" required class="custom-select" id="isNew">
                                        <option value="1"
                                        @if($offer->comer == '1')
                                                    selected
                                        @endif
                                        >متاح</option>
                                        <option value="2"
                                        @if($offer->comer == '2')
                                                    selected
                                                @endif
                                        >مؤجر</option>
                                        <option value="3"
                                        @if($offer->comer == '3')
                                                    selected
                                                @endif
                                        >مباع</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>اسم البائع</label>
                                        <input name="seller_name" type="text" value="{{$offer->seller_name}}" required="" id="seller_name" class="form-control">
                                        <div class="invalid-tooltip">اسم البائع</div>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>جوال البائع</label>
                                        <input name="seller_phone" type="tel" value="{{$offer->seller_phone}}" required="" id="seller_phone" class="form-control">
                                        <div class="invalid-tooltip">جوال البائع</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>البريد الاكتروني للبائع</label>
                                        <input name="seller_email" type="email" value="{{$offer->seller_email}}" required="" id="seller_email" class="form-control">
                                        <div class="invalid-tooltip">البريد الاكتروني للبائع</div>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>موفع البائع الالكترونى</label>
                                        <input name="seller_domain" type="text" value="{{$offer->seller_domain}}" required="" id="seller_domain" class="form-control">
                                        <div class="invalid-tooltip">موفع البائع الالكترونى</div>
                                    </div>
                                </div>
                                {{--////////////////////////////////////////////////////////////////////////////////////////--}}
                                <div class="row mt-4">
                                    <div class="tooltip-center-bottom position-relative form-group col-4">
                                        <h5 class="">صورة البائع</h5>
                                        <input type="file" id="inputImage2" name="seller_image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-4">
                                        <h5 class="">صورة رئيسية للمشروع</h5>
                                        <input type="file" id="inputImage3" name="thumbnail" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-4">
                                        <h5 class="">صورة للمشروع</h5>
                                        <input type="file" multiple="multiple" id="inputImage4" name="image[]" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
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
