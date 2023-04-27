@foreach ($data as $key => $value)
    <div class="col-lg-4">
        <div class="card shadow-lg">
            <figure class="card-img-top overlay overlay-1"><a href="{{ route('news.show', $value->id) }}">
                    <img src="{{ $value->image_url }}" srcset="{{ $value->image_url }}" alt=""><span
                        class="bg"></span></a>
                <figcaption>
                    <h5 class="from-top mb-0">Read More</h5>
                </figcaption>
            </figure>
            <div class="card-body p-6">
                <div class="post-header">
                    <h2 class="post-title h3 mt-1 mb-3 text-row"><a class="link-dark" href="{{ route('news.show', $value->id) }}">
                            {{ \Illuminate\Support\Str::limit($value->name, $limit = 55, $end = '...') }}</a>
                    </h2>
                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($value->content), $limit = 175, $end = '...') }}
                    </p>
                </div>
                <div class="post-footer">
                    <ul class="post-meta d-flex mb-0">
                        <li class="post-date">
                            <i class="uil uil-calendar-alt"></i>
                            <span>{{ date('d M Y', strtotime($value->created_at)) }}</span>
                        </li>
                        <li class="post-comments">
                            <a href="javascript:;" onclick="favorite(this)" class="a-favorite-id-{{ $value->id }}" data-id="{{ $value->id }}"
                                data-url="{{ route('news.update', $value->id) }}"
                                data-favorite="{{ $value->favorite }}"><i class="uil uil-heart">
                                    </i><span class="favorite-id-{{ $value->id }}">{{ $value->favorite }}</span></a>
                        </li>
                        <li class="post-comments">
                            <i class="uil uil-eye"></i>{{ $value->visit }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach
