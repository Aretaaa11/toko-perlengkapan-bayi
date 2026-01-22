<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User - Landing Page</title>
    <link rel="shortcut icon" type="image/png" href="/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/assets/css/styles.min.css" />
</head>
	<body style="display: flex; flex-direction: column; min-height: 100vh;">
		@include('components.user.navbar')

		<main style="flex: 1;">
			@yield('content')
		</main>

		@include('components.user.footer')

		<!-- Vendor JS -->
        <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/sidebarmenu.js"></script>
        <script src="/assets/js/app.min.js"></script>
        <script src="/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="/assets/libs/simplebar/dist/simplebar.js"></script>
        <script src="/assets/js/dashboard.js"></script>
        <!-- Solar Icons -->
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
	</body>
</html>
