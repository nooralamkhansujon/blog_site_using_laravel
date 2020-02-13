<div class="modal" id="login_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success">Plase Login for Subscribe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="login_form" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-12">
                        <input id="login_email" type="email" class="form-control" name="email" value="{{ old('email') }}" required >

                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>

                    <div class="col-md-12">
                        <input id="login_password" type="password" class="form-control"
                        name="password" required />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="co-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember"
                             id="login_remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                        </button>
                        <small class="text-secondary">Need An Account?
                            <a href="#" class="modal_link text-info"  data-toggle="modal"      data-target="#register_modal">Register</a>
                        </small>

                    </div>
                    <div class="col-md-12 text-center">
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
          <button type="button"
              class="btn btn-secondary"  data-dismiss="modal">
              Close
            </button>
          <button type="button" class="btn btn-primary" name="login">Login</button>
        </div>
      </div>
    </div>
  </div>
