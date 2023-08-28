@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">تعديل الروابط</h5>

                    <div class="card mb-4">
                        <div class="card-body">
                            @if(App\Models\Permutation::canEdit(Auth()->user()->permition)->first()->canEdit == 1)
                            <form method="post" action="{{Route('update.links')}}" enctype="multipart/form-data">

                                @csrf
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الرابط في الرئيسية</label>
                                        <input name="home_link" value="{{$link->home_link}}" type="text" required="" id="latitude" class="form-control">
                                        <div class="invalid-tooltip">خط العرض</div>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الرابط في خدماتنا</label>
                                        <input name="services_link" type="text" value="{{$link->services_link}}" required="" id="longitude" class="form-control">
                                        <div class="invalid-tooltip">خط الطول</div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الرابط في المشاريع</label>
                                        <input name="projects_link" value="{{$link->projects_link}}" type="text" required="" id="latitude" class="form-control">
                                        <div class="invalid-tooltip">خط العرض</div>
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الرابط في من نحن</label>
                                        <input name="about_link" type="text" value="{{$link->about_link}}" required="" id="longitude" class="form-control">
                                        <div class="invalid-tooltip">خط الطول</div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الرابط في اتصل بنا</label>
                                        <input name="contact_link" value="{{$link->contact_link}}" type="text" required="" id="latitude" class="form-control">
                                        <div class="invalid-tooltip">خط العرض</div>
                                    </div>
                                </div>
                                <hr />
                                
                                
                                 <!--new .....-->
                                
                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>العنوان فالصفحة الرئيسية بالعربية</label>
                                        <input name="title_ar_home" value="{{$link->title_ar_home}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                        <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>العنوان فصفحة من نحن لعربية</label>
                                        <input name="title_ar_about" value="{{$link->title_ar_about}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                </div>
                                
                                                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>العنوان فصفحة الخدمات بالعربية</label>
                                        <input name="title_ar_service" value="{{$link->title_ar_service}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>العنوان فصفحة المشاريع بالعربية</label>
                                        <input name="title_ar_project" type="text" value="{{$link->title_ar_project}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>العنوان فصفحة اتصل بنا بالعربية</label>
                                        <input name="title_ar_contact" value="{{$link->title_ar_contact}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>العنوان فالصفحة الرئيسية بالانجليوية</label>
                                        <input name="title_en_home" type="text" value="{{$link->title_en_home}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>العنوان فالصفحه من نحن بالانجليوية</label>
                                        <input name="title_en_about" value="{{$link->title_en_about}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الصفحة خدماتنا الانجليوية  </label>
                                        <input name="title_en_service" type="text" value="{{$link->title_en_service}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>لصفحة المشاريع بالانجليوية</label>
                                        <input name="title_en_project" value="{{$link->title_en_project}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>العنوانلصفحة اتصل بنا بالانجليوية</label>
                                        <input name="title_en_contact" type="text" value="{{$link->title_en_contact}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                <hr />
                                
                                                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الوصف فالرئيسية بالعربية</label>
                                        <input name="desc_ar_home" value="{{$link->desc_ar_home}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الوصف فالخدمات بالعربية</label>
                                        <input name="desc_ar_service" type="text" value="{{$link->desc_ar_service}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الوصف في من نحن بالعربية</label>
                                        <input name="desc_ar_about" value="{{$link->desc_ar_about}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الوصف فالمشاريع بالعربية</label>
                                        <input name="desc_ar_project" type="text" value="{{$link->desc_ar_project}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الوصف فاتصل بنا بالعربية</label>
                                        <input name="desc_ar_contact" value="{{$link->desc_ar_contact}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الوصف فالرئيسية بالانجليزية</label>
                                        <input name="desc_en_home" type="text" value="{{$link->desc_en_home}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الوصف فصفحة من نحن بالانجليزية</label>
                                        <input name="desc_en_about" value="{{$link->desc_en_about}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الوصف فصفحة خدماتنا بالانجليوية</label>
                                        <input name="desc_en_service" type="text" value="{{$link->desc_en_service}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الوصف فالمشاريع بالانجليزية</label>
                                        <input name="desc_en_project" value="{{$link->desc_en_project}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>الوصف فصفحة اتصل بنا بالعربية</label>
                                        <input name="desc_en_contact" type="text" value="{{$link->desc_en_contact}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                <hr />
                                
                                                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>اسم الزر بالعربية فصفحة الرئيسية</label>
                                        <input name="name_ar_home" value="{{$link->name_ar_home}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>ااسم الزر بالعربية في صفحة من نحن</label>
                                        <input name="name_ar_about" type="text" value="{{$link->name_ar_about}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>اسم الزر بالعربية في صفحة خدماتنا</label>
                                        <input name="name_ar_service" value="{{$link->name_ar_service}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>اسم الزر بالعربية في صفحة المشاريع</label>
                                        <input name="name_ar_project" type="text" value="{{$link->name_ar_project}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>اسم الزر بالعربية في صفحة اتصل بنا</label>
                                        <input name="name_ar_contact" value="{{$link->name_ar_contact}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>اسم الزر بالانجليزية في الصفحه الرئيسية</label>
                                        <input name="name_en_home" type="text" value="{{$link->name_en_home}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>اسم الزر بالانجليزية في صفحة من نحن</label>
                                        <input name="name_en_about" value="{{$link->name_en_about}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>اسم الزر بالانجليزية في صفحة خدماتنا</label>
                                        <input name="name_en_service" type="text" value="{{$link->name_en_service}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                <div class="row">
                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>اسم الزر بالانجليزية في صفحة المشاريع</label>
                                        <input name="name_en_project" value="{{$link->name_en_project}}" type="text" required="" id="latitude" class="form-control">
                                    </div>

                                    <div class="tooltip-center-bottom position-relative form-group col-6">
                                        <label>اسم الزر بالانجليوية في صفحة اتصل بنا</label>
                                        <input name="name_en_contact" type="text" value="{{$link->name_en_contact}}" required="" id="longitude" class="form-control">
                                    </div>

                                </div>
                                
                                <hr />
                                
                                
                                <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
                                </form>
                                <hr>
                                <hr>
                                <form method="post" action="{{Route('update.links.images')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input name="image_home_old" type="text" value="{{$link->image_home}}" hidden >
                                    <input name="image_service_old" type="text" value="{{$link->image_service}}" hidden >
                                    <input name="image_about_old" type="text" value="{{$link->image_about}}" hidden >
                                    <input name="image_project_old" type="text" value="{{$link->image_project}}" hidden >
                                    <input name="image_contact_old" type="text" value="{{$link->image_contact}}" hidden >
                                    <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <h5 class="">الصوره فالرئيسية</h5>
                                <input type="file" id="image_phone" name="image_home" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>
                        </div>
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <h5 class="">الصورة فخدماتنا</h5>
                                <input type="file" id="image_phone" name="image_service" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>
                        </div>
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <h5 class="">الصورة فمن نحن</h5>
                                <input type="file" id="image_phone" name="image_about" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>
                        </div>
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <h5 class="">الصورة فالمشاريع</h5>
                                <input type="file" id="image_phone" name="image_project" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                            </div>
                        </div>
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <h5 class="">الصورة فاتصل بنا</h5>
                                <input type="file" id="image_phone" name="image_contact" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
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
