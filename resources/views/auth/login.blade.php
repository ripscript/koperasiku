<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/deskapp2/vendors/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/deskapp2/vendors/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/deskapp2/vendors/styles/style.css') }}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
    @include('sweetalert::alert')
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="">
					<img src="{{ asset('themes/deskapp2/vendors/images/deskapp-logo.svg') }}" alt="">
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{ asset('themes/deskapp2/vendors/images/login-page-img.png') }}" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login Koperasiku</h2>
						</div>

                        @if (session('error') == true)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Email atau password kamu salah!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

						<form action="{{ route('login-authentication') }}" method="POST">
                            @csrf
							<div class="input-group custom">
								<input name="email" type="email" class="form-control form-control-lg @error ('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
							</div>
							<div class="input-group custom">
								<input name="password" type="password" maxlength="8" class="form-control form-control-lg @error ('password') is-invalid @enderror" placeholder="********">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<button type="submit" class="btn btn-primary btn-lg btn-block">Masuk</button>
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">Atau</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="#">Register untuk membuat akun</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="{{ asset('themes/deskapp2/vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/vendors/scripts/layout-settings.js') }}"></script>
</body>
</html>