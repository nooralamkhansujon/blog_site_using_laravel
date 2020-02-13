<div class="modal" id="register_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-12 col-form-label text-md-left">
                        {{ __('E-Mail Address') }}
                    </label>

                    <div class="col-md-12">
                        <input id="register_name" type="text" class="form-control" name="name"
                        value="{{ old('name') }}" required autofocus>
                    </div>
                    <div class="col-md-12">
                        <input id="register_email" type="email" class="form-control" name="email"
                        value="{{ old('email') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-12 col-form-label text-md-left">
                        {{ __('Password') }}
                    </label>

                    <div class="col-md-12">
                        <input id="register_password" type="password" class="form-control"
                        name="password" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12 offset-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="register_remember"
                            {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link"
                            href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Register</button>
        </div>
      </div>
    </div>
  </div>