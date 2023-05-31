<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pizza - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('style/css/open-iconic-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/ionicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/jquery.timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/icomoon.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/style.css') }}" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html"><span
                    class="flaticon-pizza-1 mr-1"></span>Pizza<br /><small>Delicous</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="menu.html" class="nav-link">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="services.html" class="nav-link">View cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    @yield('content')

    {{-- footer --}}
    
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    <script src="{{ asset('style/js/jquery.min.js') }}"></script>
    <script src="{{ asset('style/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('style/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('style/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('style/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('style/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('style/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('style/js/aos.js') }}"></script>
    <script src="{{ asset('style/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('style/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('style/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('style/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('style/js/google-map.js') }}"></script>
    <script src="{{ asset('style/js/main.js') }}"></script>
</body>

</html>
