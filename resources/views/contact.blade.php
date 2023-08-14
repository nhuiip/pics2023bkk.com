@extends('layouts.app')
@section('content')
    @include('layouts.components._banner', ['data' => asset('img/banner-1.jpg')])
    {{-- 1 --}}
    <section class="wrapper bg-light">
        <div class="container pt-5">
            <div class="row pt-5">
                <div class="col-12 text-center">
                    <h2 class="display-4 mb-3">Contact Us</h2>
                    <hr class="m-5">
                </div>
                <div class="col-xl-10 mx-auto">
                    <div class="row gy-10 gx-lg-8 gx-xl-12">
                        <div class="col-lg-12">
                            <form method="post" action="{{ route('send-contact') }}"
                                novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="row gx-4">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input id="name" type="text" name="name" class="form-control"
                                                placeholder="Jane" required="">
                                            <label for="fornamem_name">Name *</label>
                                            <div class="valid-feedback"> Looks good! </div>
                                            <div class="invalid-feedback"> Please enter your name. </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input id="email" type="email" name="email" class="form-control"
                                                placeholder="jane.doe@example.com" required="">
                                            <label for="email">Email *</label>
                                            <div class="valid-feedback"> Looks good! </div>
                                            <div class="invalid-feedback"> Please provide a valid email address. </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                            <input id="subject" type="text" name="subject" class="form-control"
                                                placeholder="Doe" required="">
                                            <label for="subject">Subject *</label>
                                            <div class="valid-feedback"> Looks good! </div>
                                            <div class="invalid-feedback"> Please enter subject. </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-4">
                                            <textarea id="form_message" name="message" class="form-control" placeholder="Your message" style="height: 150px"
                                                required=""></textarea>
                                            <label for="form_message">Message *</label>
                                            <div class="valid-feedback"> Looks good! </div>
                                            <div class="invalid-feedback"> Please enter your messsage. </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                            <input id="form_name" type="file" name="files[]" class="form-control"
                                                style="height:unset;padding-top: 10px;padding-bottom: 10px;" multiple>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3"
                                            value="Send message">
                                    </div>
                                    <!-- /column -->
                                </div>
                                <!-- /.row -->
                            </form>
                            <!-- /form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
