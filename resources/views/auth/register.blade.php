<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }} | Admin Website Jaga Asa</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/logokbr.png') }}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>

<body class="body-register">

    <div class="container">
        <div class="container7">
            <div class="square3">
                <img src="assets/img/logo_jaga_asa.png" alt="">
                <h4>Register</h4>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label>Nama Donatur</label><span style="color:red;font-weight:bold"> * </span>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Donatur" class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jenis Donatur</label><span style="color:red;font-weight:bold"> * </span>
                            <select class="form-control select-category @error('jenis') is-invalid @enderror" name="jenis" id="jenis">
                                <option>-- Pilih Kategori --</option>
                                    <option value="1">Individu</option>
                                    <option value="2">Organisasi/Instansi</option>
                            </select>

                            @error('jenis')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Alamat Donatur</label><span style="color:red;font-weight:bold"> * </span>
                            <input type="text" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat Donatur" class="form-control @error('alamat') is-invalid @enderror">

                            @error('alamat')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div id="narahubung" value="" hidden>
                                <label>Narahubung/Contact Person</label><span style="color:red;font-weight:bold"> * </span>
                            <input type="text" name="narahubung" value="{{ old('narahubung') }}" placeholder="Masukkan Narahubung" class="form-control @error('narahubung') is-invalid @enderror">
                            </div>


                            @error('narahubung')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Telepon</label><span style="color:red;font-weight:bold"> * </span>
                            <input type="text" name="telp" value="{{ old('telp') }}" placeholder="Masukkan Telepon" class="form-control @error('telp') is-invalid @enderror">

                            @error('telp')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Email</label><span style="color:red;font-weight:bold"> * </span>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" class="form-control @error('email') is-invalid @enderror">

                            @error('email')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>



                                <div class="form-group">
                                    <label>Password</label>
                                        <span style="color:red;font-weight:bold; font-size: 75%;">
                                        * [Password harus berupa 8 karakter]
                                        </span>
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Masukkan Kombinasi Password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        <i class='bx bxs-show show-pass'></i>
                                    </div>

                                    <div class="strength"></div>

                                    @error('password')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Konfirmasi Password</label><span style="color:red;font-weight:bold"> * </span>
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Masukkan Konfirmasi Password"
                                        class="form-control">
                                </div>

                                <div class="form-group mt-4 mb-4">
                                    <div class="captcha">
                                        <span style="width: 500px">{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                            &#x21bb;
                                        </button>
                                    </div>
                                    </div>


                                <div class="form-group ">
                                    <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror"
                                    placeholder="Masukkan Captcha" name="captcha" tabindex="3" required>
                                    @error('captcha')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn-register">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>




        </div>
    </div>

</div>


    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Reload Captcha -->
    <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: "GET",
                url: "{{ route('reload') }}",
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>

    <!-- Narahubung JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type='text/javascript'>
        $(window).load(function(){
        $("#jenis").change(function() {
                    console.log($("#jenis option:selected").val());
                    if ($("#jenis option:selected").val() == '1') {
                        $('#narahubung').prop('hidden', 'true');
                    } else {
                        $('#narahubung').prop('hidden', false);
                    }
                });
        });
</script>
</body>

</html>
