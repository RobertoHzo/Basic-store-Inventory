@extends('main.layouts.layout_auth')

@section('content')
<section class="ftco-section" style="    padding: 9em 0;
padding-bottom: 2em;
position: relative;
background-color: white;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Editar información de usuario</h1></div>

                <div class="card-body">
                    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['cliente.update', $user->id]]) !!}
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="name">Nombre</label>
                                    {!! Form::text('name', null, array('class'=>'form-control'))  !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="lastname">Apellidos</label>
                                    {!! Form::text('lastname', null, array('class'=>'form-control'))  !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="email">Email</label>
                                    {!! Form::text('email', null, array('class'=>'form-control'))  !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="phone">Teléfono</label>
                                    {!! Form::text('phone', null, array('class'=>'form-control'))  !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="password">Contraseña (si no requiere cambiarla deje el campo vacio)</label>
                                   {!! Form::password('password', array('class'=>'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="password">Confirmar contraseña (si no requiere cambiarla deje el campo vacio)</label>
                                   {!! Form::password('confirm-password', array('class'=>'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-12 col-md-12">
                                <button type="submit" class="btn btn-info" id="swal-edit">
                                    Editar
                                </button>
                                <a href="{{ route('dashboard')}}" class="btn btn-danger">
                                    Cancelar
                                </a>
                            </div>
                          </div>
                          {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script>
    document.getElementById("swal-edit").addEventListener("click", success);

    function success() {
        Swal.fire({
            icon: 'success',
            title: 'Registro editado correctamente',
            showConfirmButton: false,
            timer: 3000
        })
        }
</script>
@endsection

