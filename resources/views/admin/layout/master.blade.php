<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('themes/deskapp2/vendors/images/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('themes/deskapp2/vendors/images/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('themes/deskapp2/vendors/images/favicon-16x16.png') }}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/deskapp2/vendors/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/deskapp2/vendors/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/deskapp2/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/deskapp2/vendors/styles/style.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
	<!-- DataTable -->
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/deskapp2/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/deskapp2/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>

	@stack('styles')
</head>
<body>
	@include('sweetalert::alert')
	@php
		$user = getUserData();
	@endphp
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{ asset('themes/deskapp2/vendors/images/deskapp-logo.svg') }}" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<div class="header">
		@include('admin.layout.header')
	</div>

	<div class="right-sidebar">
		@include('admin.layout.rightSidebar')
	</div>

	<div class="left-side-bar">
		@include('admin.layout.leftSidebar')
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
            @yield('content')
			
			@include('admin.layout.footer')
		</div>
	</div>
	<!-- js -->
	<script src="{{ asset('themes/deskapp2/vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/vendors/scripts/layout-settings.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/src/plugins/jQuery-Knob-master/jquery.knob.min.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	

	<!-- Datatable -->
	<script src="{{ asset('themes/deskapp2/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
	<!-- buttons for Export datatable -->
	<script src="{{ asset('themes/deskapp2/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/src/plugins/datatables/js/vfs_fonts.js') }}"></script>

	<!-- add sweet alert js & css in footer -->
	<script src="{{ asset('themes/deskapp2/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
	<script src="{{ asset('themes/deskapp2/src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{{ asset('plugins/jquery-number-master/jquery.number.min.js') }}"></script>
	@stack('scripts')
</body>
</html>