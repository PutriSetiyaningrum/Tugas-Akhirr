
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1"><b>PERBASI IMY</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Ayo Daftar Untuk memulainya</p>

                <form action="{{ route('simpanregistrasi') }} " method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error("name") {{ 'is-invalid' }} @enderror" name="name" placeholder="Nama"
                        value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error("name")
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error("email") {{ 'is-invalid' }} @enderror" name="email" placeholder="Email"
                        value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error("email")
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="alamat" class="form-control @error("alamat") {{ 'is-invalid' }} @enderror" name="alamat" placeholder="alamat"
                        value="{{ old('alamat') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                        </div>
                        @error("alamat")
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="telepon" class="form-control @error("telepon") {{ 'is-invalid' }} @enderror" name="telepon" placeholder="telepon"
                        value="{{ old('telepon') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                        </div>
                        @error("telepon")
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error("password") {{ 'is-invalid' }} @enderror" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error("password")
                        <span class="error invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- <div class="social-auth-links text-center">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div> -->

                <a href="/login" class="text-center">Saya Mempunyai Akun</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
