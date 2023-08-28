@extends('layouts.admin')


@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
            @if(App\Models\Permutation::canCreate(Auth()->user()->permition)->first()->canCreate == 1)
            <div class="col-12">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <img alt="detail" src="assets/images/1.png" class="responsive border-0 border-radius img-fluid mb-3" style="width: 100%" />
                                <form method="get" action="{{Route('ServiceController.create',1)}}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg top-right-button mr-1">استخدم هذا القالب</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <img alt="detail" src="assets/images/2.png" class="responsive border-0 border-radius img-fluid mb-3" style="width: 100%" />
                                <form method="get" action="{{Route('ServiceController.create',2)}}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg top-right-button mr-1">استخدم هذا القالب</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <img alt="detail" src="assets/images/3.png" class="responsive border-0 border-radius img-fluid mb-3" style="width: 100%" />
                                <form method="get" action="{{Route('ServiceController.create',3)}}"
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg top-right-button mr-1">استخدم هذا القالب</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <img alt="detail" src="assets/images/4.png" class="responsive border-0 border-radius img-fluid mb-3" style="width: 100%" />
                                <form method="get" action="{{Route('ServiceController.create',4)}}"
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg top-right-button mr-1">استخدم هذا القالب</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endif
        </div>
    </div>
</main>
@endsection
