@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css"
        integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-hotel.jpg')])
    <section class="wrapper bg-light">
        <div class="container pt-10">
            <div id="airport" class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <h2 class="text-uppercase text-muted text-primary">Arriving at Suvarnabhumi International Airport (BKK),
                    Bangkok-Samutprakarn, Thailand</h2>
                <div class="col-md-6">
                    <p class="text-info mb-0"><strong>Information that you may need at the Immigration control</strong></p>
                    <p>Hotel address to fill in the arrival card</p>
                    <p dir="ltr" class="mb-0">The Centara Grand at CentralWorld
                        999/99 Rama 1 Road, Pathumwan
                        Bangkok 10330, Thailand</p>
                    <p class="mb-0">Phone: <a href="tel:+66 2-100-1234">(+66) 2-100-1234</a></p>
                    <p class="mb-0">Fax: (+66) 2-100-1235</p>
                    <p class="mb-0"><a href="mailto:cgcwreservation@chr.co.th">cgcwreservation@chr.co.th</a></p>
                    <p><a
                            href="https://www.centarahotelsresorts.com/centaragrand/cgcw">https://www.centarahotelsresorts.com/centaragrand/cgcw</a>
                    </p>
                    <p><strong>***Please prepare the address information in case you have booked another place as the
                            immigration might deny the entry without the staying address information</strong></p>
                    <p class="mb-0">More advice information on: “Suvarnabhumi Airport Arrival Process”</p>
                    <p class="mb-0"><a
                            href="https://www.youtube.com/watch?v=qNcnpa7sq5c&feature=youtu.be">https://www.youtube.com/watch?v=qNcnpa7sq5c&feature=youtu.be</a>
                    </p>
                    <p>by the Airports of Thailand (AOT)</p>
                </div>
                <div class="col-md-6">
                    <img src="https://a.cdn-hotels.com/gdcs/production57/d186/bfddb8fa-84e2-47ef-8678-ac9d97080b6c.jpg"
                        alt="" class="w-100">
                </div>
            </div>
            <div id="money-exchange" class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <div class="col-md-4">
                    <img src="{{ asset('img/money-exhcnage.jpg') }}" class="w-100 img-thumbnail">
                </div>
                <div class="col-md-8">
                    <h2 class="text-uppercase text-muted text-primary">Money Exchange</h2>
                    <p dir="ltr">The airport has money exchange service where the best exchange rate mainly located on
                        the B floor
                        near the airport city link train station.
                        Currency using in Thailand is “Thai Baht (THB)” which approximately 34.58 THB = 1 USD (March 2023).
                    </p>
                    <p dir="ltr">Apart from the airport, you can easily find the Exchange service in shopping malls and
                        main tourist
                        places either from official Thai Banks or local exchange shops.
                    </p>
                </div>
            </div>
            <div id="weather-in-bangkok" class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <div class="col-md-12">
                    <h2 class="text-uppercase text-muted text-primary">Weather in Bangkok</h2>
                    <a class="weatherwidget-io" href="https://forecast7.com/en/13d76100d50/bangkok/" data-label_1="BANGKOK"
                        data-label_2="WEATHER" data-theme="original">BANGKOK WEATHER</a>
                </div>
            </div>
            <div id="sim-card" class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <div class="col-md-4">
                    <h2 class="text-uppercase text-muted text-primary">SIM card/Mobile data</h2>
                    <p dir="ltr">There are several mobile phone network service shops in the airport where you can get
                        a package of
                        short-term mobile data including phone call. The main network providers in Thailand that we
                        recommend are “AIS” and “true”.
                    </p>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2 p-0">
                    <img class="w-100" src="{{ asset('img/sim1.png') }}" srcset="{{ asset('img/sim1.png') }}"
                        alt="">
                </div>
                <div class="col-md-1 p-0">
                    <img class="w-100" src="{{ asset('img/sim2.png') }}" srcset="{{ asset('img/sim2.png') }}"
                        alt="">
                    <img class="w-100" src="{{ asset('img/sim3.png') }}" srcset="{{ asset('img/sim3.png') }}"
                        alt="">
                </div>
                <div class="col-md-1 p-0">
                    <img class="w-100" src="{{ asset('img/sim4.png') }}" srcset="{{ asset('img/sim4.png') }}"
                        alt="">
                    <img class="w-100" src="{{ asset('img/sim5.png') }}" srcset="{{ asset('img/sim5.png') }}"
                        alt="">
                </div>
                <div class="col-md-2 p-0">
                    <img class="w-100" src="{{ asset('img/sim6.png') }}" srcset="{{ asset('img/sim6.png') }}"
                        alt="">
                </div>
            </div>
            <div id="traveling" class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <div class="col-md-12">
                    <h2 class="text-uppercase text-muted text-primary">Travelling from the airport to the official hotel &
                        Venue</h2>
                    <p>There are 2 main transportations we recommend you to travel from the airport to hotel;
                    </p>
                    <img src="{{ asset('img/airport-transfer.png') }}" alt="" class="w-100 mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="text-info"><strong>Taxi/Limousine</strong></p>
                            <p dir="ltr">Outside the arrival building on the first floor you’ll see a “Public Taxi”
                                machines. Line up
                                at one machine to get a ticket that will inform you the parking lot number of your Taxi.
                                The cost of taxi according to standard meter plus 50 THB service fee. Additional toll fee
                                also charged from the passenger. The overall trip should cost around 500 - 800 THB.</p>
                            <p dir="ltr">Moreover, there are online taxis booking where you can book in advance and
                                they’re providing
                                the pick up service from the airport to your hotel. Please check some of these links below
                            </p>
                            <p dir="ltr" class="mb-0"><a href="https://www.limousine.in.th">www.limousine.in.th</a>
                            </p>
                            <p dir="ltr" class="mb-0"><a href="https://www.blacklane.com/en/">www.blacklane.com</a>
                            </p>
                            <p dir="ltr" class="mb-0"><a
                                    href="https://www.enjoytaxibangkok.com/">www.enjoytaxibangkok.com</a>
                            </p>
                            <p dir="ltr" class="mb-0"><a
                                    href="https://www.grab.com/th/en/transport/taxi/ ">www.grab.com/th/en/transport/taxi
                                </a></p>
                            <p dir="ltr"dir="ltr" class="mb-0"><a
                                    href="https://bolt.eu/en-th/cities/bangkok/">bolt.eu/en-th/cities/bangkok/</a></p>
                        </div>
                        <div class="col-md-4">
                            <p dir="ltr" class="text-info"><strong>Airport Rail Link (ARL) + BTS/MRT</strong></p>
                            <p dir="ltr">The Suvarnabhumi Airport Rail Link (ARL) provides speedy rail service from
                                the
                                airport to
                                central Bangkok. City Line commuter trains stop at eight stations.
                                To get to the Centara Grand at CentralWorld, we recommend you to take the ARL from
                                Suvarnabhumi Airport station (B floor) to Phaya Thai station. This takes around 40 minutes
                                and cost 45 THB.
                            </p>
                            <p dir="ltr">Then you have to change the train system from the ARL to BTS sky train
                                (Bangkok Mass Transit
                                System) from Phaya Thai to Siam or Chit Lom station (BTS Sukhumvit Line (Green line)) this
                                will cost around 28 THB with 10-minute transit. To check the map&price please sees
                                <a
                                    href="https://www.bts.co.th/eng/routemap.html">https://www.bts.co.th/eng/routemap.html</a>.
                                The hotel and meeting venue are located between Siam and Chit Lom BTS station with Skywalk
                                way access to the hotel.
                            </p>
                            <p dir="ltr">(Note: Public train transports are fast, cheap and reliable way, however we
                                recommend to
                                avoid using the train during peak hours of the working days; 8.00-10.00 AM & 17.00-19.00 PM
                                as it may packed and not convenience for a large luggage transfer)</p>
                        </div>
                        <div class="col-md-5">
                            <img src="{{ asset('img/BTS-MRT.png') }}" alt="" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
            <div id="official" class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <h2 class="text-uppercase text-muted text-primary">Official hotel</h2>
                @include('layouts.components._hotel-layout', ['data' => $official])
            </div>
            <div id="hotel" class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <h2 class="text-uppercase text-muted text-primary">Other surrounding hotel</h2>
                @include('layouts.components._hotel-layout', ['data' => $hotel])
            </div>
            <div id="electricity" class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <div class="col-md-12">
                    <h2 class="text-uppercase text-muted text-primary">Thailand uses 220V AC electricity</h2>
                    <img src="{{ asset('img/220v.jpg') }}" alt="" class="w-100">
                </div>
            </div>
            <div id="warnings" class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <div class="col-md-12">
                    <h2 class="text-uppercase text-muted text-primary">Bangkok Warnings and Dangers</h2>
                    <p dir="ltr">Bangkok is one of the most visited destinations in the world. Still, there are some
                        precautions you need to take while visiting Bangkok, as well as several warnings and dangers to be
                        aware of before you go.
                    </p>
                    <p class="text-info mb-0"><strong><u>Bangkok Taxis and Tuk-Tuk Scams</u></strong></p>
                    <p dir="ltr">There are two popular forms of transportation in Bangkok (apart from main public
                        transportation): taxis and tuk-tuks. Both are safe, but many tourists have reported taxi drivers not
                        turning on their meters. This is a common trick amongst scheming drivers. Ask your driver to turn on
                        the meter when you get in the vehicle, and refuse to take the ride if he or she refuses. Keep a map
                        with you and show it to the taxi driver to prevent the driver from taking a longer route than
                        necessary.
                        Tuk-tuks present a similar issue to travelers. They don’t use meters, so it’s important to agree to
                        a final price for the destination ahead of time. Also, ensure there will be no extra stops. Just as
                        when taking a Bangkok taxi, tuk-tuk riders should be vigilant. Bangkok tuk-tuks sometimes take
                        riders to clubs or restaurants that give them a commission for dropping off tourists.
                    </p>
                    <p class="text-info mb-0"><strong><u>Pickpockets in High-Traffic Areas</u></strong></p>
                    <p dir="ltr">Bangkok is generally considered a safe city, especially compared to other tourist
                        destinations in the region. But thieves and pickpockets will hide in plain sight in high-traffic
                        areas and strike if you’re not paying attention. Be sure to secure all your valuables and remain
                        vigilant when sightseeing. If you do, you shouldn’t have an issue.
                    </p>
                    <p class="text-info mb-0"><strong><u>The Pen Scam</u></strong></p>
                    <p dir="ltr">One common scam to look out for is the “pen” scam. During this trick, an individual
                        will ask you for a pen. The particularly clever ones will lead the conversation to where they need
                        to write down information. Then, when the mark reaches to take a pen out of their bag, a second
                        thief will sprint by and attempt to snatch the bag. Take extra caution with any stranger that
                        approaches you and starts a conversation.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"
        integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"
        integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let url = window.location.href
        let index = url.search("#");
        if (index) {
            let target = url.slice(index + 1)
            let el = document.getElementById(target);
            el.scrollIntoView(true);
        }
    </script>
    <script>
        ! function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://weatherwidget.io/js/widget.min.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, 'script', 'weatherwidget-io-js');
    </script>
@endsection
