
	<div class="NO-MOBILE hidden-lg hidden-md">
		<div class="container">
	This website is not designed for mobile devices, you can download our app for free from play store<br><br>
		<div class="ddd"><i class="fa fa-play" aria-hidden="true"></i> Download</div><br>
			Thank you,
	</div>
		</div>
	<div class="XX hidden-sm hidden-xs">
	<div class="top-head">
	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<div class="user-area" id="u-left">
			
			@guest('customers')
			<strong><a href="#login" data-toggle="modal">Login</a> | 
				@if (Route::has('register'))
					<a  href="{{ route('front.registerForm') }}">Register new account</a>
			@endif
		</strong>
			
		
		@else
			<li class="nav-item dropdown">
				<h5 style="display: inline">
				Welcome To WAHFY
			
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{   Auth::guard('customers')->user()->name}}
					  </a>
				</h5>
			

				
		
				
			</li>
	
			</div>
			</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<div class="user-area" id="u-right">
			<strong> <a href="{{ route('front.logout') }}" onclick="event.preventDefault();
				document.getElementById('logout-form').submit();"><i class="fa fa-lock" aria-hidden="true"></i> Logout</a></strong>
					<form id="logout-form" action="{{ route('front.logout') }}" method="POST" class="d-none">
						@csrf
					</form>
			</div>
			</div>
			@endguest
			@if( Auth::guard('customers')->user()==null)
		</div>
	</div>
	@endif
		</div>
		</div>
	</div>
	<div class="container">
	<div class="main-head">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<a href="{{route('front.home')}}"><div class="site-logo"></div></a>
			</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<div class="shortcuts-head" id="u-right">
			<a href="profile.php#wl"><label><i class="fa fa-shopping-cart" aria-hidden="true"></i>5 items in your cart</label></a><br>
				<a>About us</a>
				<a>Hot Deals</a>
				<a>Nearby shops</a>
				<input type="text" name="search" placeholder="searching about ?"> <il class="fa fa-search" aria-hidden="true"></il>
			</div>
			</div>
		</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="main-nav">
				
				<div class="your-fav wow   " id="your-fav" data-wow-delay="0.1s" data-wow-iteration="10">
				<h5>Your favourite<br>categories</h5> <img src="{{url('img/general/arrow.png')}}" width="30px" height="30px" alt="arrow">
				</div>
				
		<a id="a-skyblue" href="fashion.php">Fashion</a>
		<a id="a-darkgreen">Cars</a>
		<a id="a-purple">Electronics</a>
		<a id="a-gold">Mobiles</a>
		<a id="a-red">Food</a>
		<a id="a-blue">Furniture</a>
		<a id="a-lightgreen">Perfumes</a>
		</div>
	</div>
	</div>
		
			<div class="all-area">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
						<label>Governorate</label>
			<select class="form-control">
			<option>All</option>
			<option>Cairo</option>
			<option>Alex</option>
			<option>Shar</option>
			<option>Dk</option>
			</select>
			<br>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
					<label>Area</label>
			<select class="form-control">
			<option>All</option>
			<option>Salah Salem</option>
			<option>Trumph</option>
			<option>Nasr City</option>
			<option>Tayaran</option>
			</select>
					</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<br>
						<button class="btn btn-warning" style="margin-top:5px;">GO !</button>
					</div>
					
				
					
			</div>
					
				
					<div id="r90">
					Select Your Area
						</div>
					
					</div>
				
				</div>
				
			
		
		
	
		
		
<a href="all.php"><div class="all-cat"><i class="fa fa-shopping-bag fa-2x" aria-hidden="true"></i> <strong>View all categories</strong></div></a>
		<a href="profile.php"><div class="all-profile"><i class="fa fa-cogs fa-2x" aria-hidden="true"></i> <strong>View your profile</strong></div></a>
	@include('Front.layout.load')
		
		<div id="login" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Login to your account</h4>
            </div>
            <div class="modal-body clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<form method="POST" action="{{ route('front.login') }}">
					@csrf

					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

						<div class="col-md-6">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

						<div class="col-md-6">
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-6 offset-md-4">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

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
								<a class="btn btn-link" href="{{ route('password.request') }}">
									{{ __('Forgot Your Password?') }}
								</a>
							@endif
						</div>
					</div>
				</form>
				  
								
				   
				</div>
				
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
	
		