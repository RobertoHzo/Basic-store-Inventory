@extends('layouts.app')
@section('title')
Usuarios
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Usuarios</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h3 class="text-center">Dashboard Content</h3> --}}
                        @can('crear-usuario')
                        <a href="{{ route('users.create') }}" class="btn btn-warning">Nuevo Usuario</a>
                        @endcan
                        <br>
                        <br>
                        <form action="{{route('users.index')}}">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group row">
                                        <label for="date" class="col-form-label col-sm-2">Fecha inicial</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control input-sm" id="uno" name="uno" required>
                                        </div>
                                        <label for="date" class="col-form-label col-sm-2">Fecha final</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control input-sm" id="dos" name="dos" required>
                                        </div>
                                        <div class="col-sm-2 btn-group-vertical">
                                            <button class="btn btn-primary" type="submit" name="search" title="Buscar">Buscar</button>
                                            <a href="{{ route('users.index')}}" class="btn btn-info">Limpiar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <div class="table-responsive">
                            <table class="table table-hover table-striped mt-2 display nowrap" id="table_id">
                                <thead style="background-color: #0C0F0A">
                                    <th style="color: white">ID</th>
                                    <th style="color: white">Nombre</th>
                                    <th style="color: white">Apellidos</th>

                                    <th style="color: white">E-mail</th>
                                    <th style="color: white">Teléfono</th>

                                    <th style="color: white">Fecha de creación</th>

                                    <th style="color: white">Rol</th>
                                    <th style="color: white" class="col-md-0">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->lastname}}</td>

                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $roleName)
                                            <h5><span class="badge badge-dark" >{{$roleName}}</span></h5>
                                            @endforeach
                                            @endif
                                        </td>
                                        <td class="col-md-0">
                                            @can('editar-usuario')
                                            <a class="btn btn-info" href="{{ route('users.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
                                            @endcan
                                            @can('eliminar-usuario')
                                            {!! Form::open(['method'=> 'DELETE', 'route'=> ['users.destroy', $user->id], 'style'=>'display: inline', 'class'=>'formEliminar',]) !!}
                                            <button class='btn btn-danger' type='submit' value='submit'>
                                                <i class='fa fa-eraser'> </i> </button>
                                                {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination justify-content-end">
                                {!! $users->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" defer></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" defer ></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" ></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" ></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js" defer></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js" defer ></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js" defer ></script>
    {{-- ///////////////////////////////////////////////// --}}
    {{-- <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css"> --}}
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" defer></script> --}}
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable({
                // "paging": false,
                "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
                dom: 'Bfrtip',
                lengthMenu: [
                [10,25,50,-1],
                ['10 columnas','25 rows', '50 rows', 'Mostrar todo']
                ],
                columnDefs:[
                {
                    targets: 0,
                    visible: true
                }
                ],
                buttons: [
                'copy','csv','excel','pdf','pageLength',
                {
                    extend : 'print',
                    exportOptions:{
                        columns: ':visible'
                    }
                }, 'colvis'
                ]

            });
        } );
    </script>
    <script>
        (function () {
            'use strict'
            //debemos crear la clase formEliminar dentro del form del boton borrar
            //recordar que cada registro a eliminar esta contenido en un form
            var forms = document.querySelectorAll('.formEliminar')
            Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault()
                    event.stopPropagation()
                    Swal.fire({
                        title: '¿Confirma la eliminación del usuario?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#20c997',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Confirmar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            // Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                            Swal.fire({

                                icon: 'success',
                                title: 'El usuario ha sido eliminado',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    })
                }, false)
            })
        })()
    </script>

    @endsection
