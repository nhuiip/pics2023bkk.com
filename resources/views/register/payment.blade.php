@extends('layouts.app')
@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-1.jpg')])
    <section class="wrapper bg-light">
        <div class="container pt-10">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success text-center">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger text-center">{{ session('error') }}</div>
                    @endif
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('img/logo.png') }}" alt="" class="w-100">
                </div>
                <div class="col-md-6">
                    <h1 class="mb-0">Confirmation of your Registration</h1>
                    <small>{{ $data->registrant_group }}, {{ $data->registration_type }}</small>
                    <hr class="my-3">
                    <p class="mb-1">Reference number: <strong>{{ $data->reference }}</strong></p>
                    <p class="mb-1">{{ $data->title }} {{ $data->first_name }}@if ($data->middle_name != null && $data->middle_name != '')
                            {{ $data->middle_name }}
                        @endif {{ $data->last_name }}</p>
                    <p class="mb-1">{{ $data->country }}, {{ $data->organization }}</p>
                    <hr class="my-3">
                    <div class="alert alert-success text-center">
                        <h1 class="mb-0">{{ $data->total }} USD</h1>
                    </div>
                    <hr class="my-3">
                    <input type="hidden" id="reference" value="{{ $data->reference }}">
                    <button class="btn btn-primary w-100" onclick="getPaylink()"
                        @if ($data->payment_status == 2) disabled @endif>
                        @if ($data->payment_status == 2)
                            Paid!
                        @else
                            Pay by credit card
                        @endif
                    </button>
                    <hr class="my-3">
                    <p>by bank transfer (charges to be borne by payer) in favour of:</p>
                    <p>Account Name: FOOD AND DRUG ADMINISTRATION FOUNDATION FOR PIC/S 2023</p>
                    <p>Account No: 142-0-32966-9</p>
                    <p>Bank: KRUNG THAI BANK PUBLIC COMPANY LIMITED</p>
                    <p>SWIFT Code: KRTHTHBK</p>
                    <p>Address: BANGKOK, THAILAND</p>
                    <p>Branch: Ministry of Public Health Tiwanon Branch (Branch Code 142) 88/20 1st Floor Block E Ministry
                        of Public Health Moo 4 Soi Bamrat Naradul, Tiwanon Road, Talat Khwan, Mueang Nonthaburi, Nonthaburi,
                        11000, THAILAND
                    </p>
                    <p>Account No: 142-0-32966-9</p>
                    <br>
                    <p>When your payment is completed, you will receive an email confirmation for further process. </p>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        function getPaylink() {
            let reference = $('#reference').val();
            $.ajax({
                url: "{{ route('payment.paylink') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    reference: reference
                },
                success: function(data) {
                    let resp = JSON.parse(data);
                    window.open(resp.payment_url, "_self");

                }
            });
        }
    </script>
@endsection
