<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD | @yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/assets/css/styles.min.css" />
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
</head>
<body>
    <!-- @stack('scripts') -->
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar Start -->
        @include('components.layout.sidebar')
        <!-- Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper" style="display: flex; flex-direction: column; min-height: 100vh;">
            <header class="app-header">
                @include('components.layout.navbar')
            </header>

            <div class="body-wrapper-inner d-flex flex-column" style="width: calc(100vw - 270px); margin-left: 0; padding-left: 0; padding-right: 0; flex: 1; display: flex; flex-direction: column;">
                <div style="flex: 1;">
                    @yield('content')
                </div>
                @include('components.layout.footer')
            </div>
        </div>
    </div>

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
    @stack('scripts')
</body>
</html>
