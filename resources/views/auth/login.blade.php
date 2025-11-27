<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - RSHP UNAIR</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/adminlte.min.css') }}">
    
    <style>
        body {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 50%, #0c5460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            width: 400px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .card-header {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            border-radius: 0 !important;
            padding: 30px;
            text-align: center;
            border-bottom: none;
        }
        .login-logo {
            margin-bottom: 0;
        }
        .login-logo i {
            font-size: 50px;
            color: white;
            margin-bottom: 10px;
        }
        .login-logo b {
            color: white;
            font-size: 24px;
            display: block;
        }
        .login-logo small {
            display: block;
            color: rgba(255,255,255,0.8);
            font-size: 14px;
            margin-top: 5px;
        }
        .login-card-body {
            padding: 30px;
        }
        .login-box-msg {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .btn-login {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            border: none;
            border-radius: 5px;
            padding: 10px 25px;
            font-weight: 600;
            color: white;
            width: 100%;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #138496 0%, #0c5460 100%);
            color: white;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group-text {
            background: #f8f9fa;
            border-left: none;
        }
        .form-control {
            border-right: none;
            height: 45px;
        }
        .form-control:focus {
            border-color: #ced4da;
            box-shadow: none;
        }
        .form-control:focus + .input-group-append .input-group-text {
            border-color: #ced4da;
        }
        .icheck-primary label {
            font-size: 14px;
            color: #666;
        }
        .footer-text {
            text-align: center;
            margin-top: 20px;
        }
        .footer-text small {
            color: rgba(255,255,255,0.8);
        }
    </style>
</head>
<body class="hold-transition">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="login-logo">
                    <i class="fas fa-paw"></i>
                    <br>
                    <b>RSHP UNAIR</b>
                    <small>Rumah Sakit Hewan Pendidikan</small>
                </div>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silakan login untuk melanjutkan</p>

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        @foreach($errors->all() as $error)
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <i class="fas fa-check-circle mr-1"></i>{{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" 
                               name="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               placeholder="Email"
                               value="{{ old('email') }}"
                               required 
                               autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope text-muted"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="input-group mb-3">
                        <input type="password" 
                               name="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               placeholder="Password"
                               required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock text-muted"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-login">
                                <i class="fas fa-sign-in-alt mr-2"></i>Login
                            </button>
                        </div>
                    </div>
                </form>

                <hr>
                
                <p class="mb-1 text-center">
                    <a href="{{ route('password.request') }}" class="text-muted">
                        <i class="fas fa-key mr-1"></i>Lupa password?
                    </a>
                </p>
                
                <p class="mb-0 text-center">
                    <a href="{{ route('register') }}" class="text-primary">
                        <i class="fas fa-user-plus mr-1"></i>Daftar akun baru
                    </a>
                </p>

                <hr>

                <p class="mb-0 text-center">
                    <a href="{{ route('landingpage') }}" class="btn btn-outline-secondary btn-block">
                        <i class="fas fa-home mr-2"></i>Kembali ke Beranda
                    </a>
                </p>
            </div>
        </div>
        
        <div class="footer-text">
            <small>
                &copy; {{ date('Y') }} RSHP UNAIR. All rights reserved.
            </small>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
