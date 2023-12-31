<!DOCTYPE html>
<html lang="id">

  <!-- 
  Author : !Dh4m - DISKOMINFO Kota Bogor
  Projek : Master Website Perangkat Daerah Kota Bogor 
  -->

<!-- START HEADER-->
@include('layouts.includes.header')
<!-- START HEADER-->

<body style="background: #e2e8f0">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            
            <!-- START PAGE NAVBAR -->
            @include('layouts.includes.navbar')
            <!-- END PAGE NAVBAR -->
            
            <!-- START PAGE SIDEBAR -->
            @include('layouts.includes.sidebar')
            <!-- END PAGE SIDEBAR -->

            <!-- START STYLE PLUGINS -->
            @yield('head-style')
            <!-- END STYLE PLUGINS -->
            
            <!-- START MAIN CONTENT -->
            @yield('content')
            <!-- START MAIN CONTENT -->

            <footer class="main-footer">
                <center>
                <strong>Copyright &copy; 2022 Dinas Komunikasi dan Informatika Kota Bogor.</strong>
                All rights reserved.
                </center>
            </footer>

            <!-- START SCRIPT PLUGINS -->
            @yield('foot-script')
            <!-- END SCRIPT PLUGINS -->
        </div>
    </div>

    @stack('before-script')
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

    @stack('after-script')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        //active select2
        $(document).ready(function () {
            $('select').select2({
                theme: 'bootstrap4',
                width: 'style',
            });
        });

        //flash message
        @if(session()->has('success'))
        swal({
            type: "success",
            icon: "success",
            title: "BERHASIL!",
            text: "{{ session('success') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @elseif(session()->has('error'))
        swal({
            type: "error",
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @endif
    </script>
</body>
</html>