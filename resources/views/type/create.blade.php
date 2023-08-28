@extends('layouts.admin')


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <h5 class="mb-4">انشاء توع مشروع جديد</h5>


                    <div class="card mb-4">
                        <div class="card-body">

                            @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
                            <form method="post" action="{{Route('create.type.form')}}">
                            @csrf
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الاسم</label>
                                    <input name="name" required="" id="Name" type="text" class="form-control">
                                    <div class="invalid-tooltip">الاسم</div>
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
