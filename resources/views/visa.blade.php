@extends('layouts.app')
@section('styles')
    {{-- <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css"> --}}
    {{-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    {{-- <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@endsection
@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-1.jpg')])
    <section class="wrapper bg-light">
        <div class="container pt-10">
            <form action="{{ route('visastore') }}" method="POST" class="form-horizontal" novalidate>
                @csrf
                <input type="hidden" name="memberId" value="{{ Auth::user()->id }}">
                <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                    <div class="col-12 text-center">
                        <h2 class="display-4 mb-3">Visa Invitation Form</h2>
                    </div>
                    <div class="col-12 m-0 form-group">
                        <h2 class="fs-16 text-uppercase text-muted mb-3">Information</h2>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" name="nationality" id="nationality" class="form-control"
                                    value="{{ old('nationality') }}" placeholder="Nationality">
                                @error('nationality')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" name="identification_number" class="form-control"
                                    value="{{ old('identification_number') }}" placeholder="Identification Number">
                                @error('identification_number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="passport_number" class="form-control"
                                    value="{{ old('passport_number') }}" placeholder="Passport Number">
                                @error('passport_number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" name="passport_issue_date" class="form-control date-picker"
                                    value="{{ old('passport_issue_date') }}" placeholder="Passport issue">
                                @error('passport_issue_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="passport_expiry_date" class="form-control date-picker"
                                    value="{{ old('passport_expiry_date') }}" placeholder="Passport expiry">
                                @error('passport_expiry_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" name="date_of_birth" class="form-control date-picker"
                                    value="{{ old('date_of_birth') }}" placeholder="Date of birth">
                                @error('date_of_birth')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="place_of_birth" class="form-control"
                                    value="{{ old('place_of_birth') }}" placeholder="Place of birth">
                                @error('place_of_birth')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <h2 class="fs-16 text-uppercase text-muted mb-3">Duration of stay in Thailand</h2>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" name="start_date" class="form-control date-picker"
                                    value="{{ old('start_date') }}" placeholder="Start date">
                                @error('start_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="end_date" class="form-control date-picker"
                                    value="{{ old('end_date') }}" placeholder="End date">
                                @error('end_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-5 justify-content-center">
                            <hr class="m-3">
                            <div class="col-md-4">
                                <button class="btn btn-success w-100">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('script')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script> --}}
    <script type='text/javascript'
        src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $(document).ready(function() {
            $('.date-picker').inputmask('9999-99-99');
        });
    </script>
@endsection
