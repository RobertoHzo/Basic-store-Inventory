@extends('layouts.app')
@section('title')
Roles
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Rol</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           {{-- validation --}}
                          @if ($errors->any())
                          <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>Error</strong>
                            @foreach ($errors->all() as $error)
                                <span class="badge badge-danger">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          @endif
                          {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="name">Nombre del rol:</label>
                                    {!! Form::text('name', null, array('class'=>'form-control'))  !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="">Permisos del rol:</label>
                                    <br>
                                    <span><input type="checkbox" class="check_all"/><b><u>Seleccionar todos</u></b></span>
                                    <br>

                                    @foreach ($permission as $value)
                                    <span>{{ Form::checkbox('permission[]', $value->id,
                                    in_array($value->id, $rolePermissions) ? true:false,array('class' => 'name')) }}
                                    {{$value->name}}</span>
                                    <br>

                                    @endforeach
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-12 col-md-12">
                                <button type="submit" class="btn btn-info" id="swal-edit">
                                    Editar
                                </button>
                                <a href="{{ route('roles.index')}}" class="btn btn-danger">
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
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script>
        $(".check_all").on("click", function(){
            $(".name").each(function(){
                $(this).attr("checked", true);
            });
        });
    </script>
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
