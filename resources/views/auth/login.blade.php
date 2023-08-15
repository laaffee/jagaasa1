<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ede70cc9f6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body class="body-login">

    <div class="container">
        <div class="container6">
            <div class="square2">
                <img src="assets/img/logo_jaga_asa.png" alt="">
                <h4>Login Admin</h4>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="needs-validation"
                        novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="username"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Masukkan Email" value="{{ old('email') }}" tabindex="1"
                                required autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password"
                                    class="control-label @error('password') is-invalid @enderror">Password</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password"
                                placeholder="Masukkan Password" tabindex="2" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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

                        <!-- <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input"
                                    tabindex="3" id="remember-me">
                                <label class="custom-control-label" for="remember-me">Remember Me</label>
                            </div>
                        </div> -->

                        <div class="form-login">
                            <button type="submit" id="btn-sbmt" tabindex="4">
                                Login
                            </button>

                            <a href="{{ route('register') }}" type="submit" id="btn-sbmt" tabindex="4">Register</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div><br>


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
</body>

</html>
