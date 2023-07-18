<div class="modal fade modal-popup" id="modalAnnouncement" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content text-center">
            <div class="modal-body p-3">
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    onclick="localStorage.setItem('displayPopup', true)"></button>
                    {{ $_COOKIE['displayPopup'] }}
                <img src="{{ asset('img/2ndannouncement-02-02-02.jpg') }}" alt="" width="100%">
            </div>
        </div>
    </div>
</div>
