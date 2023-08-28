<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>sqm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ asset('font/simple-line-icons/css/simple-line-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/vendor/quill.snow.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/quill.bubble.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/fullcalendar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/datatables.responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/glide.core.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/cropper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-stars.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/component-custom-switch.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body id="app-container" class="menu-default show-spinner vertical boxed">
<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left">

        <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                <rect x="0.5" y="0.5" width="25" height="1" />
                <rect x="0.5" y="7.5" width="25" height="1" />
                <rect x="0.5" y="15.5" width="25" height="1" />
            </svg>
        </a>

    </div>

    <div class="navbar-right">
        <div class="header-icons d-inline-block align-middle">
            <div class="d-none d-md-inline-block align-text-bottom mr-3">
                <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1" data-toggle="tooltip" data-placement="left" title="Dark Mode">
                    <input class="custom-switch-input" id="switchDark" type="checkbox" checked>
                    <label class="custom-switch-btn" for="switchDark"></label>
                </div>
            </div>

            <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                <i class="simple-icon-size-fullscreen"></i>
                <i class="simple-icon-size-actual"></i>
            </button>

        </div>

        <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="name">{{ Auth::user()->name }}</span>
                <span>
                        <img alt="Profile Picture" src="img/profiles/l-1.jpg" />
                    </span>
            </button>

            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                    تسجيل الخروج
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div>
    </div>
</nav>

<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li>
                    <a href="{{Route('home')}}">
                        <i class="iconsminds-shop-4"></i>
                        <span>لوحة التحكم</span>
                    </a>
                </li>
                <li>
                    <a href="#users">
                        <i class="simple-icon-user"></i> المستخدمين
                    </a>
                </li>
                <li>
                    <a href="#permissions">
                        <i class="simple-icon-organization"></i> الصلاحيات
                    </a>
                </li>
                <li>
                    <a href="#pages">
                        <i class="simple-icon-list"></i> الصفحات
                    </a>
                </li>

                <li>
                    <a href="#offerType">
                        <i class="simple-icon-plus"></i> انواع المشاريع
                    </a>
                </li>

                <li>
                    <a href="#offers">
                        <i class="simple-icon-layers"></i> المشاريع
                    </a>
                </li>

                <li>
                    <a href="#ads">
                        <i class="simple-icon-graph"></i> الاعلانات
                    </a>
                </li>

                <li>
                    <a href="#servicesModals">
                        <i class="simple-icon-compass"></i> موديول الخدمات
                    </a>
                </li>

                <li>
                    <a href="{{Route('links')}}">
                        <i class="simple-icon-home"></i>الروابط و الصورة
                    </a>
                </li>

                <li>
                    <a href="#progress">
                        <i class="simple-icon-key"></i> الانجازات
                    </a>
                </li>

                <li>
                    <a href="#chatBot">
                        <i class="simple-icon-paper-plane"></i> روبوت الدردشة
                    </a>
                </li>

                <li>
                    <a href="{{Route('best.house')}}">
                        <i class="simple-icon-home"></i> افضل البيوت
                    </a>
                </li>

                <li>
                    <a href="{{Route('inboxes')}}">
                        <i class="simple-icon-bubble"></i> الرسائل الداخلة
                    </a>
                </li>
<li>
                    <a href="{{URL('/details')}}">
                        <i class="simple-icon-graph"></i> الاتصال من داخل المشروع
                    </a>
                </li>
                <li>
                    <a href="#deals">
                        <i class="simple-icon-calendar"></i> الصفقات
                    </a>
                </li>

                <li>
                    <a href="{{Route('city')}}">
                        <i class="simple-icon-list"></i> المدن
                    </a>
                </li>


                <li>
                    <a href="{{Route('setting')}}">
                        <i class="simple-icon-settings"></i> الاعدادات
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">

            <ul class="list-unstyled" data-link="users" id="users">
                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('users')}}">
                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">قائمة المستخدمين</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{--@if(currentUser()->groupCanCreate == 1)--}}
                    <li>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{Route('create.user')}}">
                                        <i class="simple-icon-pencil"></i> <span class="d-inline-block"> انشاء مستخدم</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                {{--@endif--}}
            </ul>

            <ul class="list-unstyled" data-link="permissions" id="permissions">
                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('show.permeation')}}">
                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">قائمة الصلاحيات</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{--@if(currentUser()->groupCanCreate == 1)--}}
                    <li>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{Route('create.permeation')}}">
                                        <i class="simple-icon-pencil"></i> <span class="d-inline-block"> انشاء محموعة</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                {{--@endif--}}
            </ul>

            <ul class="list-unstyled" data-link="pages" id="pages">
                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="/pages-home">
                                    <i class="simple-icon-home"></i> <span class="d-inline-block">الرئيسية</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="/pages-about">
                                    <i class="simple-icon-pin"></i> <span class="d-inline-block">من نحن</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>

                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="/pages-services">
                                    <i class="simple-icon-compass"></i> <span class="d-inline-block">خدماتنا</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="/pages-contact">
                                    <i class="simple-icon-phone"></i> <span class="d-inline-block">تواصل معنا</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="/pages-projects">
                                    <i class="simple-icon-cursor"></i> <span class="d-inline-block">المشاريع</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



            </ul>

            <ul class="list-unstyled" data-link="offerType" id="offerType">
                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('types')}}">
                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">قائمة انواع المشاريع</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{--@if(currentUser()->groupCanCreate == 1)--}}
                    <li>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{Route('create.type')}}">
                                        <i class="simple-icon-pencil"></i> <span class="d-inline-block">انشاء نوع مشروع جديد</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                {{--@endif--}}
            </ul>

            <ul class="list-unstyled" data-link="offers" id="offers">
                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('offers')}}">
                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">قائمة المشاريع</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('archive.offers')}}">
                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">المشاريع المحذوفة</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{--@if(currentUser()->groupCanCreate == 1)--}}
                    <li>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{Route('create.offer')}}">
                                        <i class="simple-icon-pencil"></i> <span class="d-inline-block">انشاء مشروع</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                {{--@endif--}}
            </ul>

            <ul class="list-unstyled" data-link="ads" id="ads">
                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('ads')}}">
                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">قائمة الاعلانات</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{--@if(currentUser()->groupCanCreate == 1)--}}
                    <li>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{Route('create.ad')}}">
                                        <i class="simple-icon-pencil"></i> <span class="d-inline-block">انشاء اعلان</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                {{--@endif--}}
            </ul>

            <ul class="list-unstyled" data-link="servicesModals" id="servicesModals">
                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('services.models')}}">
                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">قائمة الخدمات</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{--@if(currentUser()->groupCanCreate == 1)--}}
                    <li>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{Route('service.modals.showTypes')}}">
                                        <i class="simple-icon-pencil"></i> <span class="d-inline-block">انشاء خدمة</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                {{--@endif--}}
            </ul>

            <ul class="list-unstyled" data-link="progress" id="progress">
                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('progress')}}">
                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">قائمة الانجازات</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{--@if(currentUser()->groupCanCreate == 1)--}}
                    <li>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{Route('create.progress')}}">
                                        <i class="simple-icon-pencil"></i> <span class="d-inline-block">انشاء انجاز</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                {{--@endif--}}
            </ul>

            <ul class="list-unstyled" data-link="chatBot" id="chatBot">
                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('bots')}}">
                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">قائمة روبوت الدردشة</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{--@if(currentUser()->groupCanCreate == 1)--}}
                    <li>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{Route('create.bot')}}">
                                        <i class="simple-icon-pencil"></i> <span class="d-inline-block">انشاء روبوت الدردشة</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                {{--@endif--}}
            </ul>

            <ul class="list-unstyled" data-link="deals" id="deals">
                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{Route('deals')}}">
                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">قائمة الصفقات</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{--@if(currentUser()->groupCanCreate == 1)--}}
                    <li>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{Route('create.deal')}}">
                                        <i class="simple-icon-pencil"></i> <span class="d-inline-block">انشاء صفقة</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                {{--@endif--}}
            </ul>


        </div>
    </div>
</div>
@yield('content')
<footer class="page-footer">
    <div class="footer-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <p class="mb-0 text-muted">SQM &copy; <script>
                            new Date().getFullYear() && document.write(" " + new Date().getFullYear());

                        </script>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{ asset('js/vendor/quill.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/vendor/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('js/vendor/chartjs-plugin-datalabels.js') }}"></script>
<script src="{{ asset('js/vendor/moment.min.js') }}"></script>
<script src="{{ asset('js/vendor/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/vendor/datatables.min.js') }}"></script>
<script src="{{ asset('js/vendor/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/vendor/glide.min.js') }}"></script>
<script src="{{ asset('js/vendor/progressbar.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('js/vendor/select2.full.js') }}"></script>
<script src="{{ asset('js/vendor/nouislider.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/vendor/Sortable.js') }}"></script>
<script src="{{ asset('js/vendor/mousetrap.min.js') }}"></script>
<script src="{{ asset('js/vendor/cropper.min.js') }}"></script>
<script src="{{ asset('js/dore.script.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="https:////cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@yield('script')

</body>


</html>
