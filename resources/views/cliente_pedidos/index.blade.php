@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">cliente pedido</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h3 class="text-center">Dashboard Content</h3> --}}
                        @can('crear-rol')
                        <a href="{{ route('cliente_pedidos.create') }}" class="btn btn-warning">Nuevo cliente pedido</a>
                        @endcan
                        <br>
                        <br>
                        <div class="table-responsive">

                            <table class="table table-hover table-striped mt-2" id="table_id">
                                <thead style="background-color: #0C0F0A">
                                    <th style="color: white">ID</th>
                                    <th style="color: white">producto_id</th>
                                    <th style="color: white">pedido_id</th>
                                    <th style="color: white">hora_entrega</th>
                                    <th style="color: white">fecha</th>
                                    <th style="color: white">cantidad</th>

                                    <th style="color: white">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($cliente_pedidos as $cliente_pedido)
                                    <tr>
                                        <td>{{$cliente_pedido->id}}</td>
                                        <td>{{$cliente_pedido->producto_id}}</td>
                                        <td>{{$cliente_pedido->pedido_id}}</td>
                                        <td>{{$cliente_pedido->hora_entrega}}</td>
                                        <td>{{$cliente_pedido->fecha}}</td>
                                        <td>{{$cliente_pedido->cantidad}}</td>
                                        <td>
                                            @can('editar-rol')
                                            <a class="btn btn-info" href="{{ route('cliente_pedidos.edit', $cliente_pedido->id) }}"><i class="fas fa-edit"></i></a>
                                            @endcan
                                            @can('eliminar-rol')
                                            {!! Form::open(['method'=> 'DELETE', 'route'=> ['cliente_pedidos.destroy', $cliente_pedido->id], 'style'=>'display: inline', 'class'=>'formEliminar',]) !!}
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
                                {!! $cliente_pedidos->links() !!}
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
                "paging": false

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
