<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Thai FDA welcomes you to Thailand to attend the PIC/S Seminar on soft skills that make a good GMP/GDP inspector in 2023.">
    <meta name="keywords" content="PIC/S">
    <meta name="author" content="elemis">
    <title>PIC/S 2023</title>
    <link rel="shortcut icon" href="{{ asset('img/logo-title.png') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors/purple.css') }}">
    <link rel="preload" href="{{ asset('css/fonts/space.css') }}" as="style" onload="this.rel='stylesheet'">
    <!-- Plugin used-->
    <style>
        /* .navbar-brand {
            width: 12% !important;
        } */

        /* carlendar */
        .box-calendar {
            box-shadow: 5px 5px 15px #bebebe, -5px -5px 15px #ffffff;
            backdrop-filter: blur(25px);
            border-bottom: solid 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .box-calendar div.month {
            background: rgba(0, 0, 0, 0.2);
            padding: 7px 0;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
            text-align: center;
        }

        .box-calendar div.info {
            padding: 5px 0;
            text-align: center;
            line-height: 2.5rem;
        }

        .box-calendar div.info p.day,
        .box-calendar div.info p.year {
            font-size: 0.8rem;
        }

        .box-calendar div.info p.date {
            font-size: 3rem;
            font-weight: 800;
        }

        .footer {
            width: 100%;
            height: 30vh;
            mix-height: 200px;
            background-color: #0b77b8;
            background-repeat: no-repeat;
            background-position: top right;
            background-size: contain;
        }

        .footer .container {
            height: 30vh;
        }

        .copyright {
            color: #ffffff;
            margin-top: 10vh;
            display: block;
            font-size: 0.65rem;
        }

        @media (max-width: 576px) {
            .mt-12 {
                margin-top: 0 !important;
            }
        }

        .bg-gradient-blend hr {
            border: #ffffff 1px solid;
            opacity: 0.5;
        }

        .in-bg-gradient-blend {
            background-position: bottom;
            background-repeat: no-repeat;
            background-size: cover;
            height: 500px;
            position: absolute;
            opacity: 0.5;
        }

        /* end */
    </style>
    @yield('style')
</head>

<body>
    <div class="content-wrapper">
        {{-- navbar --}}
        <header class="wrapper">
            <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                        <a href="#">
                            <img src="{{ asset('img/logo.png') }}" srcset="{{ asset('img/logo.png') }}" alt=""
                                width="200px" />
                        </a>
                    </div>
                    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                        <div class="offcanvas-header d-lg-none">
                            <h3 class="text-white fs-30 mb-0">PIC/s 2023</h3>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">News</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">Travel and
                                        Accommodation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">Programme</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">Registration & Fee</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">About us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">Member Login</a>
                                </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <!-- /.offcanvas-footer -->
                        </div>
                        <!-- /.offcanvas-body -->
                    </div>
                    <!-- /.navbar-collapse -->
                    <div class="navbar-other w-100 d-flex ms-auto">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item d-lg-none">
                                <button class="hamburger offcanvas-nav-btn"><span></span></button>
                            </li>
                        </ul>
                        <!-- /.navbar-nav -->
                    </div>
                    <!-- /.navbar-other -->
                </div>
                <!-- /.container -->
            </nav>
            <!-- /.navbar -->
        </header>
        {{-- <header class="wrapper">
            <nav class="navbar navbar-expand-lg center-nav transparent position-absolute navbar-light">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand">
                        <a href="#">
                            <img src="{{ asset('img/logo.png') }}" srcset="{{ asset('img/logo.png') }}" alt=""
                                width="60%" />
                        </a>
                    </div>
                    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                        <div class="offcanvas-header d-lg-none">
                            <h3 class="text-white fs-30 mb-0">Sandbox</h3>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">News</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">Travel and
                                        Accommodation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">Programme</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">Registration & Fee</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">About us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="dropdown">Member Login</a>
                                </li>
                            </ul>
                            <!-- /.navbar-nav -->
                        </div>
                        <!-- /.offcanvas-body -->
                    </div>
                </div>
                <!-- /.container -->
            </nav>
            <!-- /.navbar -->
        </header> --}}
        <!-- /header -->
        <section class="wrapper">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <img src="{{ asset('img/banner-1.jpg') }}" alt="" class="w-100 p-0">
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

            <!-- /.overflow-hidden -->
        </section>
        <section class="wrapper bg-light">
            <div class="container pt-5">
                {{-- Announcement --}}
                <div class="row text-center">
                    <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                        <h2 class="fs-16 text-uppercase text-muted mb-3">Announcement</h2>
                    </div>
                </div>
                <div class="row gx-lg-8 gx-xl-12 gy-10 mb-3 mb-xl-5">
                    <div class="col-lg-7">
                        <figure><img class="w-auto" src="{{ asset('img/1stannouncement-02.jpg') }}"
                                srcset="{{ asset('img/1stannouncement-02.jpg') }}" alt=""></figure>
                    </div>
                    <!--/column -->
                    <div class="col-lg-5">
                        <p>1st announcement : Message from THAI FDA, Thailand.</p>
                        <p>PIC/S Seminar 2023 on Soft Skills that Make a Good GMP/GDP Inspector in 2023, Bangkok,
                            Thailand
                            Thailand's Food and Drug Administration (Thai FDA) is pleased to host the 2023 PIC/S Seminar
                            on “Soft Skills that Make a Good GMP/GDP Inspector in 2023” in Bangkok (Thailand) from 8-10
                            November 2023, preceded by the PIC/S Committee meeting.</p>
                        <p>The Seminar is the main annual international training event by PIC/S which is open to GMP
                            Inspectors from PIC/S Participating Authorities, (Pre-)Applicants, Partners and non-PIC/S
                            Member Medicines Regulatory Authorities. </p>
                        <p>For more information, please contact druginspection@fda.moph.go.th</p>
                    </div>
                    <!--/column -->
                </div>
                {{-- Quote from the host --}}
                <div class="row text-center">
                    <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                        <h2 class="fs-16 text-uppercase text-muted mb-3">Quote from the host</h2>
                    </div>
                </div>
                <div class="row gx-lg-8 gx-xl-12 gy-10">
                    <div class="col-lg-12">
                        <div class="card shadow-lg me-lg-6">
                            <div class="card-body">
                                <p>The Pharmaceutical Inspection Co-operation Scheme (PIC/S) was established in 1995 as
                                    an extension to the Pharmaceutical Inspection Convention (PIC) of 1970. PIC/S is a
                                    non-binding co-operative arrangement between Regulatory Authorities in the field of
                                    Good Manufacturing Practice (GMP) of medicinal products for human or veterinary use.
                                    It is open to any Authority having a comparable GMP inspection system. PIC/S
                                    comprises more than 50 Participating Authorities coming from all over the world
                                    (Europe, Africa, America, Asia and Australasia). The exact list of PIC/S
                                    Participating Authorities is available on the PIC/S web site (www.picscheme.org).
                                    PIC/S aims at harmonising inspection procedures worldwide by developing common
                                    standards in the field of GMP and by providing training opportunities to inspectors.
                                    It also aims at facilitating co-operation and networking between competent
                                    authorities, regional and international organisations, thus increasing mutual
                                    confidence. This is reflected in PIC/S’ mission which reads as follows: “To lead the
                                    international development, implementation and maintenance of harmonised GMP
                                    standards and quality systems of inspectorates in the field of medicinal products.”
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/column -->
                </div>
            </div>
        </section>
        <section class="wrapper bg-gradient-blend mt-5">
            <div class="w-100 in-bg-gradient-blend" style="background-image: url('{{ asset('img/bg.png') }}')">

            </div>
            <div class="container pt-0 pt-md-5">
                {{-- Announcement
            <div class="row text-center">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <h2 class="fs-16 text-uppercase text-muted mb-3">Announcement</h2>
                </div>
            </div>
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <div class="col-lg-7">
                    <figure><img class="w-auto" src="{{ asset('img/1stannouncement-02.jpg') }}"
                            srcset="{{ asset('img/1stannouncement-02.jpg') }}" alt=""></figure>
                </div>
                <!--/column -->
                <div class="col-lg-5">
                    <p>1st announcement : Message from THAI FDA, Thailand.</p>
                    <p>PIC/S Seminar 2023 on Soft Skills that Make a Good GMP/GDP Inspector in 2023, Bangkok,
                        Thailand
                        Thailand's Food and Drug Administration (Thai FDA) is pleased to host the 2023 PIC/S Seminar
                        on “Soft Skills that Make a Good GMP/GDP Inspector in 2023” in Bangkok (Thailand) from 8-10
                        November 2023, preceded by the PIC/S Committee meeting.</p>
                    <p>The Seminar is the main annual international training event by PIC/S which is open to GMP
                        Inspectors from PIC/S Participating Authorities, (Pre-)Applicants, Partners and non-PIC/S
                        Member Medicines Regulatory Authorities. </p>
                    <p>For more information, please contact the PIC/S Secretariat.</p>
                </div>
                <!--/column -->
            </div> --}}
                {{-- Quote from the host
            <div class="row text-center">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <h2 class="fs-16 text-uppercase text-muted mb-3">Quote from the host</h2>
                </div>
            </div>
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-3 mb-xl-5">
                <div class="col-lg-12">
                    <div class="card shadow-lg me-lg-6">
                        <div class="card-body">
                            <p>The Pharmaceutical Inspection Co-operation Scheme (PIC/S) was established in 1995 as
                                an extension to the Pharmaceutical Inspection Convention (PIC) of 1970. PIC/S is a
                                non-binding co-operative arrangement between Regulatory Authorities in the field of
                                Good Manufacturing Practice (GMP) of medicinal products for human or veterinary use.
                                It is open to any Authority having a comparable GMP inspection system. PIC/S
                                comprises more than 50 Participating Authorities coming from all over the world
                                (Europe, Africa, America, Asia and Australasia). The exact list of PIC/S
                                Participating Authorities is available on the PIC/S web site (www.picscheme.org).
                                PIC/S aims at harmonising inspection procedures worldwide by developing common
                                standards in the field of GMP and by providing training opportunities to inspectors.
                                It also aims at facilitating co-operation and networking between competent
                                authorities, regional and international organisations, thus increasing mutual
                                confidence. This is reflected in PIC/S’ mission which reads as follows: “To lead the
                                international development, implementation and maintenance of harmonised GMP
                                standards and quality systems of inspectorates in the field of medicinal products.”
                            </p>
                        </div>
                    </div>
                </div>
                <!--/column -->
            </div> --}}
                {{-- Highights Programme --}}
                <div class="row text-center">
                    <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                        <h2 class="fs-16 text-uppercase text-muted mb-3">Highights Programme</h2>
                    </div>
                </div>
                <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                    <div class="col-sm-2 col-md-3 col-lg-2 mt-12">
                        <div class="bg-pale-leaf box-calendar">
                            <div class="month">
                                Nov
                            </div>
                            <div class="info">
                                <p class="day m-0">Wednesday</p>
                                <p class="date m-0">8</p>
                                <p class="year m-0">2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-9 col-lg-10 mt-12">
                        <div class="card bg-transparent">
                            <div class="card-body pl-5 pr-5 pt-3 pt-md-0 pb-3">
                                <span class="row justify-content-between align-items-center">
                                    <span class="col-sm-12 col-md-2 col-lg-1 mb-md-2">
                                        <span class="avatar bg-red text-white w-9 h-9 fs-17 me-3">IMG</span>
                                    </span>
                                    <span
                                        class="col-sm-12 col-md-10 col-lg-7 mb-2 d-flex align-items-center text-body">
                                        To be updated </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-clock me-1"></i> 09:00-10:45 </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-location-arrow me-1"></i> Room: 001 </span>
                                </span>
                            </div>
                        </div>
                        <div class="card bg-transparent">
                            <div class="card-body pl-5 pr-5 pt-3 pt-md-0 pb-3">
                                <span class="row justify-content-between align-items-center">
                                    <span class="col-sm-12 col-md-2 col-lg-1 mb-md-2">
                                        <span class="avatar bg-red text-white w-9 h-9 fs-17 me-3">IMG</span>
                                    </span>
                                    <span
                                        class="col-sm-12 col-md-10 col-lg-7 mb-2 d-flex align-items-center text-body">
                                        To be updated </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-clock me-1"></i> 09:00-10:45 </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-location-arrow me-1"></i> Room: 001 </span>
                                </span>
                            </div>
                        </div>
                        <div class="card bg-transparent">
                            <div class="card-body pl-5 pr-5 pt-3 pt-md-0 pb-3">
                                <span class="row justify-content-between align-items-center">
                                    <span class="col-sm-12 col-md-2 col-lg-1 mb-md-2">
                                        <span class="avatar bg-red text-white w-9 h-9 fs-17 me-3">IMG</span>
                                    </span>
                                    <span
                                        class="col-sm-12 col-md-10 col-lg-7 mb-2 d-flex align-items-center text-body">
                                        To be updated </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-clock me-1"></i> 09:00-10:45 </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-location-arrow me-1"></i> Room: 001 </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr class="m-3">
                    <div class="col-sm-2 col-md-3 col-lg-2 mt-0">
                        <div class="bg-pale-red box-calendar">
                            <div class="month">
                                Nov
                            </div>
                            <div class="info">
                                <p class="day m-0">Thursday</p>
                                <p class="date m-0">9</p>
                                <p class="year m-0">2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-9 col-lg-10 mt-0">
                        <div class="card bg-transparent">
                            <div class="card-body pl-5 pr-5 pt-3 pt-md-0 pb-3">
                                <span class="row justify-content-between align-items-center">
                                    <span class="col-sm-12 col-md-2 col-lg-1 mb-md-2">
                                        <span class="avatar bg-red text-white w-9 h-9 fs-17 me-3">IMG</span>
                                    </span>
                                    <span
                                        class="col-sm-12 col-md-10 col-lg-7 mb-2 d-flex align-items-center text-body">
                                        To be updated </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-clock me-1"></i> 09:00-10:45 </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-location-arrow me-1"></i> Room: 001 </span>
                                </span>
                            </div>
                        </div>
                        <div class="card bg-transparent">
                            <div class="card-body pl-5 pr-5 pt-3 pt-md-0 pb-3">
                                <span class="row justify-content-between align-items-center">
                                    <span class="col-sm-12 col-md-2 col-lg-1 mb-md-2">
                                        <span class="avatar bg-red text-white w-9 h-9 fs-17 me-3">IMG</span>
                                    </span>
                                    <span
                                        class="col-sm-12 col-md-10 col-lg-7 mb-2 d-flex align-items-center text-body">
                                        To be updated </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-clock me-1"></i> 09:00-10:45 </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-location-arrow me-1"></i> Room: 001 </span>
                                </span>
                            </div>
                        </div>
                        <div class="card bg-transparent">
                            <div class="card-body pl-5 pr-5 pt-3 pt-md-0 pb-3">
                                <span class="row justify-content-between align-items-center">
                                    <span class="col-sm-12 col-md-2 col-lg-1 mb-md-2">
                                        <span class="avatar bg-red text-white w-9 h-9 fs-17 me-3">IMG</span>
                                    </span>
                                    <span
                                        class="col-sm-12 col-md-10 col-lg-7 mb-2 d-flex align-items-center text-body">
                                        To be updated </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-clock me-1"></i> 09:00-10:45 </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-location-arrow me-1"></i> Room: 001 </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr class="m-3">
                    <div class="col-sm-2 col-md-3 col-lg-2 mt-0">
                        <div class="bg-pale-blue box-calendar">
                            <div class="month">
                                Nov
                            </div>
                            <div class="info">
                                <p class="day m-0">Friday</p>
                                <p class="date m-0">10</p>
                                <p class="year m-0">2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-9 col-lg-10 mt-0">
                        <div class="card bg-transparent">
                            <div class="card-body pl-5 pr-5 pt-3 pt-md-0 pb-3">
                                <span class="row justify-content-between align-items-center">
                                    <span class="col-sm-12 col-md-2 col-lg-1 mb-md-2">
                                        <span class="avatar bg-red text-white w-9 h-9 fs-17 me-3">IMG</span>
                                    </span>
                                    <span
                                        class="col-sm-12 col-md-10 col-lg-7 mb-2 d-flex align-items-center text-body">
                                        To be updated </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-clock me-1"></i> 09:00-10:45 </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-location-arrow me-1"></i> Room: 001 </span>
                                </span>
                            </div>
                        </div>
                        <div class="card bg-transparent">
                            <div class="card-body pl-5 pr-5 pt-3 pt-md-0 pb-3">
                                <span class="row justify-content-between align-items-center">
                                    <span class="col-sm-12 col-md-2 col-lg-1 mb-md-2">
                                        <span class="avatar bg-red text-white w-9 h-9 fs-17 me-3">IMG</span>
                                    </span>
                                    <span
                                        class="col-sm-12 col-md-10 col-lg-7 mb-2 d-flex align-items-center text-body">
                                        To be updated </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-clock me-1"></i> 09:00-10:45 </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-location-arrow me-1"></i> Room: 001 </span>
                                </span>
                            </div>
                        </div>
                        <div class="card bg-transparent">
                            <div class="card-body pl-5 pr-5 pt-3 pt-md-0 pb-3">
                                <span class="row justify-content-between align-items-center">
                                    <span class="col-sm-12 col-md-2 col-lg-1 mb-md-2">
                                        <span class="avatar bg-red text-white w-9 h-9 fs-17 me-3">IMG</span>
                                    </span>
                                    <span
                                        class="col-sm-12 col-md-10 col-lg-7 mb-2 d-flex align-items-center text-body">
                                        To be updated </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-clock me-1"></i> 09:00-10:45 </span>
                                    <span class="col-6 col-md-6 col-lg-2 text-body d-flex align-items-center">
                                        <i class="uil uil-location-arrow me-1"></i> Room: 001 </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden">
                <div class="divider text-light mx-n2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 92.26">
                        <path fill="currentColor"
                            d="M1206,21.2c-60-5-119-36.92-291-5C772,51.11,768,48.42,708,43.13c-60-5.68-108-29.92-168-30.22-60,.3-147,27.93-207,28.23-60-.3-122-25.94-182-36.91S30,5.93,0,16.2V92.26H1440v-87l-30,5.29C1348.94,22.29,1266,26.19,1206,21.2Z">
                        </path>
                    </svg>
                </div>
            </div>
            <!-- /.container -->
            {{-- footer
            <div class="container-fluid ps-0 pe-0 pt-5 pt-md-5">
                <div class="footer" style="background-image: url('{{ asset('img/footer.png') }}')">
                    <div class="container pt-5 pb-0">
                        <h4 class="text-white">Follow us on</h4>
                        <a href="">
                            <img src="{{ asset('img/facebook.png') }}" alt="" width="40px">
                        </a>
                        <a href="">
                            <img src="{{ asset('img/twitter.png') }}" alt="" width="40px">
                        </a>
                        <a href="">
                            <img src="{{ asset('img/line.png') }}" alt="" width="40px">
                        </a>
                        <a href="">
                            <img src="{{ asset('img/youtube.png') }}" alt="" width="40px">
                        </a>
                        <span class="copyright">Copyrights © 2023 All rights reserved by THAIFDA</span>
                    </div>
                </div>
            </div> --}}
        </section>
        <section class="wrapper bg-light">
            <div class="container pt-5">
                {{-- News Feed --}}
                <div class="row text-center">
                    <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                        <h2 class="fs-16 text-uppercase text-muted mb-3">News Feed</h2>
                    </div>
                </div>
                <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                    <div class="col-lg-4">
                        <div class="card shadow-lg">
                            <figure class="card-img-top overlay overlay-1"><a href="#">
                                    <img src="{{ asset('img/news-1.jpg') }}" srcset="{{ asset('img/news-1.jpg') }}"
                                        alt=""><span class="bg"></span></a>
                                <figcaption>
                                    <h5 class="from-top mb-0">Read More</h5>
                                </figcaption>
                            </figure>
                            <div class="card-body p-6">
                                <div class="post-header">
                                    {{-- <div class="post-category">
                                  <a href="#" class="hover" rel="category">Wedding</a>
                                </div> --}}
                                    <!-- /.post-category -->
                                    <h2 class="post-title h3 mt-1 mb-3 text-row"><a class="link-dark"
                                            href="./blog-post.html">
                                            {{ \Illuminate\Support\Str::limit('PIC/S Committee Meeting and Executive Bureau in Bangkok (Thailand)', $limit = 55, $end = '...') }}</a>
                                    </h2>
                                    <p>{{ \Illuminate\Support\Str::limit('The 53rd PIC/S Committee Meeting will take place in Bangkok (Thailand) on 6-7 November 2023 (beginning at 2 p.m. on the first day and finishing at 6 p.m. on the second day). PIC/S Committee Meetings are only open to Committee representatives of PIC/S Participating Authorities, PIC/S Applicants and Pre-Applicants, PIC/S Partners and invited Guests.', $limit = 180, $end = '...') }}
                                    </p>
                                </div>
                                <!-- /.post-header -->
                                <div class="post-footer">
                                    <ul class="post-meta d-flex mb-0">
                                        <li class="post-date"><i class="uil uil-calendar-alt"></i><span>14 Apr
                                                2022</span></li>
                                        <li class="post-comments"><a href="#"><i
                                                    class="uil uil-heart"></i>4</a></li>
                                    </ul>
                                    <!-- /.post-meta -->
                                </div>
                                <!-- /.post-footer -->
                            </div>
                            <!--/.card-body -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-lg">
                            <figure class="card-img-top overlay overlay-1"><a href="#">
                                    <img src="{{ asset('img/news-1.jpg') }}" srcset="{{ asset('img/news-2.jpg') }}"
                                        alt=""><span class="bg"></span></a>
                                <figcaption>
                                    <h5 class="from-top mb-0">Read More</h5>
                                </figcaption>
                            </figure>
                            <div class="card-body p-6">
                                <div class="post-header">
                                    {{-- <div class="post-category">
                                  <a href="#" class="hover" rel="category">Wedding</a>
                                </div> --}}
                                    <!-- /.post-category -->
                                    <h2 class="post-title h3 mt-1 mb-3 text-row"><a class="link-dark"
                                            href="./blog-post.html">
                                            {{ \Illuminate\Support\Str::limit('Bangkok celebrates 241st anniversary from 21-25 April 2023', $limit = 55, $end = '...') }}</a>
                                    </h2>
                                    <p>{{ \Illuminate\Support\Str::limit(
                                        'Bangkok, 7 April 2023 – The Ministry of Culture has announced a series of events and activities to celebrate the 241st anniversary of the establishment of Krung Rattanakosin or Krung Thep Mahanakhon (Bangkok), from 21-25 April 2023 at museums, temples and key landmarks in Rattanakosin Island or Bangkok’s Old Town.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                The event is organised to honour and commemorate the benevolence of Phra Bat Somdet Phra Phutthayotfa Chulalok Maharaj (King Rama I) – the founder of the Rattanakosin Kingdom and the first monarch of the Chakri Dynasty – and all the kings of the Chakri Dynasty.',
                                        $limit = 180,
                                        $end = '...',
                                    ) }}
                                    </p>
                                </div>
                                <!-- /.post-header -->
                                <div class="post-footer">
                                    <ul class="post-meta d-flex mb-0">
                                        <li class="post-date"><i class="uil uil-calendar-alt"></i><span>14 Apr
                                                2022</span></li>
                                        <li class="post-comments"><a href="#"><i
                                                    class="uil uil-heart"></i>4</a></li>
                                    </ul>
                                    <!-- /.post-meta -->
                                </div>
                                <!-- /.post-footer -->
                            </div>
                            <!--/.card-body -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-lg">
                            <figure class="card-img-top overlay overlay-1"><a href="#">
                                    <img src="{{ asset('img/news-1.jpg') }}" srcset="{{ asset('img/news-3.jpg') }}"
                                        alt=""><span class="bg"></span></a>
                                <figcaption>
                                    <h5 class="from-top mb-0">Read More</h5>
                                </figcaption>
                            </figure>
                            <div class="card-body p-6">
                                <div class="post-header">
                                    {{-- <div class="post-category">
                                  <a href="#" class="hover" rel="category">Wedding</a>
                                </div> --}}
                                    <!-- /.post-category -->
                                    <h2 class="post-title h3 mt-1 mb-3 text-row"><a class="link-dark"
                                            href="./blog-post.html">
                                            {{ \Illuminate\Support\Str::limit('Important information for passengers arriving from mainland China and India', $limit = 55, $end = '...') }}</a>
                                    </h2>
                                    <p>{{ \Illuminate\Support\Str::limit('Standard Operating Procedures concerning the Before Boarding, On Arrival, and During Stay stages of travel to Thailand. Bangkok, 27 January, 2023 – Passengers arriving in Thailand on international flights from mainland China and India are asked to please read and respectfully abide by the Standard Operating ', $limit = 180, $end = '...') }}
                                    </p>
                                </div>
                                <!-- /.post-header -->
                                <div class="post-footer">
                                    <ul class="post-meta d-flex mb-0">
                                        <li class="post-date"><i class="uil uil-calendar-alt"></i><span>14 Apr
                                                2022</span></li>
                                        <li class="post-comments"><a href="#"><i
                                                    class="uil uil-heart"></i>4</a></li>
                                    </ul>
                                    <!-- /.post-meta -->
                                </div>
                                <!-- /.post-footer -->
                            </div>
                            <!--/.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            {{-- footer --}}
            <div class="container-fluid ps-0 pe-0 pt-5 pt-md-5">
                <div class="footer" style="background-image: url('{{ asset('img/footer.png') }}')">
                    <div class="container pt-5 pb-0">
                        <h4 class="text-white">Follow us on</h4>
                        <a href="">
                            <img src="{{ asset('img/facebook.png') }}" alt="" width="40px">
                        </a>
                        <a href="">
                            <img src="{{ asset('img/twitter.png') }}" alt="" width="40px">
                        </a>
                        <a href="">
                            <img src="{{ asset('img/line.png') }}" alt="" width="40px">
                        </a>
                        <a href="">
                            <img src="{{ asset('img/youtube.png') }}" alt="" width="40px">
                        </a>
                        <span class="copyright">Copyrights © 2023 All rights reserved by THAIFDA</span>
                    </div>
                </div>
            </div>
        </section>
        {{--  --}}
    </div>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <!-- Plugin used-->
    {{-- @include('sweetalert::alert') --}}
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    <script>
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
    </script>
    @yield('script')
</body>

</html>
