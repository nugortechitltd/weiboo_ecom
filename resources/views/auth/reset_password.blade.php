
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Andshop - Admin Dashboard HTML Template.">

		<title>Andshop - Admin Dashboard HTML Template.</title>
		
		<!-- GOOGLE FONTS -->
		<link rel="preconnect" href="https://fonts.googleapis.com/">
		<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">

		<link href="{{asset('backend/assets/css/materialdesignicons.min.css')}}" rel="stylesheet" />
		
		<!-- custom css -->
		<link id="style.css" rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}" />
		
		<!-- FAVICON -->
		<link href="{{asset('backend/assets/img/favicon.png')}}" rel="shortcut icon" />
	</head>
	
	<body class="sign-inup" id="body">
		<div class="container">
			<div class="row g-0"> 
				<div class="col-lg-10 offset-lg-1">
					<div class="row g-0">
						<div class="col-lg-6">
							<div class="login_area_left_wrapper">
								<div class="">
									<img src="{{asset('backend/assets/img/logo/logo-login.png')}}" alt="">
									<p class="text-white" style="padding: 25px 60px 0 60px; text-align:center">Nulla laborum sit voluptate anim in. Nulla ut qui ex 
										ipsum id aliqua amet exercitation. Anim ididunt
										anim anim voluptate enim.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="login_area_right_wrapper">
								<div class="login_area_right_heading">
									<h4>Reset password</h4>
								</div>
								<div class="login_form_wrapper">
									<form action="{{route('password.reset.send')}}" method="POST">
                                        @csrf
										<div class="form-group">
											<label>Email address</label>
											<input type="email" name="email" class="form-control" placeholder="Enter email address">
                                            @error('email')
                                                <strong style="color: red">{{ $message }}</strong>
                                            @enderror
										</div>
										<div class="login_form_bottm_area">
											<button type="submit" class="btn btn-primary w-100">Request send</button>
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