@extends('layouts.app')
@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-1.jpg')])
    <section class="wrapper bg-light">
        <div class="container pt-10">
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                <div class="col-12 text-center">
                    <h2 class="display-4 mb-3">Registration Form</h2>
                </div>
                <div class="col-12 m-0">
                    <h2 class="fs-16 text-uppercase text-muted mb-3">Applicant Details</h2>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <input type="text" name="title" id="title" placeholder="Title"
                                class="form-control form-control-lg">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="first_name" id="first_name" placeholder="First Name"
                                class="form-control form-control-lg">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="middle_name" id="middle_name" placeholder="Middle Name"
                                class="form-control form-control-lg">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                                class="form-control form-control-lg">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="email" id="email" placeholder="E-mail"
                                class="form-control form-control-lg">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="second_email" id="second_email" placeholder="Second E-mail"
                                class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" name="address" id="address" placeholder="Address (Department / Office)"
                                class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" name="address_2" id="address_2" placeholder="Address (line 2)"
                                class="form-control form-control-lg">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="city_code" id="city_code" placeholder="City Code"
                                class="form-control form-control-lg">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="city" id="city" placeholder="City / State / District"
                                class="form-control form-control-lg">
                        </div>
                        <div class="col-md-6 mb-3">
                            <select name="country" id="country" class="form-control form-control-lg"
                                onchange="getAssociation(this)">
                                <option value="">Country</option>
                                @foreach ($countries as $value)
                                    <option value="{{ $value->id }}">{{ $value->nicename }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="tel" id="tel" placeholder="Phone"
                                class="form-control form-control-lg">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="mobile_number" id="mobile_number" placeholder="Mobile Phone"
                                class="form-control form-control-lg">
                        </div>
                        <div class="col-md-6 mb-3">
                            @if ($hasAssociation)
                                <select name="authority" id="authority" class="form-control form-control-lg" disabled>
                                    <option value="">Authority /Organisation</option>
                                </select>
                            @else
                                <input type="text" name="authority" id="authority" placeholder="Authority /Organisation"
                                    class="form-control form-control-lg">
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="professional_title" id="professional_title"
                                placeholder="Professional Title" class="form-control form-control-lg">
                        </div>
                    </div>
                </div>
                <div class="col-12 m-0">
                    <h2 class="fs-16 text-uppercase text-muted mb-3">Registration type</h2>
                </div>
                <div class="col-12 m-0">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="hidden" name="registrantGroupId" id="registrantGroupId"
                                value="{{ $data->registrant_group->id }}">
                            <select class="form-control form-control-lg" disabled>
                                <option value="{{ $data->registrant_group->id }}">{{ $data->registrant_group->name }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="hidden" name="registrantTypeId" id="registrantTypeId"
                                value="{{ $data->registrant_type->id }}">
                            <select class="form-control form-control-lg" disabled>
                                <option value="{{ $data->registrant_type->id }}">{{ $data->registrant_type->name }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 m-0">
                    <h2 class="fs-16 text-uppercase text-muted mb-3">Invoicing Address</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="taxId" id="taxId" placeholder="Tax ID"
                                class="form-control form-control-lg">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="taxTel" id="taxTel" placeholder="Phone"
                                class="form-control form-control-lg">
                        </div>
                    </div>
                </div>
                <div class="col-12 m-0">
                    <h2 class="fs-16 text-uppercase text-muted mb-3">Other (optional)</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="dietary_restrictions" id="dietary_restrictions"
                                placeholder="Dietary Restrictions" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="special_requirements" id="special_requirements"
                                placeholder="Special Requirements" class="form-control form-control-lg">
                        </div>
                    </div>
                </div>
                <div class="col-12 m-0">
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-lg btn-success w-100" disabled>Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        function getAssociation(e) {
            let countryId = $(e).val()
            let registrantTypeId = $('#registrantTypeId').val()
            $.ajax({
                type: 'POST',
                url: '{!! route('register.getassociations') !!}',
                data: {
                    countryId: countryId,
                    registrantTypeId: registrantTypeId,
                },
                success: function(data) {
                    $('select[id="authority"]').find('option').remove();
                    $('select[id="authority"]').append('<option value="">Authority /Organisation</option>');
                    if (data.length == 0) {
                        $('select[id="authority"]').prop('disabled', true);
                    } else {
                        data.forEach(element => {
                            $('select[id="authority"]').append('<option value="' + element.id + '">' +
                                element
                                .name + '</option>');
                        });
                        $('select[id="authority"]').prop('disabled', false);
                    }
                }
            });
        }
    </script>
@endsection
