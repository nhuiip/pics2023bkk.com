@extends('layouts.app')
@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-1.jpg')])
    {{-- 1 --}}
    <section class="wrapper bg-light">
        <div class="container pt-5">
            {{-- Announcement --}}
            <div class="row text-center">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <h2 class="fs-16 text-uppercase text-muted mb-3">Announcement</h2>
                </div>
            </div>
            <div class="swiper-container dots-closer blog grid-view mb-3 mb-xl-10" data-margin="0" data-dots="true"
                data-items-md="1" data-items-xs="1">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($announcement as $key => $value)
                            <div class="swiper-slide">
                                <div class="item-inner p-0">
                                    <article>
                                        <div class="card bg-transparent">
                                            <div class="card-body row p-0">
                                                <div class="col-lg-6">
                                                    <figure class="card-img-top overlay overlay-1"><a
                                                            href="{{ route('news.show', $value->id) }}">
                                                            <img src="{{ $value->image_url }}"
                                                                srcset="{{ $value->image_url }}" alt=""><span
                                                                class="bg"></span></a>
                                                        <figcaption>
                                                            <h5 class="from-top mb-0">Read More</h5>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                                <div class="col-lg-6">
                                                    <p><strong>{{ $value->name }}</strong></p>
                                                    {!! \Illuminate\Support\Str::limit($value->content, $limit = 800, $end = '...') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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
                            {!! $quote->value !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- 2 --}}
    <section class="wrapper bg-light">
        <div class="container pt-5">
            <div class="row text-center">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <h2 class="fs-16 text-uppercase text-muted mb-3">Highights Programme</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper bg-gradient-blend mt-2">
        <div class="w-100 in-bg-gradient-blend" style="background-image: url('{{ asset('img/bg.png') }}')">

        </div>
        <div class="container pt-0 pt-md-5">
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5 mt-1">
                @foreach ($program as $key => $data)
                    <div class="col-sm-2 col-md-3 col-lg-2 mt-0">
                        <div class="{{ $data['date']['classBg'] }} box-calendar">
                            <div class="month">
                                {{ date('M', strtotime($data['date']['date'])) }}
                            </div>
                            <div class="info">
                                <p class="day m-0">{{ date('l', strtotime($data['date']['date'])) }}</p>
                                <p class="date m-0">{{ date('j', strtotime($data['date']['date'])) }}</p>
                                <p class="year m-0">{{ date('Y', strtotime($data['date']['date'])) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-9 col-lg-10 mt-0">
                        @foreach ($data['item'] as $item)
                            <div class="card bg-transparent">
                                <div class="card-body pl-5 pr-5 pt-3 pt-md-0 pb-3">
                                    <span class="row justify-content-between align-items-center">
                                        <span
                                            class="col-sm-12 col-md-12 col-lg-12 mb-2 d-flex align-items-center text-body">
                                            {{ $item->name }} </span>
                                        <span class="col-12 col-md-12 col-lg-12 text-body d-flex align-items-center">
                                            <i class="uil uil-location-arrow me-1"></i> Room: {{ $item->room }} </span>
                                        <span class="col-12 col-md-12 col-lg-12 text-body d-flex align-items-center">
                                            <i class="uil uil-clock me-1"></i> {{ date('h:i', strtotime($item->startTime)).' - '.date('h:i', strtotime($item->endTime)) }} </span>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($key != count($program) - 1)
                        <hr class="m-3">
                    @endif
                @endforeach
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
    </section>
    {{-- 3 --}}
    <section class="wrapper bg-light">
        <div class="container pt-5">
            {{-- News Feed --}}
            <div class="row text-center">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <h2 class="fs-16 text-uppercase text-muted mb-3">News Feed</h2>
                </div>
            </div>
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                @include('layouts.components._news-layout', ['data' => $news])
            </div>
        </div>
    </section>
@endsection
