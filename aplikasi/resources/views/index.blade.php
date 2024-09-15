<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HADITECH</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/public/Asset/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/Asset/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/Asset/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/public/Asset/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/Asset/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/Asset/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/public/Asset/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/public/Asset/images/favicon.png') }}" />
    <!-- Leaflet -->
    <link rel="stylesheet" href="{{ url('https://unpkg.com/leaflet@1.9.4/dist/leaflet.css') }}" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url('https://unpkg.com/leaflet@1.9.4/dist/leaflet.js') }}" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body>
    @include('Halaman_depan.navbar')
    @include('Halaman_depan.sidebar')
    @yield('content')

    <!-- plugins:js -->
    <script src="{{ asset('/public/Asset/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('/public/Asset/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/public/Asset/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/public/Asset/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('/public/Asset/js/dataTables.select.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/public/Asset/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/public/Asset/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/public/Asset/js/template.js') }}"></script>
    <script src="{{ asset('/public/Asset/js/settings.js') }}"></script>
    <script src="{{ asset('/public/Asset/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('/public/Asset/js/dashboard.js') }}"></script>
    <script src="{{ asset('/public/Asset/js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>
