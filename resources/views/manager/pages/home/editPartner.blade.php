@extends('layouts.admin')

@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-4">تعديل الشريك</h5>

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="{{Route('HomePageController.updatePartner',$partner->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <h5 class="">الشعار</h5>
                                <input type="file" required id="logo" name="logo" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
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
