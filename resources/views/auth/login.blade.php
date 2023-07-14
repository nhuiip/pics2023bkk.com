@extends('layouts.app')

@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-hotel.jpg')])
    <section class="wrapper bg-light">
        <div class="container pt-10">
            <div class="row">
                <div class="col-lg-7 col-xl-6 col-xxl-5 mx-auto pb-5">
                    <div class="card">
                        <div class="card-body p-11 text-center">
                            <h2 class="mb-3 text-start">Welcome Back</h2>
                            <p class="lead mb-6 text-start">Fill your email and password to sign in.</p>
                            <form class="text-start mb-3" method="POST" action="{{ route('login') }}" novalidate>
                                @csrf
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control" placeholder="Email" id="loginEmail"
                                        name="email">
                                    <label for="loginEmail">Email</label>
                                </div>
                                <div class="form-floating password-field mb-4">
                                    <input type="password" class="form-control" placeholder="Password" id="loginPassword"
                                        name="password">
                                    <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                    <label for="loginPassword">Password</label>
                                </div>
                                <button class="btn btn-primary rounded-pill btn-login w-100 mb-2" type="submit">Sign
                                    In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
