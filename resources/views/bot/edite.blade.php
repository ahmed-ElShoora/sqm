@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">تعديل روبوت الدردشة</h5>

                    <div class="card mb-4">
                        <div class="card-body">

                            <form method="post" action="{{Route('edite.bot.form')}}">

                            @csrf
                            <input hidden type="text" name="id" value="{{$bot->id}}">
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>السوال</label>
                                    <input name="question" required="" id="question" type="text" class="form-control" value={{ $bot->question }}>
                                    <div class="invalid-tooltip">السوال</div>
                                </div>
                            </div>
                            <div class="tooltip-center-top position-relative form-group">
                                <label>الاجابة</label>
                                <input name="answer" required="" id="answer" type="text" class="form-control" value={{ $bot->answer }}>
                                <div class="invalid-tooltip">الاجابة</div>
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
