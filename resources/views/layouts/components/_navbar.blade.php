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
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('news.index') }}">News</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('hotels.index') }}">Travel
                                and Accommodation</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link scroll" href="#airport">Arriving at
                                        Suvarnabhumi International Airport</a></li>
                                <li class="nav-item scroll"><a class="nav-link scroll" href="#money-exchange">Money Exchange</a>
                                </li>
                                <li class="nav-item scroll"><a class="nav-link scroll" href="#weather-in-bangkok">Weather in
                                        Bangkok</a></li>
                                <li class="nav-item scroll"><a class="nav-link scroll" href="#sim-card">SIM card/Mobile
                                        data</a></li>
                                <li class="nav-item scroll"><a class="nav-link scroll" href="#traveling">Traveling from the
                                        airport to the hotel</a></li>
                                <li class="nav-item scroll"><a class="nav-link scroll" href="#hotel">Official hotel</a>
                                </li>
                                <li class="nav-item scroll"><a class="nav-link scroll" href="#220v">Thailand uses 220V
                                        AC electricity</a></li>
                                <li class="nav-item scroll"><a class="nav-link scroll" href="#warnings">Bangkok Warnings
                                        and Dangers</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('programs.index') }}">Programme</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pricing.index') }}">Registration & Fee</a>
                            {{-- <a class="nav-link" href="#">Registration & Fee</a> --}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About us</a>
                        </li>
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="{{ route('login') }}">Member Login</a> --}}
                            <a class="nav-link" href="#">Member Login</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="navbar-other w-100 d-flex ms-auto">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item d-lg-none">
                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
