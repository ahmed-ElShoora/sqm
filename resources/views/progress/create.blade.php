@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">انشاء انجاز جديد</h5>

                    <div class="card mb-4">
                        <div class="card-body">
                            @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                            <form method="post" action="{{Route('create.progress.form')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="tooltip-center-bottom position-relative form-group col-12">
                                    <label>العنوان باللغة الانجليزية</label>
                                    <input name="title_en" type="text" required="" id="title_en" class="form-control">
                                    <div class="invalid-tooltip">العنوان باللغة الانجليزية</div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="tooltip-center-bottom position-relative form-group col-12">
                                    <label>العنوان باللغة العربية</label>
                                    <input name="title_ar" type="text" required="" id="title_ar" class="form-control">
                                    <div class="invalid-tooltip">العنوان باللغة العربية</div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="tooltip-center-bottom position-relative form-group col-12">
                                    <label>الرقم</label>
                                    <input name="number" type="number" required="" id="number" class="form-control">
                                    <div class="invalid-tooltip">الرقم</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tooltip-center-bottom position-relative form-group col-12">
                                    <h5 class="">الشعار</h5>
                                    <input type="file" required id="inputImage" name="image" accept="image/x-png,image/gif,image/jpeg">
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

@section('script')

@endsection
