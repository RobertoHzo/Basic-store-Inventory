@extends('layouts.auth_app')
@section('title')
    Inicie sesión
@endsection
@section('content')
    <div class="card card-primary" style="border-top: 2px solid #d12b2b;">
        <div class="card-header"><h4 style="color: #d02b2c">Inicio de sesion</h4></div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger p-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input aria-describedby="emailHelpBlock" id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           placeholder="Ingrese su Email" tabindex="1"
                           value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus
                           required style="border-color: #ff206e">
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>

                 <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Contraseña</label>
                        <div class="float-right">
                            <a href="{{ route('password.request') }}" class="text-small" style="color: #d02b2c">
                                Olvido la contraseña?
                            </a>
                        </div>
                    </div>
                    <input aria-describedby="passwordHelpBlock" id="password" type="password"
                           value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                           placeholder="Ingrese la contraseña"
                           class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                           tabindex="2" required style="border-color: #ff206e">
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                               id="remember"{{ (Cookie::get('remember') !== null) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">Recordarme</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4">
                        Iniciar sesión
                    </button>
                </div>

            </form>
        </div>

    </div>
    <div class="mt-5 text-muted text-center">
        ¿No tiene cuenta? <a style="color: #dc081c"
                href="{{ route('register') }}">Crear cuenta</a>
    </div>
@endsection
