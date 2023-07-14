@extends('layouts.app')
@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-register.jpg')])

    <section class="wrapper bg-light">
        <div class="container pt-10">
            <div class="pricing-wrapper position-relative pt-5 pb-15">
                <div class="shape bg-dot primary rellax w-16 h-18" data-rellax-speed="1"
                    style="top: 2rem; right: -2.4rem; transform: translate3d(0px, 0px, 0px);"></div>
                <div class="shape rounded-circle bg-line red rellax w-18 h-18 d-none d-lg-block" data-rellax-speed="1"
                    style="bottom: 2.5rem; left: -2.5rem; transform: translate3d(0px, 41px, 0px);"></div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs nav-tabs-basic" role="tablist">
                            @foreach ($data as $key => $value)
                                <li class="nav-item" role="presentation"> <a
                                        class="nav-link @if ($key == 0) active @endif"
                                        data-bs-toggle="tab" href="#tab3-{{ $value->id }}" aria-selected="true"
                                        role="tab">{{ $value->name }}</a> </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content mt-0 mt-md-5">
                        @foreach ($data as $key => $value)
                            @php
                                $type = App\Models\RegistrantType::all();
                            @endphp
                            <div class="tab-pane fade @if ($key == 0) active show @endif"
                                id="tab3-{{ $value->id }}" role="tabpanel">
                                <div class="row gy-6 mt-3 mt-md-5">
                                    @php
                                        $hasData = App\Models\RegistrationFee::where(['registrantGroupId' => $value->id, 'registrationRateId' => 2, 'price' => 0])->count();
                                        $class = $hasData == 1 ? 'col-lg-4' : 'col-lg-3';
                                    @endphp
                                    @foreach ($type as $key => $item)
                                        @php
                                            // $earlybird = App\Models\RegistrationFee::where(['registrantGroupId' => $value->id, 'registrantTypeId' => $item->id, 'registrationRateId' => 1])->first();
                                            $standard = App\Models\RegistrationFee::where(['registrantGroupId' => $value->id, 'registrantTypeId' => $item->id, 'registrationRateId' => 2])->first();
                                        @endphp
                                        @if ($standard->price != 0)
                                            <div class="col-md-6 {{ $class }}">
                                                <div class="pricing card text-center">
                                                    <div class="card-body" style="padding:2rem 1rem">
                                                        <img src="{{ $item->image_url }}"
                                                            class="icon-svg icon-svg-md text-primary mb-3" alt="">
                                                        <h4 class="card-title">
                                                            @if ($item->id != 4)
                                                                {{ $item->name }}
                                                            @else
                                                                Non-PIC/S<br>Members
                                                            @endif
                                                        </h4>
                                                        <div class="prices text-dark mb-5">
                                                            <div class="price price-show"><span
                                                                    class="price-currency">$</span><span
                                                                    class="price-value">{{ $standard->price }}</span></div>
                                                        </div>
                                                        {{-- <a href="{{ route('register.index', ['registrantGroupId' => $value->id, 'registrantTypeId' => $item->id]) }}"
                                                            class="btn btn-primary rounded-pill">Choose Plan</a> --}}
                                                        <a href="#" class="btn btn-primary rounded-pill">Choose
                                                            Plan</a>
                                                    </div>
                                                    <!--/.card-body -->
                                                </div>
                                                <!--/.pricing -->
                                            </div>
                                        @endif
                                    @endforeach
                                    <!--/column -->
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
