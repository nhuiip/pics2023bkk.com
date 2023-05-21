@extends('layouts.app')

@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-news.jpg')])
    <section class="wrapper bg-light">
        <div class="container pt-10">
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <div class="col-lg-12">
                    <h3>{{ $data->name }}</h3>
                </div>
                <div class="col-lg-12">
                    <img src="{{ $data->image_url }}" alt="" class="w-100">
                </div>
                <div class="col-lg-12">
                    {!! str_replace("<p>&nbsp;</p>", "", $data->content) !!}
                </div>
            </div>
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                @include('layouts.components._news-layout', ['data' => $news])
            </div>
        </div>
    </section>
@endsection
