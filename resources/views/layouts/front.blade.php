
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="{{\App\Models\setting::getSetting()->meta_description}}"/>
    <meta name="keywords" content="{{\App\Models\setting::getSetting()->meta_keywords }}" />
    <title>{{\App\Models\setting::getSetting()->title }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet" />
    @if(App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('assets/css/indexEN_style.css') }}" />
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/index_style.css') }}" />
    @endif

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/assets/owlcarousel/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/assets/owlcarousel/assets/owl.theme.default.min.css') }}" />
    <style>
        @font-face {
          font-family: "TheSans";
          src: url({{asset('/fonts/TheSans-Bold.otf')}});
        }
        body
        {
            font-family: 'TheSans';
            background-color: #fff;
        
        }
        button,
        pre{
            font-family: 'TheSans';
        }
    </style>
    @yield('style')
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light navHead bg-light navbarlink">
    <a class="navbar-brand" href="/"><img src="{{asset('images/logos/'.\App\Models\setting::getSetting()->logo)}}" class="nav-img"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">{{__('messages.home')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about-us">{{__('messages.about')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/services">{{__('messages.services')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/projects">{{__('messages.projects')}}</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="/contact-us">{{__('messages.contact')}}</a>
            </li>
        </ul>
        <div class="dropdown droblang">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-globe-asia"></i>{{__('messages.lang')}}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                <a class="dropdown-item" style="cursor: pointer;" rel="alternate" hreflang="en" >
                    English
                </a>

                <a class="dropdown-item" style="cursor: pointer;" rel="alternate" hreflang="ar">
                    العربية
                </a>

            </div>
        </div>
    </div>
</nav>

@yield('content')

<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="first-content">
                    <a href="/"><img src="{{asset('images/logos/'.\App\Models\setting::getSetting()->logo)}}" width="150px" /></a>
                    <p>
                        {{\App\Models\setting::getDesc()->desc}}
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="second-content">
                    <!--<h5>{{__('sections')}}</h5>-->
                    <ul>
                        <li>
                            <a href="/">{{__('messages.home')}}</a>
                        </li>
                        <li>
                            <a href="/about-us">{{__('messages.about')}}</a>
                        </li>
                        <li>
                            <a href="/services">{{__('messages.services')}}</a>
                        </li>
                        <li>
                            <a href="/projects">{{__('messages.projects')}}</a>
                        </li>
                        
                        <li>
                            <a href="/contact-us">{{__('messages.contact')}}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="contact-content">
                    <h5>{{__('messages.contact')}}</h5>
                    <ul>
                        <li><a style="color:#fff;" href='mailto:{{\App\Models\setting::getSetting()->email}}'><i class="far fa-envelope"></i>{{\App\Models\setting::getSetting()->email}}</a></li>
                        <li><a style="color:#fff;" href="tel:+966{{\App\Models\setting::getSetting()->whats_app_phone}}"><i class="fas fa-phone-alt"></i>966{{\App\Models\setting::getSetting()->whats_app_phone}}+</a></li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <a style="color:#fff;" href="https://maps.google.com/maps?q={{ $contact->latitude }},{{ $contact->longitude }}" target="_blank">{{__('messages.gada')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="jawhra text-left">
                    <a href="https://jawharatweb.com" target="_blank"><img src="/assets/images/j.png" height="100px" />
                    </a>
                    <br />
                    <a style="color: #fff; font-size: 15px" href="https://jawharatweb.com" target="_blank">{{__('jawharatweb')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="copyright">
    <div class="container">
        <p class="laws"> متر &copy;
            <script>
                new Date().getFullYear() &&
                document.write(" " + new Date().getFullYear());

            </script>
            - SQM</p>

        <div class="social-con">
            <a href="{{\App\Models\setting::getSetting()->footer_snapchat}}"><i class="fab fa-twitter"></i></a>
            <a href="{{\App\Models\setting::getSetting()->footer_linkedin}}"><i class="fab fa-linkedin-in"></i></a>
            <a href="{{\App\Models\setting::getSetting()->footer_instagram}}"><i class="fab fa-instagram"></i></a>
            <a href="{{\App\Models\setting::getSetting()->footer_facebook}}"><i class="fab fa-facebook-f"></i></a>
        </div>
    </div>
</section>
<div class="whatsup">
    <a href="https://api.whatsapp.com/send?phone={{\App\Models\setting::getSetting()->whats_app_phone}}"><img src="/assets/images/whatsup.png" height="60px" /></a>

</div>
@if(\App\Models\setting::getSetting()->show_bot)
<div class="chatpot">
    <div class="media">
        <a class="pic-chat"><img class="mt-3 ml-2" src="/assets/images/chatpot.png" height="60px" /></a>
        <div class="media-body" id="contHome">
            <div class="card card-job ">
                <i id="close" class="fas fa-times"></i>
                <a href="https://sqm.sa/projects">{{__('messages.projects')}}</a>
            </div>
            <div class="btnschatpot pic-chat">
                <a href="/projects"><button class="btn btn-ask"><i class="far fa-question-circle"></i>{{\App\Models\setting::getSearch()->bot}}</button></a>
                <button class="btn btn-ask"><i class="fas fa-search"></i>{{__('messages.ask')}}</button>
            </div>
        </div>
    </div>
</div>
@endif
<!--chat-->

<section class="msger">
    <header class="msger-header">

        <div class="msger-header-title">
            <img src="/assets/images/chatpot.png" hight="40px" />
            @if(App::getLocale() == 'en')
                Bot
            @else
                بوت
            @endif
        </div>
        <div class="msger-header-options">
            <a class="minus">
                <i class="fas fa-times"></i>
            </a>
        </div>
    </header>

    <main class="msger-chat">
    </main>

    <form class="msger-inputarea">
        <input type="text" class="msger-input" placeholder="Enter your message..." style="outline:none;">


        <button type="submit" class="btn-send"><i class="fas fa-paper-plane " style="outline:none;"></i></button>

    </form>
</section>

<script>
    document.querySelectorAll(".dropdown-item").forEach(link => {
        link.onclick = e => {
            let hr = e.target.getAttribute("hreflang")
            let l = window.location.pathname.split("/")[1]
            if(hr == "ar"){
                    let ar = window.location.href.replace("en", "ar")
                    window.location.href = ar
                    
                
            }else{
                    let en = window.location.href.replace("ar", "en")
                    window.location.href = en
            }
        }
    })
</script>
<script src="{{ asset('assets/js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/mine.js') }}"></script>
<!-- vendors -->
<script src="{{ asset('assets/assets/vendors/highlight.js') }}"></script>
<script src="{{ asset('assets/assets/js/app.js') }}"></script>
<script src="{{ asset('assets/assets/owlcarousel/owl.carousel.js') }}"></script>
<script>
    $(window).on("load", function() {

            $("#myModal11").modal("show");
        });
</script>
@yield('script')

<script src="{{ asset('assets/js/nour.js') }}"></script>


</body>


</html>
