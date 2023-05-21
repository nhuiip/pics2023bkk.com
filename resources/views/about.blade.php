@extends('layouts.app')
@section('style')
    <style>
        p {
            margin: 0 !important;
        }
    </style>
@endsection
@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-aboutus.jpg')])
    <section class="wrapper bg-light">
        <div class="container pt-10">
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5" style="line-height: 1.5rem;">
                {{-- {!! str_replace('<p>&nbsp;</p>', '', $about->value) !!} --}}
                {!! $about->value !!}
            </div>
        </div>
    </section>
@endsection
