@extends('layouts.admin')


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <h5 class="mb-4">انشاء مدينة جديدة</h5>


                    <div class="card mb-4">
                        <div class="card-body">

                            @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                                <form method="post" action="{{Route('create.city.form')}}">
                                    @csrf
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <label>اسم المدينة بالانجليزية</label>
                                            <input name="name_en" required="" id="client_name" type="text" class="form-control">
                                            <div class="invalid-tooltip">اسم المدينة بالانجليزية</div>
                                        </div>
                                    </div>

                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <label>اسم المدينة بالعربية</label>
                                            <input name="name_ar" required="" id="client_name" type="text" class="form-control">
                                            <div class="invalid-tooltip">اسم المدينة بالعربية</div>
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
