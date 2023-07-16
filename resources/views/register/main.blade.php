@extends('layouts.app')
@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-1.jpg')])
    <section class="wrapper bg-light">
        <div class="container pt-10">
            <form action="{{ route('register.store') }}" method="POST" class="form-horizontal" novalidate>
                @csrf
                <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5">
                    <div class="col-12 text-center">
                        <h2 class="display-4 mb-3">Registration Form</h2>
                    </div>
                    <div class="col-12 m-0 form-group">
                        <h2 class="fs-16 text-uppercase text-muted mb-3">Applicant Details</h2>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <input type="text" name="title" id="title" placeholder="Title"
                                    class="form-control form-control-lg" value="{{ old('title') }}">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <input type="text" name="first_name" id="first_name" placeholder="First Name"
                                    class="form-control form-control-lg" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <input type="text" name="middle_name" id="middle_name" placeholder="Middle Name"
                                    class="form-control form-control-lg" value="{{ old('middle_name') }}">
                                @error('middle_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                                    class="form-control form-control-lg" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="email" id="email" placeholder="E-mail"
                                    class="form-control form-control-lg" value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="email_secondary" id="email_secondary"
                                    placeholder="Second E-mail" class="form-control form-control-lg"
                                    value="{{ old('email_secondary') }}">
                                @error('email_secondary')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" name="address" id="address"
                                    placeholder="Address (Department / Office)" class="form-control form-control-lg"
                                    value="{{ old('address') }}">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" name="address_2" id="address_2" placeholder="Address (line 2)"
                                    class="form-control form-control-lg" value="{{ old('address_2') }}">
                                @error('address_2')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <input type="text" name="city_code" id="city_code" placeholder="City Code"
                                    class="form-control form-control-lg" value="{{ old('city_code') }}">
                                @error('city_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <input type="text" name="city" id="city" placeholder="City / State / District"
                                    class="form-control form-control-lg" value="{{ old('city') }}">
                                @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <select name="country" id="country" class="form-control form-control-lg"
                                    onchange="getAssociation(this)">
                                    <option value="">Country</option>
                                    @foreach ($countries as $value)
                                        <option value="{{ $value->nicename }}" data-id="{{ $value->id }}"
                                            @if (old('country') == $value->nicename) selected @endif>{{ $value->nicename }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="phone" id="phone" placeholder="Phone"
                                    class="form-control form-control-lg" value="{{ old('phone') }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="phone_mobile" id="phone_mobile" placeholder="Mobile Phone"
                                    class="form-control form-control-lg" value="{{ old('phone_mobile') }}">
                                @error('phone_mobile')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                @if ($hasAssociation)
                                    <select name="organization" id="organization" class="form-control form-control-lg"
                                        @if (empty(old('organization'))) disabled @endif>
                                        @if (empty(old('organization')))
                                            <option value="">Authority /Organisation</option>
                                        @else
                                            <option value="{{ old('organization') }}">{{ old('organization') }}</option>
                                        @endif
                                    </select>
                                @else
                                    <input type="text" name="organization" id="organization"
                                        placeholder="Authority /Organisation" class="form-control form-control-lg"
                                        value="{{ old('organization') }}">
                                @endif
                                @error('organization')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="profession_title" id="profession_title"
                                    placeholder="Professional Title" class="form-control form-control-lg"
                                    value="{{ old('profession_title') }}">
                                @error('profession_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 m-0">
                        <h2 class="fs-16 text-uppercase text-muted mb-3">Registration type</h2>
                    </div>
                    <div class="col-12 m-0">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="hidden" name="registrant_group" id="registrant_group"
                                    value="{{ $data->registrant_group->name }}">
                                <select class="form-control form-control-lg" disabled>
                                    <option value="{{ $data->registrant_group->name }}">
                                        {{ $data->registrant_group->name }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="hidden" name="registrantTypeId" id="registrantTypeId"
                                    value="{{ $data->registrant_type->id }}">
                                <input type="hidden" name="registration_type" id="registration_type"
                                    value="{{ $data->registrant_type->name }}">
                                <select class="form-control form-control-lg" disabled>
                                    <option value="{{ $data->registrant_type->name }}">{{ $data->registrant_type->name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 m-0">
                        <h2 class="fs-16 text-uppercase text-muted mb-3">Invoicing Address</h2>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="tax_id" id="tax_id" placeholder="Tax ID"
                                    class="form-control form-control-lg" value="{{ old('tax_id') }}">
                                @error('tax_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="tax_phone" id="tax_phone" placeholder="Phone"
                                    class="form-control form-control-lg" value="{{ old('tax_phone') }}">
                                @error('tax_phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 m-0">
                        <h2 class="fs-16 text-uppercase text-muted mb-3">Other (optional)</h2>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="dietary_restrictions" id="dietary_restrictions"
                                    placeholder="Dietary Restrictions" class="form-control form-control-lg"
                                    value="{{ old('dietary_restrictions') }}">
                                @error('dietary_restrictions')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="special_requirements" id="special_requirements"
                                    placeholder="Special Requirements" class="form-control form-control-lg"
                                    value="{{ old('special_requirements') }}">
                                @error('special_requirements')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 m-0">
                        {{-- checkbok --}}
                        <hr class="my-3">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ true }}"
                                        name="isConsentPdpa" id="isConsentPdpa" onclick="checkConsent(this)">
                                    <label class="form-check-label" for="flexCheckDefault"> I have read the above and
                                        fully understood all <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal-01"><u><i>contents</i></u></a>, Agree and
                                        consent</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ true }}"
                                        name="isConsentCondition" id="isConsentCondition" onclick="checkConsent(this)">
                                    <label class="form-check-label" for="flexCheckDefault">The conferences handout
                                        including content copyright by PICS Committee. editing, revising and copying are prohibited</label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-4">
                                <input type="hidden" name="total" id="total" value="{{ $data->price }}">
                                <button type="submit" class="btn btn-lg btn-success w-100 buttonRegister" disabled>Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    {{-- model-1 --}}
    @include('layouts.components._modal-pdpa-content')
@endsection
@section('script')
    <script>
        checkConsent()

        $('input').keypress(function(event) {
            var ew = event.which;
            if (ew == 32)
                return true;
            if (48 <= ew && ew <= 57)
                return true;
            if (65 <= ew && ew <= 90)
                return true;
            if (97 <= ew && ew <= 122)
                return true;
            return false;
        });

        function getAssociation(e) {
            let countryId = $('#country').find(":selected").attr('data-id')
            let registrantTypeId = $('#registrantTypeId').val()

            console.log(countryId);
            $.ajax({
                type: 'POST',
                url: '{!! route('register.getassociations') !!}',
                data: {
                    countryId: countryId,
                    registrantTypeId: registrantTypeId,
                },
                success: function(data) {
                    console.log(data);
                    $('select[id="organization"]').find('option').remove();
                    $('select[id="organization"]').append('<option value="">Authority /Organisation</option>');
                    if (data.length == 0) {
                        $('select[id="organization"]').prop('disabled', true);
                    } else {
                        data.forEach(element => {
                            $('select[id="organization"]').append('<option value="' + element.name +
                                '">' +
                                element
                                .name + '</option>');
                        });
                        $('select[id="organization"]').prop('disabled', false);
                    }
                }
            });
        }

        function checkConsent(e) {
            if ($('#isConsentPdpa').is(':checked') && $('#isConsentCondition').is(':checked')) {
                $('.buttonRegister').prop('disabled', false);
            } else {
                $('.buttonRegister').prop('disabled', true);
            }
        }
    </script>
@endsection
