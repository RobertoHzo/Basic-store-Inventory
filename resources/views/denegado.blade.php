@extends('layouts.auth_app')
@section('title')
    Acceso denegado
@endsection
@section('content')
    <div class="card card-primary" style="border-top: 2px solid #d12b2b;">
        <div class="card-header" style="text-align: center;"><h1 style="color: #d02b2c">¡No tiene los permisos para acceder a esta pagina!</h1></div>

        <div class="card-body" style="display: flex; justify-content:center;">

            <div class="form-group">
                <a href="/" class="btn btn-danger">Volver a la pagina</a>
            </div>
        </div>

    </div>

@endsection
