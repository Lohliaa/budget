<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" />
    <meta property="og:site" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta name="twitter:card" content="summary_large_image">

    <!-- Webpage Title -->
    <title>Main Dashboard</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
    <link href="{{ asset('zinc') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('zinc') }}/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="{{ asset('zinc') }}/css/swiper.css" rel="stylesheet">
    <link href="{{ asset('zinc') }}/css/styles.css" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('img') }}/favicon/laravel.ico">
</head>

<body data-bs-spy="scroll" data-bs-target="#navbarExample">

    <!-- Navigation -->
    <nav id="navbarExample" class="navbar navbar-expand-lg fixed-top navbar-light" aria-label="Main navigation">
        <div class="container">
            {{--  <img src="" alt="YAZAKI" />  --}}
            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ms-auto navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
                    </li>

                </ul>
                @if (Route::has('login'))
                @auth
                <span class="nav-item">
                    <a class="btn-solid-sm" href="{{ url('home') }}">Home</a>
                </span>
                @else
                <span class="nav-item">
                    <a class="btn-solid-sm" href="{{ route('login') }}">Masuk Akun</a>
                </span>
                @if (Route::has('register'))
                <span class="nav-item">
                    <a class="btn-solid-sm" href="{{ route('register') }}">Daftar Akun</a>
                </span>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </nav>
    <!-- end of navigation -->

    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-5">
                    <div class="text-container">
                        <div class="section-title">KARANGDUREN ARCHIVE</div>
                        <h1 class="h1-large">KARANGDUREN DIGITAL ARCHIVE</h1>
                        @if (Route::has('login'))
                        {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                            <a href="{{ url('/home') }}" class="btn-solid-lg">Halaman Utama</a>
                            @else
                            <a href="{{ route('login') }}" class="btn-solid-lg">Masuk Akun</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-solid-lg">Daftar Akun</a>
                            @endif
                            @endauth
                        </div> --}}
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="image-container">
                        <img class="img-fluid" src="{{ asset('zinc') }}/images/header-illustration.svg"
                            alt="alternative">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end of header -->

    <div class="mt-5 mb-5"></div>

    <!-- Copyright -->
    <div class="copyright bg-gray mt-5">
        <div class="container">
            <div class="row">
                <!-- end of col -->
                <div class="col-lg-2">
                    <p class="p-small statement">Copyright © 2023</p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright -->
    <!-- end of copyright -->


    <!-- Back To Top Button -->
    <button onclick="topFunction()" id="myBtn">
        <img src="{{ asset('zinc') }}/images/up-arrow.png" alt="alternative">
    </button>
    <!-- end of back to top button -->

    <!-- Scripts -->
    <script src="{{ asset('zinc') }}/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="{{ asset('zinc') }}/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ asset('zinc') }}/js/purecounter.min.js"></script>
    <!-- Purecounter counter for statistics numbers -->
    <script src="{{ asset('zinc') }}/js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
    <script src="{{ asset('zinc') }}/js/scripts.js"></script> <!-- Custom scripts -->
</body>

</html>