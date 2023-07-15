@php
    $facebook = App\Models\Setting::where('key', 'config-facebook')->first();
    $twitter = App\Models\Setting::where('key', 'config-twitter')->first();
    $line = App\Models\Setting::where('key', 'config-line')->first();
    $youtube = App\Models\Setting::where('key', 'config-youtube')->first();
@endphp
<div class="container-fluid ps-0 pe-0 pt-5 pt-md-5">
    <div class="footer" style="background-image: url('{{ asset('img/footer.png') }}')">
        <div class="container pt-5 pb-0">
            {{-- <h4 class="text-white">Follow us on</h4> --}}
            <h4 class="text-white mb-0" class="">For more information, please contact</h4>
            <a href="mailto:druginspection@fda.moph.go.th"><p class="text-white mb-0">druginspection@fda.moph.go.th</p></a>
            {{-- <a href="{{ $facebook->value }}" @if ($facebook->value != '' && $facebook->value != null) target="_blank" @endif>
                <img src="{{ asset('img/facebook.png') }}" alt="" width="40px">
            </a>
            <a href="{{ $twitter->value }}" @if ($facebook->value != '' && $facebook->value != null) target="_blank" @endif>
                <img src="{{ asset('img/twitter.png') }}" alt="" width="40px">
            </a>
            <a href="{{ $line->value }}" @if ($facebook->value != '' && $facebook->value != null) target="_blank" @endif>
                <img src="{{ asset('img/line.png') }}" alt="" width="40px">
            </a>
            <a href="{{ $youtube->value }}" @if ($facebook->value != '' && $facebook->value != null) target="_blank" @endif>
                <img src="{{ asset('img/youtube.png') }}" alt="" width="40px">
            </a> --}}
            <span class="copyright">Copyrights © 2023 All rights reserved by THAIFDA</span>
        </div>
    </div>
</div>
