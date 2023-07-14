@extends('layouts.app')
@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-program.jpg')])
    <section class="wrapper bg-light">
        <div class="container pt-10">
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <div class="col-md-12 text-center">
                    <h1 class="mb-0">{{ $data->name }}</h1>
                    <p class="mb-0">Room: {{ $data->room }}</p>
                    <p>Date: {{ date('Y-m-d', strtotime($data->date)) }}
                        {{ date('H:i', strtotime($data->startTime)) }}-{{ date('H:i', strtotime($data->endTime)) }}</p>
                    <hr class="my-3">
                </div>
                @auth
                    <div class="col-md-4 mt-0">
                        <h3>Attachment :</h3>
                        @if (count($attachment) == 0)
                            <figcaption class="blockquote-footer">No attachment</figcaption>
                        @else
                            <ul class="icon-list bullet-primary">
                                @foreach ($attachment as $value)
                                    <li><a href="{{ $value->file_url }}" download><span><i
                                                    class="uil uil-arrow-right"></i></span><span>{{ $value->name }}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="col-md-8 mt-0">

                    </div>
                @endauth
                @guest
                    <div class="col-md-12 mt-0">

                    </div>
                @endguest

            </div>
        </div>
    </section>
@endsection
