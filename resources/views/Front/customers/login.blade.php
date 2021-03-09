@extends('Front.layout.master')
@section('content')
  <div class="ps-my-account">
            <div class="container">
                <form class="ps-form--account ps-tab-root" method="POST" action="{{ route('front.login') }}">
                    @csrf
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="sign-in">
                            <div class="ps-form__content">
                                <h5>Log In To Your Account</h5>
                                <div class="form-group">
                                    <input id="email" class="form-control" type="email" placeholder="email address"@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    	@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                                </div>
                                <div class="form-group form-forgot">
                                    <input id="password" class="form-control" type="password" placeholder="Password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><a href="#">Forgot?</a>
                                    @error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                                </div>
                                <div class="form-group">
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember-me">Rememeber me</label>
                                    </div>
                                </div>
                                <div class="form-group submtit">
                                    <button class="ps-btn ps-btn--fullwidth">Login</button>
                                </div>
                            </div>
                            <div class="ps-form__footer">
                                <p>Connect with:</p>
                                <ul class="ps-list--social">
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                   
                    </div>
                </form>
            </div>
        </div>
@endsection