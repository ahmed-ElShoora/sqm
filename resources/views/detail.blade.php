@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
           
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">الاسم</th>
                                    <th scope="col" class="text-center">رقم الهاتف</th>
                                    <th scope="col" class="text-center">عنوان المشروع</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($types as $type)
                                <tr>
                                    <td class="text-center">{{$type->name}}</td>
                                    <td class="text-center">{{$type->phone}}</td>
                                    <td class="text-center">{{$type->project_name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </main>
@endsection
