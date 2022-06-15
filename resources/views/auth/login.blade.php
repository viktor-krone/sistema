@extends('layouts.app')

@section('content')
<div class="container">

    <div class="login-box">
        <div class="login-logo">
            <a href="cronsoft.cl"><b>CRON</b>SOFT</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">

                        <input id="rut_empresa" type="text" class="form-control @error('rut_empresa') is-invalid @enderror" name="rut_empresa" value="{{ old('rut_empresa') }}" placeholder="Rut Empresa" required autocomplete="rut_empresa" autofocus>

                        @if(session()->has('error'))
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope">
                                        {{ session()->get('error') }}
                                    </span>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                        @error('email')
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror

                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña"required autocomplete="current-password">

                        @error('password')
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror

                    </div>
                    <div class="row">
                        <!--div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Recordar
                                </label>
                            </div>
                        </div-->
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!--div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Ingresar con Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Ingresar con Google+
                    </a>
                </div-->
                <!-- /.social-auth-links -->

                <!--p class="mb-1">
                    <a href="forgot-password.html">Olvide mi contraseña</a>
                </p-->

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


</div>
@endsection
