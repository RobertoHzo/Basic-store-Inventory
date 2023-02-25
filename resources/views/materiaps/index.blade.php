@extends('layouts.app')
@section('title')
Materia prima
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Materia prima</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h3 class="text-center">Dashboard Content</h3> --}}
                        @can('crear-materia_prima')
                        <a href="{{ route('materiaps.create') }}" class="btn btn-warning">Nuevo Materia prima</a>
                        {{-- <a href="{{ route('entradas') }}" class="btn btn-primary">Entradas y salidas</a> --}}
                        @endcan
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mt-2 display nowrap" id="table_id">
                                <thead style="background-color: #0C0F0A">
                                    <th style="color: white">ID</th>
                                    <th style="color: white">Nombre</th>
                                    <th style="color: white">Proveedor</th>
                                    <th style="color: white">Cantidad</th>
                                    <th style="color: white">Editar cantidad</th>
                                    <th style="color: white">Costo</th>
                                    <th style="color: white">Area</th>
                                    <th style="color: white">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($materiaps as $materiap)
                                    <tr>
                                        <td>{{$materiap->id}}</td>
                                        <td>{{$materiap->nombre}}</td>
                                        @if (!isset($materiap->proveedors->nombre))
                                        <td>Asignar un proveedor</td>
                                        @else
                                        <td>{{$materiap->proveedors->nombre}}</td>
                                        @endif

                                        <td>{{$materiap->cantidad}}</td>
                                        <td><div>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$materiap->id}}">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade"  id="exampleModal{{$materiap->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content" >
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modificar cantidad de: {{$materiap->nombre}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! Form::open(['method'=> 'PUT', 'route'=> ['materiaps.update', $materiap->id], 'style'=>'display: inline', ]) !!}
                                                            <input type="number" name="cantidad" autofocus>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class='btn btn-primary' type='submit' value='submit'>
                                                                Actualizar </button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                {!! Form::close() !!}
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </td>
                                        <td>$ {{$materiap->precio}}</td>

                                        @if (!isset($materiap->areas->nombre))
                                        <td>Asignar un area</td>
                                        @else
                                        <td>{{$materiap->areas->nombre}}</td>
                                        @endif

                                        <td>
                                            @can('editar-materia_prima')
                                            <a class="btn btn-info" href="{{ route('materiaps.edit', $materiap->id) }}"><i class="fas fa-edit"></i></a>
                                            @endcan
                                            @can('eliminar-materia_prima')
                                            {!! Form::open(['method'=> 'DELETE', 'route'=> ['materiaps.destroy', $materiap->id], 'style'=>'display: inline', 'class'=>'formEliminar',]) !!}
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
                                {!! $materiaps->links() !!}
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
    {{-- <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable({
                "paging": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }

            });
        } );
    </script> --}}

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
                    visible: false
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
                        title: '¿Confirma la eliminación de la materia prima?',
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
                                title: 'La materia prima ha sido eliminada',
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
