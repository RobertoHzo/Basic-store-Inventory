@extends('layouts.app')
@section('title')
Pedidos
@endsection
@section('content')

<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Pedidos</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h3 class="text-center">Dashboard Content</h3> --}}
                        {{-- @can('crear-rol')
                        <a href="{{ route('pedidos.create') }}" class="btn btn-warning">Nuevo pedido</a>
                        @endcan --}}
                        <form action="{{route('pedidos.index')}}">
                            <h6>Filtrar por fechas</h6>

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
                                            <a href="{{ route('pedidos.index')}}" class="btn btn-info">Limpiar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">

                            <table class="table table-hover table-striped mt-2" id="table_id" style="width: 100%;min-width:auto;">
                                <thead >
                                    <th style="color: white" class="col-0">ID</th>
                                    <th style="color: white" class="col-0">Ver pedido</th>
                                    <th style="color: white" class="col-0">Número de orden</th>
                                    <th style="color: white" class="col-3">Usuario</th>
                                    <th style="color: white" class="col-0">Status</th>

                                    <th style="color: white" class="col-0"># productos</th>
                                    <th style="color: white" class="col-6">Productos, cantidad</th>

                                    <th style="color: white" class="col-1">$ Total</th>
                                    {{-- <th style="color: white">Status del pago</th> --}}
                                    {{-- <th style="color: white">Notes</th> --}}
                                    {{-- <th style="color: white">Hora entrega</th> --}}
                                    <th style="color: white" class="col-2">Fecha</th>
                                    <th style="color: white" class="col-0">Completar</th>

                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $pedido)
                                    <tr>
                                        <td>{{$pedido->id}}</td>
                                        <td>
                                            <a class="btn btn-info  text-white" href="{{ route('pedidos.show',$pedido->id) }}"><i class="fa fa-receipt"></i></a>
                                        </td>

                                        <td>{{$pedido->order_number}}</td>

                                        <td>{{$pedido->user->name}} {{$pedido->user->lastname}}</td>
                                        @if ($pedido->status === 'Completado')
                                        <td><span class="badge badge-success">{{strtoupper($pedido->status)}}</span></td>
                                        @else
                                        <td><span class="badge badge-danger">{{strtoupper($pedido->status)}}</span></td>

                                        @endif
                                        <td>{{$pedido->item_count}}</td>
                                        <td>
                                            @foreach ($pedido->items as $item)
                                            <b>{{$item->producto->nombre}} → {{$item->cantidad}}</b>  <br>
                                            @endforeach
                                        </td>
                                        <td>$ {{number_format($pedido->total,2)}}</td>
                                        {{-- @if ($pedido->payment_status === 'COMPLETED')
                                        <td><span class="badge badge-info">COMPLETADO</span></td>

                                        @else
                                        <td><span class="badge badge-info">{{$pedido->payment_status}}</span></td>

                                        @endif --}}
                                        {{-- <td>{{$pedido->notes}}</td> --}}
                                        {{-- <td>{{$pedido->hora_entrega}}</td> --}}
                                        <td id="pedido-{{$pedido->id}}">{{$pedido->fecha}}</td>



                                        <script>
                                            var d = {{$pedido->fecha}};
                                            let text = d.toLocaleString();
                                            document.getElementById("pedido-".{{$pedido->id}}).innerHTML = text;
                                        </script>


                                        <td>
                                            @if ($pedido->status === 'Completado')
                                            {!! Form::open(['method'=> 'PUT', 'route'=> ['pedidos.update', $pedido->id], 'style'=>'display: inline', 'class'=>'formCancelar',]) !!}
                                            <input type="hidden" name="status" id="status" value="Por completar">

                                            <button class='btn btn-danger' type='submit' value='submit'>
                                                <i class='fa fa-times'> </i> </button>
                                                {!! Form::close() !!}
                                                @else
                                                {!! Form::open(['method'=> 'PUT', 'route'=> ['pedidos.update', $pedido->id], 'style'=>'display: inline', 'class'=>'formEliminar',]) !!}
                                                <input type="hidden" name="status" id="status" value="Completado">

                                                <button class='btn btn-success' type='submit' value='submit'>
                                                    <i class='fa fa-check'> </i> </button>
                                                    {!! Form::close() !!}
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="table-responsive">
                                    </div>
                                    <div class="pagination justify-content-end">
                                        {!! $pedidos->links() !!}
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
            <script type="text/javascript">
                $(document).ready( function () {
                    $('#table_id').DataTable({
                        // "paging": false,
                        "order":[ 8, 'des'],
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
                                title: '¿Confirmar la realizacion del pedido?',
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
                                        title: 'El pedido ha sido completado',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                }
                            })
                        }, false)
                    })
                })()
            </script>
            <script>
                (function () {
                    'use strict'
                    //debemos crear la clase formEliminar dentro del form del boton borrar
                    //recordar que cada registro a eliminar esta contenido en un form
                    var forms = document.querySelectorAll('.formCancelar')
                    Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                        form.addEventListener('submit', function (event) {
                            event.preventDefault()
                            event.stopPropagation()
                            Swal.fire({
                                title: '¿Confirmar la NO realizacion del pedido?',
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
                                        title: 'El pedido ha sido desacompletado',
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
