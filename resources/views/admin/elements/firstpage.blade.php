<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Dashboard Admin</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/logo.jpg" rel="icon">
        <link href="{{ asset('pageUsers/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('pageUsers/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('pageUsers/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('pageUsers/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('pageUsers/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('pageUsers/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset('pageUsers/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('pageUsers/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('pageUsers/assets/css/style.css') }}" rel="stylesheet">

        <!-- Trix -->
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    </head>
    <body>

        <!-- Header -->
            @include('admin.elements.header');
        <!-- End Header -->

        <!-- Navbar -->
            @include('admin.elements.navbar');
        <!-- End Navbar -->

        <!-- Content -->
            @yield('content')
        <!-- End Content -->

        <!-- Footer -->
            @include('admin.elements.footer');
        <!-- End Footer -->

        <!-- Vendor JS Files -->
        <script src="{{ asset('pageUsers/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/chart.js/chart.umd.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/echarts/echarts.min.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/quill/quill.min.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('pageUsers/assets/vendor/php-email-form/validate.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('pageUsers/assets/js/main.js') }}"></script>
    </body>
</html>