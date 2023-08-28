@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h5 class="mb-4">تعديل</h5>

                <div class="card mb-4">
                    <div class="card-body">

<form method="post" action="{{Route('ContactController.update')}}">
                        @csrf
    <input name="id" hidden type="text" value="{{$contact->id}}">
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>العنوان باللغة الانجليزية</label>
                                <input name="address_en" required="" id="address_en" type="text" class="form-control" value={{ $contact->address_en }}>
                                <div class="invalid-tooltip">العنوان باللغة الانجليزية</div>
                            </div>
                        </div>

                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>العنوان باللغة العربية</label>
                                <input name="address_ar" required="" id="address_ar" type="text" class="form-control" value={{ $contact->address_ar }}>
                                <div class="invalid-tooltip">العنوان باللغة العربية</div>
                            </div>
                        </div>

                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>البريد الاكتروني</label>
                                <input name="mail" required="" id="mail" type="email" class="form-control" value={{ $contact->mail }}>
                                <div class="invalid-tooltip">البريد الاكتروني</div>
                            </div>
                        </div>

                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الجوال</label>
                                <input name="phone" required="" id="phone" type="tel" class="form-control" value={{ $contact->phone }}>
                                <div class="invalid-tooltip">الجوال</div>
                            </div>
                        </div>

                        <div class="tooltip-center-bottom position-relative form-group">
                            <label>خط العرض</label>
                            <input name="latitude" type="text" required="" id="latitude" class="form-control" value={{ $contact->latitude }}>
                            <div class="invalid-tooltip">خط العرض</div>
                        </div>

                        <div class="tooltip-center-bottom position-relative form-group">
                            <label>خط الطول</label>
                            <input name="longitude" type="text" required="" id="longitude" class="form-control" value={{ $contact->longitude }}>
                            <div class="invalid-tooltip">خط الطول</div>
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
