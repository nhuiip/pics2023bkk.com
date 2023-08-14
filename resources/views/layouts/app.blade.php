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

        .nav-link {
            padding: 0.5rem 1rem;
        }

        .progress-wrap:after {
            content: "\ebfe" !important;
        }

        /* end */
    </style>
    @yield('style')
</head>

<body>
    <div class="content-wrapper" id="app">
        @include('layouts.components._navbar')
        @yield('content')
        @include('layouts.components._footer')
        <div class="progress-wrap active-progress" onclick="contact(this)" data-url="{{ route('contact') }}">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                    style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 204.992;">
                </path>
            </svg>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script type="text/javascript" src=""></script> --}}

    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <!-- Plugin used-->
    {{-- @include('sweetalert::alert') --}}
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function favorite(e) {
            let id = $(e).attr('data-id');
            let url = $(e).attr('data-url');
            let favorite = $(e).attr('data-favorite');
            $.ajax({
                url: url,
                type: "PUT",
                data: {
                    favorite: parseInt(favorite) + 1,
                },
                success: function(data, textStatus, jqXHR) {
                    $('.a-favorite-id-' + id).attr('data-favorite', data)
                    $('.favorite-id-' + id).html(data);
                },
            });
        }
    </script>
    <script>
        $('#modalAnnouncement').on('hidden.bs.modal', function() {
            // localStorage.setItem('displayPopup', 'true');
            var expires;
            var days = 1
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
            } else {
                expires = "";
            }
            document.cookie = "displayPopup" + "=" + "true" + expires + "; path=/";
        })
    </script>
    <script>
        function contact(e) {
            let url = $(e).attr('data-url');
            location.href = url;
        }

        function sendPassword(e) {
            let url = "{!! route('sent-password') !!}";
            let token = $('meta[name="csrf-token"]').attr('content');

            Swal.fire({
                title: 'Please enter the email you used to apply.',
                input: 'email',
                inputAttributes: {
                    autocapitalize: 'on'
                },
                showCancelButton: true,
                confirmButtonText: 'Submit',
                cancelButtonText: 'Cancel',
                showLoaderOnConfirm: true,
                preConfirm: (email) => {
                    return $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: token,
                            email: email
                        },
                        success: function(response) {
                            if (response == true) {
                                return response;
                            } else {
                                Swal.showValidationMessage(response);
                            }
                        }
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Your password has been sent again.',
                        showConfirmButton: false,
                        timer: 2000
                    })
                } else {
                    Swal.close();
                }
            })
        }
    </script>
    @yield('script')
</body>

</html>
