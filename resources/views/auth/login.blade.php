
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Andshop - Admin Dashboard HTML Template.">
		@if (App\Models\Sitename::exists())
		<title>{{App\Models\Sitename::latest()->take(1)->first()->name}}</title>
		@else
		<title>Website - E-commerce HTML Template</title>
		@endif
		
		<!-- GOOGLE FONTS -->
		<link rel="preconnect" href="https://fonts.googleapis.com/">
		<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">

		<link href="{{asset('backend/assets/css/materialdesignicons.min.css')}}" rel="stylesheet" />
		
		<!-- custom css -->
		<link id="style.css" rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}" />
		
		<!-- FAVICON -->
		@if (App\Models\Favicon::exists())
		<link href="{{asset('uploads/favicon')}}/{{App\Models\Favicon::latest()->take(1)->first()->favicon}}" rel="shortcut icon" />
		@else
		<link href="{{ asset('backend/assets/img/favicon.png') }}" rel="shortcut icon" />
		@endif
	</head>
	
	<body class="sign-inup" id="body">
		<div class="container">
			<div class="row g-0"> 
				<div class="col-lg-10 offset-lg-1">
					<div class="row g-0">
						<div class="col-lg-6">
							<div class="login_area_left_wrapper">
								<div class="login_logo_area">
									<img src="{{asset('backend/assets/img/logo/logo-login.png')}}" alt="">
									<p>Nulla laborum sit voluptate anim in. Nulla ut qui ex 
										ipsum id aliqua amet exercitation. Anim ididunt
										anim anim voluptate enim.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="login_area_right_wrapper">
								<div class="login_area_right_heading">
									<h4>Register account</h4>
									<p>Sign in to continue <a href="#!">with us</a></p>
								</div>
								<div class="login_form_wrapper">
									<form action="{{route('login')}}" method="POST">
                                        @csrf
										<div class="form-group">
											<label>Email address</label>
											<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email address">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
                                        <div class="login_form_forget">
											<a href="{{route('forgot.password')}}">Forgot password?</a>
										</div>
										<div class="login_form_bottm_area">
											<button type="submit" class="btn btn-primary w-100">Login</button>
											{{-- <div class="login_middel_title">
												<p>Do not have an account</p>
											</div> --}}
											{{-- <a href="{{route('register')}}" class="btn custom_button w-100">Register</a> --}}
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Javascript -->
		<script src="{{asset('backend/assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
		<script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/jquery-zoom/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/slick/slick.min.js')}}"></script>

         {{-- sweet alert --}}
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
		<!-- custom js -->	
		<script src="assets/js/custom.js"></script>

        @if (session('success')) {
			<script>
				const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
				})
		
				Toast.fire({
				icon: 'success',
				title: '{{session('success')}}',
				})
			</script>
		}
		@endif
	</body>

</html>