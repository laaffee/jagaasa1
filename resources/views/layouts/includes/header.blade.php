<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title', 'Admin Website BKAD Kota Bogor') </title>

    @stack('before-style')
    
    <link rel="shortcut icon" href="{{ asset('assets/img/logokbr.png') }}" type="image/x-icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap4.css') }}" />

    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

    <!-- Javascript Input Colors -->
    <script src="{{ asset('assets/js/jscolor.js') }}"></script>

    <!-- Datatable -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- <style>
        .pull-right {
            float: right;
        }
        .select2-container {
            display: block; 
        }
    </style> -->
    @stack('after-style')
</head>