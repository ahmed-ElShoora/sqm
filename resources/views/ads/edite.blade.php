@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">تعديل الاعلان</h5>

                    <div class="card mb-4">
                        <div class="card-body">

                            <form method="post" action="{{Route('edite.ad.form')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="tooltip-center-bottom position-relative form-group col-4">
                                <h5 class="">الصورة</h5>
                                <input type="text" hidden name="id" value="{{$id}}">
                                <input type="file" required id="image" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
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
