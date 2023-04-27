@extends('layouts.app')
@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-hotel.jpg')])

    <section class="wrapper bg-light">
        <div class="container pt-10">
            <div class="pricing-wrapper position-relative pt-5 pb-15">
                <div class="shape bg-dot primary rellax w-16 h-18" data-rellax-speed="1"
                    style="top: 2rem; right: -2.4rem; transform: translate3d(0px, 0px, 0px);"></div>
                <div class="shape rounded-circle bg-line red rellax w-18 h-18 d-none d-lg-block" data-rellax-speed="1"
                    style="bottom: 2.5rem; left: -2.5rem; transform: translate3d(0px, 41px, 0px);"></div>
                <div class="row">
                    <div class="col-md-8">
                        <ul class="nav nav-tabs nav-tabs-basic" role="tablist">
                            <li class="nav-item" role="presentation"> <a class="nav-link active" data-bs-toggle="tab"
                                    href="#tab3-1" aria-selected="true" role="tab">PIC/S Seminar Only</a> </li>
                            <li class="nav-item" role="presentation"> <a class="nav-link" data-bs-toggle="tab"
                                    href="#tab3-2" aria-selected="false" role="tab" tabindex="-1">PIC/S Committee
                                    Only</a> </li>
                            <li class="nav-item" role="presentation"> <a class="nav-link" data-bs-toggle="tab"
                                    href="#tab3-3" aria-selected="false" role="tab" tabindex="-1">PIC/S Seminar and
                                    Comittee</a> </li>
                        </ul>
                    </div>
                    <div class="col-md-4"
                        style="
                    display: flex;
                    flex-direction: column;
                    flex-wrap: nowrap;
                    justify-content: center;
                ">
                        <div class="pricing-switcher-wrapper switcher">
                            <p class="mb-0 pe-3">Early Bird</p>
                            <div class="pricing-switchers">
                                <div class="pricing-switcher pricing-switcher-active"></div>
                                <div class="pricing-switcher"></div>
                                <div class="switcher-button bg-primary"></div>
                            </div>
                            <p class="mb-0 ps-3">Regular</p>
                        </div>
                    </div>
                    <div class="tab-content mt-0 mt-md-5">
                        <div class="tab-pane fade active show" id="tab3-1" role="tabpanel">
                            <div class="row gy-6 mt-3 mt-md-5">
                                <div class="col-md-6 col-lg-4">
                                    <div class="pricing card text-center">
                                        <div class="card-body">
                                            <img src="{{ asset('img/member-red.jpg') }}"
                                                class="icon-svg icon-svg-md text-primary mb-3" alt="">
                                            <h4 class="card-title">PIC/S Participating Authorities</h4>
                                            <div class="prices text-dark mb-5">
                                                <div class="price price-show"><span class="price-currency">$</span><span
                                                        class="price-value">685</span></div>
                                                <div class="price price-hide price-hidden"><span
                                                        class="price-currency">$</span><span class="price-value">745</span>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary rounded-pill">Choose Plan</a>
                                        </div>
                                        <!--/.card-body -->
                                    </div>
                                    <!--/.pricing -->
                                </div>
                                <!--/column -->
                                <div class="col-md-6 col-lg-4 popular">
                                    <div class="pricing card text-center">
                                        <div class="card-body">
                                            <img src="{{ asset('img/member-blue.jpg') }}"
                                                class="icon-svg icon-svg-md text-primary mb-3" alt="">
                                            <h4 class="card-title">PIC/S Pre-Applicants & Appllicants
                                            </h4>
                                            <div class="prices text-dark mb-5">
                                                <div class="price price-show"><span class="price-currency">$</span><span
                                                        class="price-value">1,010</span></div>
                                                <div class="price price-hide price-hidden"><span
                                                        class="price-currency">$</span><span
                                                        class="price-value">1,100</span>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary rounded-pill">Choose Plan</a>
                                        </div>
                                        <!--/.card-body -->
                                    </div>
                                    <!--/.pricing -->
                                </div>
                                <!--/column -->
                                <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-0">
                                    <div class="pricing card text-center">
                                        <div class="card-body">
                                            <img src="{{ asset('img/member-green.jpg') }}"
                                                class="icon-svg icon-svg-md text-primary mb-3" alt="">
                                            <h4 class="card-title">NON PIC/S Members / Associated Partners

                                            </h4>
                                            <div class="prices text-dark mb-5">
                                                <div class="price price-show"><span class="price-currency">$</span><span
                                                        class="price-value">1,010</span></div>
                                                <div class="price price-hide price-hidden"><span
                                                        class="price-currency">$</span><span
                                                        class="price-value">1,160</span>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary rounded-pill">Choose Plan</a>
                                        </div>
                                        <!--/.card-body -->
                                    </div>
                                    <!--/.pricing -->
                                </div>
                                <!--/column -->
                            </div>
                        </div>
                        <!--/.tab-pane -->
                        <div class="tab-pane fade" id="tab3-2" role="tabpanel">
                            <div class="row gy-6 mt-3 mt-md-5">
                                <div class="col-md-6 col-lg-4">
                                    <div class="pricing card text-center">
                                        <div class="card-body">
                                            <img src="{{ asset('img/member-red.jpg') }}"
                                                class="icon-svg icon-svg-md text-primary mb-3" alt="">
                                            <h4 class="card-title">PIC/S Participating Authorities</h4>
                                            <div class="prices text-dark mb-5">
                                                <div class="price price-show"><span class="price-currency">$</span><span
                                                        class="price-value">285</span></div>
                                                <div class="price price-hide price-hidden"><span
                                                        class="price-currency">$</span><span
                                                        class="price-value">305</span>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary rounded-pill">Choose Plan</a>
                                        </div>
                                        <!--/.card-body -->
                                    </div>
                                    <!--/.pricing -->
                                </div>
                                <!--/column -->
                                <div class="col-md-6 col-lg-4 popular">
                                    <div class="pricing card text-center">
                                        <div class="card-body">
                                            <img src="{{ asset('img/member-blue.jpg') }}"
                                                class="icon-svg icon-svg-md text-primary mb-3" alt="">
                                            <h4 class="card-title">PIC/S Pre-Applicants & Appllicants
                                            </h4>
                                            <div class="prices text-dark mb-5">
                                                <div class="price price-show"><span class="price-currency">$</span><span
                                                        class="price-value">310</span></div>
                                                <div class="price price-hide price-hidden"><span
                                                        class="price-currency">$</span><span
                                                        class="price-value">330</span>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary rounded-pill">Choose Plan</a>
                                        </div>
                                        <!--/.card-body -->
                                    </div>
                                    <!--/.pricing -->
                                </div>
                                <!--/column -->
                                <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-0">
                                    <div class="pricing card text-center">
                                        <div class="card-body">
                                            <img src="{{ asset('img/member-green.jpg') }}"
                                                class="icon-svg icon-svg-md text-primary mb-3" alt="">
                                            <h4 class="card-title">NON PIC/S Members / Associated Partners

                                            </h4>
                                            <div class="prices text-dark mb-5">
                                                <div class="price price-show"><span class="price-currency">$</span><span
                                                        class="price-value">310</span></div>
                                                <div class="price price-hide price-hidden"><span
                                                        class="price-currency">$</span><span
                                                        class="price-value">390</span>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary rounded-pill">Choose Plan</a>
                                        </div>
                                        <!--/.card-body -->
                                    </div>
                                    <!--/.pricing -->
                                </div>
                                <!--/column -->
                            </div>
                        </div>
                        <!--/.tab-pane -->
                        <div class="tab-pane fade" id="tab3-3" role="tabpanel">
                            <div class="row gy-6 mt-3 mt-md-5">
                                <div class="col-md-6 col-lg-4">
                                    <div class="pricing card text-center">
                                        <div class="card-body">
                                            <img src="{{ asset('img/member-red.jpg') }}"
                                                class="icon-svg icon-svg-md text-primary mb-3" alt="">
                                            <h4 class="card-title">PIC/S Participating Authorities</h4>
                                            <div class="prices text-dark mb-5">
                                                <div class="price price-show"><span class="price-currency">$</span><span
                                                        class="price-value">970</span></div>
                                                <div class="price price-hide price-hidden"><span
                                                        class="price-currency">$</span><span
                                                        class="price-value">1,050</span>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary rounded-pill">Choose Plan</a>
                                        </div>
                                        <!--/.card-body -->
                                    </div>
                                    <!--/.pricing -->
                                </div>
                                <!--/column -->
                                <div class="col-md-6 col-lg-4 popular">
                                    <div class="pricing card text-center">
                                        <div class="card-body">
                                            <img src="{{ asset('img/member-blue.jpg') }}"
                                                class="icon-svg icon-svg-md text-primary mb-3" alt="">
                                            <h4 class="card-title">PIC/S Pre-Applicants & Appllicants
                                            </h4>
                                            <div class="prices text-dark mb-5">
                                                <div class="price price-show"><span class="price-currency">$</span><span
                                                        class="price-value">1,320</span></div>
                                                <div class="price price-hide price-hidden"><span
                                                        class="price-currency">$</span><span
                                                        class="price-value">1,430</span>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary rounded-pill">Choose Plan</a>
                                        </div>
                                        <!--/.card-body -->
                                    </div>
                                    <!--/.pricing -->
                                </div>
                                <!--/column -->
                                <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-0">
                                    <div class="pricing card text-center">
                                        <div class="card-body">
                                            <img src="{{ asset('img/member-green.jpg') }}"
                                                class="icon-svg icon-svg-md text-primary mb-3" alt="">
                                            <h4 class="card-title">NON PIC/S Members / Associated Partners

                                            </h4>
                                            <div class="prices text-dark mb-5">
                                                <div class="price price-show"><span class="price-currency">$</span><span
                                                        class="price-value">1,320</span></div>
                                                <div class="price price-hide price-hidden"><span
                                                        class="price-currency">$</span><span
                                                        class="price-value">1,550</span>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary rounded-pill">Choose Plan</a>
                                        </div>
                                        <!--/.card-body -->
                                    </div>
                                    <!--/.pricing -->
                                </div>
                                <!--/column -->
                            </div>
                        </div>
                        <!--/.tab-pane -->
                    </div>
                </div>

                <!--/.row -->
            </div>
        </div>
    </section>
@endsection
