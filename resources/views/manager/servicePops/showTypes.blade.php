@extends('layouts.admin')


@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <img alt="detail" src="assets/images/1.png" class="responsive border-0 border-radius img-fluid mb-3" style="width: 100%" />
                                <a href="{{Route('service.create.model',1)}}" class="btn btn-primary btn-lg top-right-button mr-1">استخدم هذا القالب</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <img alt="detail" src="assets/images/2.png" class="responsive border-0 border-radius img-fluid mb-3" style="width: 100%" />
                                <a href="{{Route('service.create.model',2)}}" class="btn btn-primary btn-lg top-right-button mr-1">استخدم هذا القالب</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <img alt="detail" src="assets/images/3.png" class="responsive border-0 border-radius img-fluid mb-3" style="width: 100%" />
                                <a href="{{Route('service.create.model',3)}}" class="btn btn-primary btn-lg top-right-button mr-1">استخدم هذا القالب</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <img alt="detail" src="assets/images/4.png" class="responsive border-0 border-radius img-fluid mb-3" style="width: 100%" />
                                <a href="{{Route('service.create.model',4)}}" class="btn btn-primary btn-lg top-right-button mr-1">استخدم هذا القالب</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
