<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">

    <meta name="author" content="themefisher.com">

    <title>Megakit| Html5 Agency template</title>

    <!-- bootstrap.min css -->
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Icon Font Css -->
    <link href="{{ asset('plugins/themify/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">


    <!-- Owl Carousel CSS -->
    <link href="{{ asset('plugins/slick-carousel/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/slick-carousel/slick/slick-theme.css') }}" rel="stylesheet">

    <!-- Main Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">




</head>

<body>


<!-- Header Start -->

<header class="navigation">
    <div class="header-top ">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-2 col-md-4">
                    <div class="header-top-socials text-center text-lg-left text-md-left">
                        <a href="https://www.facebook.com/themefisher" target="_blank"><i class="ti-facebook"></i></a>
                        <a href="https://twitter.com/themefisher" target="_blank"><i class="ti-twitter"></i></a>
                        <a href="https://github.com/themefisher/" target="_blank"><i class="ti-github"></i></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-8 text-center text-lg-right text-md-right">
                    <div class="header-top-info">
                        <a href="tel:+23-345-67890">Call Us : <span>+23-345-67890</span></a>
                        <a href="mailto:support@gmail.com" ><i class="fa fa-envelope mr-2"></i><span>support@gmail.com</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg  py-4" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Mega<span>kit.</span>
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarsExample09">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/phone/models') }}">Phone models</a></li>
                     <li class="nav-item"><a class="nav-link" href="{{ url('/phone/choose') }}">Choose a phone</a></li>
                     <li class="nav-item"><a class="nav-link" href="{{ url('/phone/user_phones') }}">My phones</a></li>

                </ul>

                <ul class="navbar-nav ml-auto mt-10">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link login-button" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link login-button" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>


            </div>
        </div>
    </nav>
</header>

<!-- Header Close -->

@yield('content')

<div class="main-wrapper ">

    <section class="section intro">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8">
                    <div class="section-title">
                        <span class="h6 text-color ">We are creative & expert people</span>
                        <h2 class="mt-3 content-title">We work with business & provide solution to client with their business problem </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="intro-item mb-5 mb-lg-0">
                        <i class="ti-desktop color-one"></i>
                        <h4 class="mt-4 mb-3">Modern & Responsive design</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="intro-item mb-5 mb-lg-0">
                        <i class="ti-medall color-one"></i>
                        <h4 class="mt-4 mb-3">Awarded licensed company</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="intro-item">
                        <i class="ti-layers-alt color-one"></i>
                        <h4 class="mt-4 mb-3">Build your website Professionally</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Intro END -->

    <!-- section Counter Start -->
    <section class="section counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-item text-center mb-5 mb-lg-0">
                        <h3 class="mb-0"><span class="counter-stat font-weight-bold">1730</span> +</h3>
                        <p class="text-muted">Project Done</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-item text-center mb-5 mb-lg-0">
                        <h3 class="mb-0"><span class="counter-stat font-weight-bold">125 </span>M </h3>
                        <p class="text-muted">User Worldwide</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-item text-center mb-5 mb-lg-0">
                        <h3 class="mb-0"><span class="counter-stat font-weight-bold">39</span></h3>
                        <p class="text-muted">Availble Country</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-item text-center">
                        <h3 class="mb-0"><span class="counter-stat font-weight-bold">14</span></h3>
                        <p class="text-muted">Award Winner </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section Counter End  -->





    <section class="mt-70 position-relative">
        <div class="container">
            <div class="cta-block-2 bg-gray p-5 rounded border-1">
                <div class="row justify-content-center align-items-center ">
                    <div class="col-lg-7">
                        <span class="text-color">For Every type business</span>
                        <h2 class="mt-2 mb-4 mb-lg-0">Entrust Your Project to Our Best Team of Professionals</h2>
                    </div>
                    <div class="col-lg-4">
                        <a href="contact.html" class="btn btn-main btn-round-full float-lg-right ">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- footer Start -->
    <footer class="footer section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget">
                        <h4 class="text-capitalize mb-4">Company</h4>

                        <ul class="list-unstyled footer-menu lh-35">
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widget">
                        <h4 class="text-capitalize mb-4">Quick Links</h4>

                        <ul class="list-unstyled footer-menu lh-35">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget">
                        <h4 class="text-capitalize mb-4">Subscribe Us</h4>
                        <p>Subscribe to get latest news article and resources  </p>

                        <form action="#" class="sub-form">
                            <input type="text" class="form-control mb-3" placeholder="Subscribe Now ...">
                            <a href="#" class="btn btn-main btn-small">subscribe</a>
                        </form>
                    </div>
                </div>

                <div class="col-lg-3 ml-auto col-sm-6">
                    <div class="widget">
                        <div class="logo mb-4">
                            <h3>Mega<span>kit.</span></h3>
                        </div>
                        <h6><a href="tel:+23-345-67890" >Support@megakit.com</a></h6>
                        <a href="mailto:support@gmail.com"><span class="text-color h4">+23-456-6588</span></a>
                    </div>
                </div>
            </div>

            <div class="footer-btm pt-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="copyright">
                            &copy; Copyright Reserved to <span class="text-color">Megakit.</span> by <a href="https://themefisher.com/" target="_blank">Themefisher</a>
                        </div>
                    </div>
                    <div class="col-lg-6 text-left text-lg-right">
                        <ul class="list-inline footer-socials">
                            <li class="list-inline-item"><a href="https://www.facebook.com/themefisher"><i class="ti-facebook mr-2"></i>Facebook</a></li>
                            <li class="list-inline-item"><a href="https://twitter.com/themefisher"><i class="ti-twitter mr-2"></i>Twitter</a></li>
                            <li class="list-inline-item"><a href="https://www.pinterest.com/themefisher/"><i class="ti-linkedin mr-2 "></i>Linkedin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

<!--
Essential Scripts
=====================================-->


<!-- Main jQuery -->
<script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
<script src="{{ asset('js/contact.js') }}"></script>
<!-- Bootstrap 4.3.1 -->
<script src="{{ asset('plugins/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!--  Magnific Popup-->
<script src="{{ asset('plugins/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<!-- Slick Slider -->
<script src="{{ asset('plugins/slick-carousel/slick/slick.min.js') }}"></script>
<!-- Counterup -->
<script src="{{ asset('plugins/counterup/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('plugins/counterup/jquery.counterup.min.js') }}"></script>

<!-- Google Map -->
<!--  <script src="plugins/google-map/map.js"></script> -->
<!--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>  -->




<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
