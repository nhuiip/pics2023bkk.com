<div class="modal fade" id="modal-signin" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content text-center">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <h2 class="mb-3 text-start">Welcome Back</h2>
          <p class="lead mb-6 text-start">Fill your email and password to sign in.</p>
          <form class="text-start mb-3" method="POST" action="{{route('login')}}" novalidate>
            @csrf
            <div class="form-floating mb-4">
              <input type="email" class="form-control" placeholder="Email" id="loginEmail" name="email">
              <label for="loginEmail">Email</label>
            </div>
            <div class="form-floating password-field mb-4">
              <input type="password" class="form-control" placeholder="Password" id="loginPassword" name="password">
              <span class="password-toggle"><i class="uil uil-eye"></i></span>
              <label for="loginPassword">Password</label>
            </div>
            <button class="btn btn-primary rounded-pill btn-login w-100 mb-2" type="submit">Sign In</button>
          </form>
        </div>
      </div>
    </div>
  </div>
