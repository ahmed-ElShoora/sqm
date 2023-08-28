@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">تعديل الاعدادات</h5>

                    <div class="card mb-4">
                        <div class="card-body">

                            <form method="post" enctype="multipart/form-data" action="{{Route('edit.setting.form')}}">

                            @csrf
                            <div class="error-l-100 position-relative form-group">
                                <label>العنوان</label>
                                <input name="title" required id="title" type="text" class="form-control" value={{ $setting->title }}>
                                <div class="invalid-tooltip">العنوان</div>
                            </div>


                            <div class="error-l-100 position-relative form-group">
                                <label>رقم الواتس اب</label>
                                <input name="whats_app_phone" required id="whats_app_phone" type="tel" class="form-control" value={{ $setting->whats_app_phone }}>
                                <div class="invalid-tooltip">رقم الواتس اب</div>
                            </div>

<div class="error-l-100 position-relative form-group">
                                <label>الايميل</label>
                                <input name="email" id="whats_app_phone" required type="email" class="form-control" value="{{ $setting->email }}">
                                <div class="invalid-tooltip">رقم الواتس اب</div>
                            </div>

                            <div class="col-6 d-flex justify-content-between mb-5 mt-5">
                                <div class="tooltip-center-bottom position-relative form-group col-6">
                                    <label>لوجو</label>
                                    <input type="file" id="inputImage" name="logo" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                </div>
                            </div>
                            <hr>
                            <div class="col-6 d-flex justify-content-between mb-5 mt-5">
                                <div class="tooltip-center-bottom position-relative form-group col-6">
                                    <label>فاف ايقون</label>
                                    <input type="file" id="inputImage" name="fav_icon" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>وصف الفوتر باللغة الانجليزية</label>
                                    <textarea class="form-control" name="footer_description_en" rows="3">{{ $setting->footer_description_en  }}</textarea>
                                    <div class="invalid-tooltip">وصف الفوتر باللغة الانجليزية</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>وصف الفوتر باللغة العربية</label>
                                    <textarea class="form-control" name="footer_description_ar" rows="3">{{ $setting->footer_description_ar  }}</textarea>
                                    <div class="invalid-tooltip">وصف الفوتر باللغة العربية</div>
                                </div>
                            </div>

