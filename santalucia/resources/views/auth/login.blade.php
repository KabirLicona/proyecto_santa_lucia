@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
      
    <td>
     <img src="/img/logo_default.ico"  height="50px" width="50px">
    
         <a href="#">Optica Santa Lucia</a> <br>
         <h6></h6>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Iniciar Sesión</p>
            @if (session('error'))
                <p class="text-danger text-center">
                    {{ session('error') }}
                </p>
            @endif
            {{-- @yield('content') --}}
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror " placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ old('password') }}" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                Recordar
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            {{-- <p class="mb-1">
                <a href="forgot-password.html">Olvidé mi contraseña</a>
            </p> --}}
            <div class="callout callout-info mt-3 small">
                <h6>Admin</h6>
                <span>Usuario : supervisor@admin.com</span><br>
                <span>password : password</span><br><br>
                </div>
        </div>
        <!-- /.login-card-body -->
        
    </div>
    </div>
</div>
<!-- /.login-box -->
@endsection
