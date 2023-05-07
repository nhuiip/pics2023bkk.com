@extends('layouts.app')
@section('style')
    <style>
        .card-program {
            padding: 15px;
        }

        .card-program-date {
            text-align: center;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
        }

        .card-program-date p.month {
            font-size: 1rem;
            margin-bottom: 0;
        }

        .card-program-date p.day {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 0;
        }

        .item-inner {
            padding: 0.2rem 0.2rem;
        }
    </style>
@endsection
@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-program.jpg')])
    <section class="wrapper bg-light">
        <div class="container pt-10">
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <div class="col-md-6">
                    <h2 class="fs-16 text-uppercase text-muted mb-3">Program by Date</h2>
                    @foreach ($data as $key => $value)
                        <button type="button" class="btn btn-info" data-date="{{ $value['date']['date'] }}"
                            onclick="setDate(this)">{{ date('j M', strtotime($value['date']['date'])) }}</button>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h2 class="fs-16 text-uppercase text-muted mb-3">Search by Keywords</h2>
                    <input type="text" id="keyword" class="form-control" onkeypress="getData()" onkeyup="getData()"
                        onkeydown="getData()">
                </div>
                <hr style="margin-bottom: 0.5rem">
                <div id="data-programe" class="mt-0">

                </div>
            </div>
        </div>
        <input type="hidden" id="date" value="">
    </section>
@endsection
@section('script')
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script>
        getData()

        function getData() {
            let date = $('#date').val();
            let keyword = $('#keyword').val();

            $.ajax({
                type: 'POST',
                url: '{!! route('programs.jsondata') !!}',
                data: {
                    date: date,
                    keyword: keyword
                },
                success: function(data) {
                    $('#data-programe').html('')
                    let key = 0;
                    data.forEach(element => {
                        if (element.itemHighlight || element.item) {
                            let highlight = '';
                            let html = '';
                            if (element.itemHighlight) {
                                element.itemHighlight.forEach(item => {
                                    highlight += '<div class="swiper-slide">' +
                                        '<div class="item-inner">' +
                                        '<article>' +
                                        '<div class="card">' +
                                        '<div class="card-body">' +
                                        '<h2 class="post-title h3 text-row">' + item.name +
                                        '</h2>' +
                                        '<p>' + item.room + '</p>' +
                                        '<p class="m-0">' +
                                        moment(item.startTime).format('h:mm') +
                                        ' - ' + moment(item.endTime).format('h:mm') +
                                        '</p>' +
                                        '</div>' +
                                        '</div>' +
                                        '</article>' +
                                        '</div>' +
                                        '</div>'
                                })
                            }
                            if (element.item) {
                                element.item.forEach(item => {
                                    html += '<div class="swiper-slide">' +
                                        '<div class="item-inner">' +
                                        '<article>' +
                                        '<div class="card">' +
                                        '<div class="card-body">' +
                                        '<h2 class="post-title h3 text-row">' + item.name +
                                        '</h2>' +
                                        '<p>' + item.room + '</p>' +
                                        '<p class="m-0">' + moment(item.startTime).format(
                                            'h:mm') +
                                        ' - ' + moment(item.endTime).format('h:mm') + '</p>' +
                                        '</div>' +
                                        '</div>' +
                                        ' </article>' +
                                        '</div>' +
                                        '</div>'
                                })
                            }

                            $('#data-programe').append(
                                '<div class="card-program row">' +
                                '<div class="card-program-date col-sm-12 col-md-2 ' + element.date
                                .classBg + '">' +
                                '<p class="month m-0">' + moment(element.date.date).format('MMMM') +
                                '</p>' +
                                '<p class="day m-0">' + moment(element.date.date).format('D') +
                                '</p>' +
                                '</div>' +
                                '<div class="card-program-data col-sm-12 col-md-10">' +
                                '<div class="swiper-container swiper-' + key +
                                ' dots-closer blog grid-view" data-margin="0" data-dots="true" data-items-lg="1" data-items-md="1" data-items-xs="1">' +
                                '<div class="swiper">' +
                                '<div class="swiper-wrapper">' +
                                highlight +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="swiper-container swiper3col-' + key +
                                ' dots-closer blog grid-view" data-margin="0" data-dots="true" data-items-lg="3" data-items-md="3" data-items-xs="1">' +
                                '<div class="swiper">' +
                                '<div class="swiper-wrapper">' +
                                html +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            )
                        }
                    });
                    // console.log($('#data-programe').html());
                }
            });
        }

        function setDate(e) {
            let date = $(e).attr('data-date')
            $('#date').val(date);
            getData()
        }
    </script>
@endsection
