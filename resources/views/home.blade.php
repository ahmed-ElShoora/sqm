@extends('layouts.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>المحتوي</h1>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    </nav>
                    <div class="separator mb-5"></div>
                </div>
                <div class="col-lg-12 col-xl-12">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body text-center justify-content-between d-flex flex-row align-items-center">
                            <div class="card-body text-center">
                                <i class="simple-icon-arrow-up-circle mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white"><span style="font-family: 'Tajawal', sans-serif">عدد الزوار للموقع</span> {{$count}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body text-center justify-content-between d-flex flex-row align-items-center">
                            <div class="card-body text-center">
                                <i class="simple-icon-user mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white"><span style="font-family: 'Tajawal', sans-serif">المستخدمين</span> {{$users_count}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body text-center justify-content-between d-flex flex-row align-items-center">
                            <div class="card-body text-center">
                                <i class="simple-icon-layers mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white"> <span style="font-family: 'Tajawal', sans-serif">المشاريع</span> {{$count_ofers}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body text-center justify-content-between d-flex flex-row align-items-center">
                            <div class="card-body text-center">
                                <i class="simple-icon-heart mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white"><span style="font-family: 'Tajawal', sans-serif">العملاء</span> {{$inboxes}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body text-center justify-content-between d-flex flex-row align-items-center">
                            <div class="card-body text-center">
                                <i class="simple-icon-arrow-down-circle mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white"><span style="font-family: 'Tajawal', sans-serif">جميع الرسائل الداخلة</span> {{$inboxes}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body text-center justify-content-between d-flex flex-row align-items-center">
                            <div class="card-body text-center">
                                <i class="simple-icon-clock mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white"><span style="font-family: 'Tajawal', sans-serif">رسائل قيد التنفيذ</span> {{$inboxes_process_mat}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body text-center justify-content-between d-flex flex-row align-items-center">
                            <div class="card-body text-center">
                                <i class="simple-icon-check mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white"> <span style="font-family: 'Tajawal', sans-serif">رسائل تم الرد عليها</span> {{$inboxes_end}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4 progress-banner">
                        <div class="card-body text-center justify-content-between d-flex flex-row align-items-center">
                            <div class="card-body text-center">
                                <i class="simple-icon-briefcase mr-2 text-white align-text-bottom d-inline-block"></i>
                                <div>
                                    <p class="lead text-white"> <span style="font-family: 'Tajawal', sans-serif">الصفقات</span> {{$count_deal}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
        </a>
        </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-4">
            </div>
        </div>
        </div>
    </main>
@endsection
