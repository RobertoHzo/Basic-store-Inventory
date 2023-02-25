@extends('layouts.app')
@section('title')
Productos
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page_heading">Productos</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('crear-producto')
                        <a href="{{ route('productos.create') }}" class="btn btn-warning">Nuevo producto</a>
                        @endcan
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mt-2" id="table_id">
                                <thead style="background-color: #0C0F0A">
                                    <th style="color: white">ID</th>
                                    <th style="color: white">Nombre</th>
                                    <th style="color: white">Categoria</th>
                                    <th style="color: white">Precio</th>
                                    <th style="color: white">Descripcion</th>
                                    <th style="color: white">Imagen</th>
                                    <th style="color: white">Disponible</th>
                                    <th style="color: white">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{$producto->id}}</td>
                                        <td>{{$producto->nombre}}</td>
                                        @if (!isset($producto->categorias->nombre))
                                        <td>Asignar una categoria</td>
                                        @else
                                        <td>{{$producto->categorias->nombre}}</td>
                                        @endif
                                        <td>$ {{$producto->precio}}</td>

                                        <td>{{$producto->descripcion}}</td>
                                        <td width="120px">

                                            <a target="_blank" href="admin/img/{{$producto->imagen}}" style="background-image: url(admin/img/{{$producto->imagen}}); background-size: cover; background-repeat: no-repeat; background-position: center center; display: flex; height: 120px; border: 1px solid black; border-radius:4px;"></a>
                                            {{-- <img  src="admin/img/{{$producto->imagen}}" width="120px"  style="max-height: 120px; border-style: solid;" alt="{{$producto->imagen}}"> --}}


                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- <td>{{$producto->disponible}}</td> --}}
                                        <td >
                                            @if ($producto->disponible== "SI" & !isset($producto->categorias->nombre))
                                            <h5><span class="badge badge-warning" >{{$producto->disponible}}</span></h5>
                                            <p>Debe de asignar una categoria</p>
                                            @elseif($producto->disponible!= "SI" & !isset($producto->categorias->nombre))
                                            <h5><span class="badge badge-danger" >{{$producto->disponible}}</span></h5>
                                            <p>Debe de asignar una categoria</p>
                                            @elseif ($producto->disponible== "SI")
                                            <h5><span class="badge badge-success" >{{$producto->disponible}}</span></h5>
                                            @else
                                            <h5><span class="badge badge-danger" >{{$producto->disponible}}</span></h5>
                                            @endif
                                        </td>
 
                                        <td>
                                            @can('editar-producto')
                                            <a href="{{ route('productos.edit', $producto->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                            @endcan
                                            @can('eliminar-producto')
                                            {!! Form::open(['method'=> 'DELETE', 'route'=> ['productos.destroy', $producto->id], 'style'=>'display: inline', 'class'=>'formEliminar',]) !!}
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
                                {!! $productos->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" defer></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable({
                autoWidth: false,

                "paging": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }

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
                        title: '¿Confirma la eliminación del producto?',
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
                                title: 'El producto ha sido eliminado',
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
