@foreach ($data as $key => $value)
    @php
        $image_url = '';
        $image = App\Models\HotelImage::where(['hotelId' => $value->id, 'is_cover' => true])->first();
        $images = App\Models\HotelImage::where(['hotelId' => $value->id, 'is_cover' => true])
            ->orderBy('is_cover', 'desc')
            ->get();
        if ($image != null) {
            $image_url = $image->image_url;
        }
    @endphp
    <div class="col-lg-12 @if ($key == 0) mt-0 @else mt-3 @endif">
        <div class="card shadow-lg">
            <div class="card-body row p-6">
                <div class="col-12">
                    <h2 class="post-title h3 mt-1 mb-3 text-row"><a class="link-dark" href="#">
                            {{ $value->name }}</a>
                    </h2>
                    <p><strong>{{ $value->remark }}</strong></p>
                </div>
                <div class="col-12 col-md-4">
                    <figure class="overlay overlay-1 hover-scale rounded">

                        <img data-id="myModal-{{ $value->id }}" onclick="openModal(this);currentSlide(1)"
                            src="{{ $image_url }}" srcset="{{ $image_url }}" alt=""><span
                            class="bg"></span>
                    </figure>
                    <div class="mt-3">
                        <p class="m-0"><strong><i>Address</i> :</strong> {{ $value->address }}</p>
                        @if ($value->google_map != '' && $value->google_map != null)
                            <p class="m-0"><strong><i>Map</i> :</strong> <a href="{{ $value->google_map }}"
                                    target="_blank" rel="noopener noreferrer">Open Google Map</a></p>
                        @endif
                        <p class="m-0"><strong><i>Tel</i> :</strong> <a
                                href="tel:+{{ $value->tel }}"></a>{{ $value->tel }}</p>
                        <p class="m-0"><strong><i>Email</i> :</strong> <a
                                href="mailto:{{ $value->email }}">{{ $value->email }}</a>
                            <a href="{{ $value->roomrate }}" target="_blank" rel="noopener noreferrer">
                                <p class="m-0 btn btn-sm btn-info"><strong class="text-white"><i><u>Room
                                                Rate</u></i></strong></p>
                            </a>

                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="post-header">
                        {!! $value->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
