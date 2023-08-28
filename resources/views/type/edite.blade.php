@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">تعديل النوع</h5>

                    <div class="card mb-4">
                        <div class="card-body">

                            <form method="post" action="{{Route('edite.type.form')}}">

                                @csrf
                                <div class="tooltip-label-right">
                                    <div class="error-l-100 position-relative form-group">
                                        <label>الاسم</label>
                                        <input hidden name="id" type="text" value="{{$type->id}}">
                                        <input name="name" required="" id="Name" type="text" class="form-control" value={{ $type->name }}>
                                        <div class="invalid-tooltip">الاسم</div>
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
