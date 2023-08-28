@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">تعديل الصفقة</h5>

                    <div class="card mb-4">
                        <div class="card-body">

                            <form method="post" action="{{Route('DealController.update')}}">

                                @csrf
                                <input hidden name="id" type="text" value="{{$deal->id}}">
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>اسم العميل</label>
                                    <input name="client_name" required="" id="client_name" type="text" class="form-control" value={{ $deal->client_name }}>
                                    <div class="invalid-tooltip">اسم العميل</div>
                                </div>
                            </div>
                            <div class="tooltip-center-top position-relative form-group">
                                <label>البريد الاكتروني</label>
                                <input name="client_email" required="" id="client_email" type="email" class="form-control" value={{ $deal->client_email }}>
                                <div class="invalid-tooltip">E-mail</div>
                            </div>

                            <div class="tooltip-center-top position-relative form-group">
                                <label>الجوال</label>
                                <input name="client_phone" required="" id="client_phone" type="tel" class="form-control" value={{ $deal->client_phone }}>
                                <div class="invalid-tooltip">الجوال</div>
                            </div>


                            <div class="tooltip-center-bottom position-relative form-group">

                                <label>المشروع</label>
                                <select name="offer_id" class="custom-select" id="offer_id">
                                    @foreach($offers as $offer)
                                        <option value="{{$offer->id}}"@if($deal->offer_id == $offer->id)selected @endif>{{$offer->title_ar}}</option>
                                    @endforeach
                                </select>

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