<div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الوصف في صفحة خدماتنا بالعربية</label>
                                    <textarea class="form-control" name="project_desc_ar" required rows="3">{{ $setting->project_desc_ar  }}</textarea>
                                    <div class="invalid-tooltip">وصف الفوتر باللغة العربية</div>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الوصف في صفحة خدماتنا بالانجليزية </label>
                                    <textarea class="form-control" name="project_desc_en" required rows="3">{{ $setting->project_desc_en  }}</textarea>
                                    <div class="invalid-tooltip">وصف الفوتر باللغة العربية</div>
                                </div>
                            </div>
                            <div class="error-l-100 position-relative form-group">
                                <label>حقوق الملكية باللغة الانجليزية</label>
                                <input name="footer_copyRights_en" required id="footer_copyRights_en" type="text" class="form-control" value={{ $setting->footer_copyRights_en }}>
                                <div class="invalid-tooltip">حقوق الملكية باللغة الانجليزية</div>
                            </div>

                            <div class="error-l-100 position-relative form-group">
                                <label>حقوق الملكية باللغة العربية</label>
                                <input name="footer_copyRights_ar" required id="footer_copyRights_ar" type="text" class="form-control" value={{ $setting->footer_copyRights_ar }}>
                                <div class="invalid-tooltip">حقوق الملكية باللغة العربية</div>
                            </div>

                            <div class="error-l-100 position-relative form-group">
                                <label>فيس بوك</label>
                                <input name="footer_facebook" required id="footer_facebook" type="text" class="form-control" value={{ $setting->footer_facebook }}>
                                <div class="invalid-tooltip">فيس بوك</div>
                            </div>

                            <div class="error-l-100 position-relative form-group">
                                <label>انستجرام</label>
                                <input name="footer_instagram" required id="footer_instagram" type="text" class="form-control" value={{ $setting->footer_instagram }}>
                                <div class="invalid-tooltip">انستجرام</div>
                            </div>

                            <div class="error-l-100 position-relative form-group">
                                <label>لينكد ان</label>
                                <input name="footer_linkedin" required id="footer_linkedin" type="text" class="form-control" value={{ $setting->footer_linkedin }}>
                                <div class="invalid-tooltip">لينكد ان</div>
                            </div>

                            <div class="error-l-100 position-relative form-group">
                               <label>تويتر</label>
                                <input name="footer_snapchat" required id="footer_snapchat" type="text" class="form-control" value={{ $setting->footer_snapchat }}>
                                <div class="invalid-tooltip">سناب شات</div>
                            </div>


                            {{--<div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>كلمات مفتاحية ميتا</label>
                                    <textarea class="form-control" name="meta_keywords" rows="3">{{ $setting->meta_keywords }}</textarea>
                                    <div class="invalid-tooltip">كلمات مفتاحية ميتا</div>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>وصف الميتا</label>
                                    <textarea class="form-control" name="meta_description" rows="3">{{ $setting->meta_description }}</textarea>
                                    <div class="invalid-tooltip">وصف الميتا</div>
                                </div>
                            </div>--}}

                            <div class="error-l-100 position-relative form-group">
                                <label>روبوت الدردشة السؤال الظاهر اعلي باللغة الانجليزية</label>
                                <input name="bot_header_question_en" required id="bot_header_question_en" type="text" class="form-control" value={{ $setting->bot_header_question_en }}>
                                <div class="invalid-tooltip">روبوت الدردشة السؤال الظاهر اعلي باللغة الانجليزية</div>
                            </div>

                            <div class="error-l-100 position-relative form-group">
                                <label>روبوت الدردشة السؤال الظاهر اعلي باللغة العربية</label>
                                <input name="bot_header_question_ar" required id="bot_header_question_ar" type="text" class="form-control" value={{ $setting->bot_header_question_ar }}>
                                <div class="invalid-tooltip">روبوت الدردشة السؤال الظاهر اعلي باللغة العربية</div>
                            </div>

                            <div class="error-l-100 position-relative form-group">
                                <label>روبوت الدردشة السؤال الظاهر اسفل باللغة الانجليزية</label>
                                <input name="bot_footer_question_en" required id="bot_footer_question_en" type="text" class="form-control" value={{ $setting->bot_footer_question_en }}>
                                <div class="invalid-tooltip">روبوت الدردشة السؤال الظاهر اسفل باللغة الانجليزية</div>
                            </div>

                            <div class="error-l-100 position-relative form-group">
                                <label>روبوت الدردشة السؤال الظاهر اسفل باللغة العربية</label>
                                <input name="bot_footer_question_ar" required id="bot_footer_question_ar" type="text" class="form-control" value={{ $setting->bot_footer_question_ar }}>
                                <div class="invalid-tooltip">روبوت الدردشة السؤال الظاهر اسفل باللغة العربية</div>
                            </div>

                            <div class="error-l-100 position-relative form-group">
                                <label>روبوت الدردشة السؤال الظاهر جانب علامه البحث باللغة الانجليزية</label>
                                <input name="bot_search_part_en" required id="bot_search_part_en" type="text" class="form-control" value={{ $setting->bot_search_part_en }}>
                                <div class="invalid-tooltip">روبوت الدردشة السؤال الظاهر جانب علامه البحث باللغة الانجليزية</div>
                            </div>

                            <div class="error-l-100 position-relative form-group">
                                <label>روبوت الدردشة السؤال الظاهر جانب علامه البحث باللغة العربية</label>
                                <input name="bot_search_part_ar" required id="bot_search_part_ar" type="text" class="form-control" value={{ $setting->bot_search_part_ar }}>
                                <div class="invalid-tooltip">روبوت الدردشة السؤال الظاهر جانب علامه البحث باللغة العربية</div>
                            </div>

                            <div class="error-l-100 position-relative form-group">
                                <label>روبوت الدردشة الرسالة الترحيبية</label>
                                <input name="bot_welcome_message" required id="bot_welcome_message" type="text" class="form-control" value={{ $setting->bot_welcome_message }}>
                                <div class="invalid-tooltip">روبوت الدردشة الرسالة الترحيبية</div>
                            </div>

                            <div class="error-l-100 position-relative form-group">
                                <label>روبوت الدردشة الرسالة الختامية</label>
                                <input name="bot_closing_message" required id="bot_closing_message" type="text" class="form-control" value={{ $setting->bot_closing_message }}>
                                <div class="invalid-tooltip">روبوت الدردشة الرسالة الختامية</div>
                            </div>
                                    <div class="tooltip-label-right col-6">
                                        <div class="error-l-100 position-relative form-group">
                                            <label>التحكم بالبوت</label>
                                            <select name="show_bot" required class="custom-select" id="isNew"> 
                                                @if($setting->show_bot == 0)
                                                <option value="0" select>ايقاف</option>
                                                @else
                                                <option value="1">تفعيل</option>
                                                @endif
                                                
                                                @if($setting->show_bot == 1)
                                                <option value="1" select>تفعيل</option>
                                                @else
                                                <option value="0">ايقاف</option>
                                                @endif
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right col-6">
                                        <div class="error-l-100 position-relative form-group">
                                            <label>التحكم بالاعلان</label>
                                            <select name="show_ads" required class="custom-select" id="isNew"> 
                                                @if($setting->show_ads == 0)
                                                <option value="0" select>ايقاف</option>
                                                @else
                                                <option value="1">تفعيل</option>
                                                @endif
                                                
                                                @if($setting->show_ads == 1)
                                                <option value="1" select>تفعيل</option>
                                                @else
                                                <option value="0">ايقاف</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right col-6">
                                        <div class="error-l-100 position-relative form-group">
                                            <label>التحكم بنافذة الفلتر</label>
                                            <select name="show_filter" required class="custom-select" id="isNew"> 
                                                @if($setting->show_filter == 0)
                                                <option value="0" select>ايقاف</option>
                                                @else
                                                <option value="1">تفعيل</option>
                                                @endif
                                                
                                                @if($setting->show_filter == 1)
                                                <option value="1" select>تفعيل</option>
                                                @else
                                                <option value="0">ايقاف</option>
                                                @endif>
                                            </select>
                                        </div>
                                    </div>

                            <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
