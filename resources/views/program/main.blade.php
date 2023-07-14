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
                    console.log(data);
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
                                        '<a href="/programs/' + item.id + '">' +
                                        '<h2 class="post-title h3 text-row">' + item.name +
                                        '</h2>' +
                                        '</a>' +
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
                                console.log("element.item", element.item);
                                element.item.forEach(item => {
                                    html += '<div class="swiper-slide">' +
                                        '<div class="item-inner">' +
                                        '<article>' +
                                        '<div class="card">' +
                                        '<div class="card-body">' +
                                        '<a href="/programs/' + item.id + '">' +
                                        '<h2 class="post-title h3 text-row">' + item.name +
                                        '</h2>' +
                                        '</a>' +
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
                                '<div class="swiper-container swiper-' + key +
                                ' dots-closer blog grid-view" data-margin="0" data-dots="true" data-items-lg="3" data-items-md="3" data-items-xs="2">' +
                                '<div class="swiper">' +
                                '<div class="swiper-wrapper">' +
                                html +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            )
                            key++;

                            var carousel = document.querySelectorAll('.swiper-container');
                            for (var i = 0; i < carousel.length; i++) {
                                var slider1 = carousel[i];
                                slider1.classList.add('swiper-container-' + i);
                                var controls = document.createElement('div');
                                controls.className = "swiper-controls";
                                var pagi = document.createElement('div');
                                pagi.className = "swiper-pagination";
                                var navi = document.createElement('div');
                                navi.className = "swiper-navigation";
                                var prev = document.createElement('div');
                                prev.className = "swiper-button swiper-button-prev";
                                var next = document.createElement('div');
                                next.className = "swiper-button swiper-button-next";
                                slider1.appendChild(controls);
                                controls.appendChild(navi);
                                navi.appendChild(prev);
                                navi.appendChild(next);
                                controls.appendChild(pagi);
                                var sliderEffect = slider1.getAttribute('data-effect') ? slider1
                                    .getAttribute('data-effect') : 'slide';
                                if (slider1.getAttribute('data-items-auto') === 'true') {
                                    var slidesPerViewInit = "auto";
                                    var breakpointsInit = null;
                                } else {
                                    var sliderItems = slider1.getAttribute('data-items') ? slider1
                                        .getAttribute('data-items') : 3; // items in all devices
                                    var sliderItemsXs = slider1.getAttribute('data-items-xs') ? slider1
                                        .getAttribute('data-items-xs') : 1; // start - 575
                                    var sliderItemsSm = slider1.getAttribute('data-items-sm') ? slider1
                                        .getAttribute('data-items-sm') : Number(
                                            sliderItemsXs); // 576 - 767
                                    var sliderItemsMd = slider1.getAttribute('data-items-md') ? slider1
                                        .getAttribute('data-items-md') : Number(
                                            sliderItemsSm); // 768 - 991
                                    var sliderItemsLg = slider1.getAttribute('data-items-lg') ? slider1
                                        .getAttribute('data-items-lg') : Number(
                                            sliderItemsMd); // 992 - 1199
                                    var sliderItemsXl = slider1.getAttribute('data-items-xl') ? slider1
                                        .getAttribute('data-items-xl') : Number(
                                            sliderItemsLg); // 1200 - end
                                    var sliderItemsXxl = slider1.getAttribute('data-items-xxl') ?
                                        slider1.getAttribute('data-items-xxl') : Number(
                                            sliderItemsXl); // 1500 - end
                                    var slidesPerViewInit = sliderItems;
                                    var breakpointsInit = {
                                        0: {
                                            slidesPerView: Number(sliderItemsXs)
                                        },
                                        576: {
                                            slidesPerView: Number(sliderItemsSm)
                                        },
                                        768: {
                                            slidesPerView: Number(sliderItemsMd)
                                        },
                                        992: {
                                            slidesPerView: Number(sliderItemsLg)
                                        },
                                        1200: {
                                            slidesPerView: Number(sliderItemsXl)
                                        },
                                        1400: {
                                            slidesPerView: Number(sliderItemsXxl)
                                        }
                                    }
                                }

                                var sliderSpeed = slider1.getAttribute('data-speed') ? slider1
                                    .getAttribute('data-speed') : 500;
                                var sliderAutoPlay = slider1.getAttribute('data-autoplay') !== 'false';
                                var sliderAutoPlayTime = slider1.getAttribute('data-autoplaytime') ?
                                    slider1.getAttribute('data-autoplaytime') : 5000;
                                var sliderAutoHeight = slider1.getAttribute('data-autoheight') ===
                                    'true';
                                var sliderResizeUpdate = slider1.getAttribute('data-resizeupdate') !==
                                    'false';
                                var sliderAllowTouchMove = slider1.getAttribute('data-drag') !==
                                    'false';
                                var sliderReverseDirection = slider1.getAttribute('data-reverse') ===
                                    'true';
                                var sliderMargin = slider1.getAttribute('data-margin') ? slider1
                                    .getAttribute('data-margin') : 30;
                                var sliderLoop = slider1.getAttribute('data-loop') === 'true';
                                var sliderCentered = slider1.getAttribute('data-centered') === 'true';
                                var swiper = slider1.querySelector('.swiper:not(.swiper-thumbs)');
                                var swiperTh = slider1.querySelector('.swiper-thumbs');
                                var sliderTh = new Swiper(swiperTh, {
                                    slidesPerView: 5,
                                    spaceBetween: 10,
                                    loop: false,
                                    threshold: 2,
                                    slideToClickedSlide: true,
                                    observer: true
                                });
                                if (slider1.getAttribute('data-thumbs') === 'true') {
                                    var thumbsInit = sliderTh;
                                    var swiperMain = document.createElement('div');
                                    swiperMain.className = "swiper-main";
                                    swiper.parentNode.insertBefore(swiperMain, swiper);
                                    swiperMain.appendChild(swiper);
                                    slider1.removeChild(controls);
                                    swiperMain.appendChild(controls);
                                } else {
                                    var thumbsInit = null;
                                }
                                var slider = new Swiper(swiper, {
                                    on: {
                                        beforeInit: function() {
                                            if (slider1.getAttribute('data-nav') !==
                                                'true' && slider1.getAttribute(
                                                    'data-dots') !== 'true') {
                                                controls.remove();
                                            }
                                            if (slider1.getAttribute('data-dots') !==
                                                'true') {
                                                pagi.remove();
                                            }
                                            if (slider1.getAttribute('data-nav') !==
                                                'true') {
                                                navi.remove();
                                            }
                                        },
                                        init: function() {
                                            if (slider1.getAttribute('data-autoplay') !==
                                                'true') {
                                                this.autoplay.stop();
                                            }
                                            this.update();
                                        }
                                    },
                                    autoplay: {
                                        delay: sliderAutoPlayTime,
                                        disableOnInteraction: false,
                                        reverseDirection: sliderReverseDirection,
                                        pauseOnMouseEnter: false
                                    },
                                    allowTouchMove: sliderAllowTouchMove,
                                    speed: parseInt(sliderSpeed),
                                    slidesPerView: slidesPerViewInit,
                                    loop: sliderLoop,
                                    centeredSlides: sliderCentered,
                                    spaceBetween: Number(sliderMargin),
                                    effect: sliderEffect,
                                    autoHeight: sliderAutoHeight,
                                    grabCursor: true,
                                    resizeObserver: false,
                                    observer: true,
                                    updateOnWindowResize: sliderResizeUpdate,
                                    breakpoints: breakpointsInit,
                                    pagination: {
                                        el: carousel[i].querySelector('.swiper-pagination'),
                                        clickable: true
                                    },
                                    navigation: {
                                        prevEl: slider1.querySelector('.swiper-button-prev'),
                                        nextEl: slider1.querySelector('.swiper-button-next'),
                                    },
                                    thumbs: {
                                        swiper: thumbsInit,
                                    },
                                });
                            }
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
