@extends('layouts.app')
@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-hotel.jpg')])
    <section class="wrapper bg-light">
        <div class="container pt-10">
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                @include('layouts.components._hotel-layout', ['data' => $hotel])
            </div>
        </div>
    </section>
@endsection
