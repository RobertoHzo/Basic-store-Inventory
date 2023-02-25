@extends('main.layouts.layout_auth')

@section('content')
<section class="ftco-section" style="padding: 9em 0;
padding-bottom: 2em;
position: relative;
background-color: rgb(255, 255, 255);">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11" >
            <div class="card">
                <div class="card-header">Información del cliente</div>
                <div class="card-body">
                    <div class="">
                        <h6>{{\Illuminate\Support\Facades\Auth::user()->name}} </h6><br>
                        <h6>{{\Illuminate\Support\Facades\Auth::user()->lastname}}</h6><br>
                        <h6>{{\Illuminate\Support\Facades\Auth::user()->email}}</h6><br>
                        <h6>{{\Illuminate\Support\Facades\Auth::user()->phone}}</h6><br>
                        {{-- <div class="d-grid">
                            <a href="{{ url('logout') }}" class="btn btn-danger"
                            onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                            Sign-out</a>
                        </div> --}}
                        {{-- <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                            {{ csrf_field() }}
                        </form> --}}
                        @if ($user->is_admin===1)

                        @else
                        <a class="btn btn-info" href="{{ route('cliente.edit',$user->id) }}">Editar información de usuario</a>

                        @endif

                    </div>
                    <div style="border-top: 1px solid black;height: 2px;padding: 10px;margin: 20px auto 0 auto;"></div>

                    <div class="">
                        <h2>Pedidos realizados</h2>
                        <div class="table-responsive">
                            <table class="table table-hover"  style="min-width: auto !important;" id="table_id">
                                <thead class="thead" style="background-color: whitesmoke">
                                    <th scope="col">Ver pedido</th>

                                    <th scope="col">No. de pedido</th>
                                    <th scope="col">$ Total</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Notas</th>
                                    <th scope="col">Fecha de entrega</th>
                                    <th scope="col">Fecha de creación</th>

                                    <th scope="col">Status</th>
                                    <th scope="col">Status de pago</th>

                                </thead>
                                <tbody>
                                    @forelse ($pedidos as $pedido)
                                    <tr>
                                        <td>
                                            <a class="btn btn-info  text-white" href="{{route('info.show',$pedido->id)}}"><i class="fa fa-receipt"></i></a>
                                        </td>
                                        <td>{{ $pedido->order_number }}</td>
                                        {{-- @foreach ($prods where $prods->pedido_id === $pedido->id as $items)
                                            <td>{{ $items->nombre }}</td>
                                            @endforeach --}}
                                            <td>{{ config('settings.currency_symbol') }}{{ round($pedido->total, 2) }}</td>
                                            <td>{{ $pedido->item_count }}</td>
                                            @if ($pedido->notes === 'undefined'|| !isset($pedido->notes))
                                            <td>n/a</td>

                                            @else
                                            <td>{{ $pedido->notes }}</td>

                                            @endif
                                            <td>{{ $pedido->hora_entrega }}</td>

                                            <td>{{ $pedido->fecha }}</td>

                                            @if ($pedido->status === 'Completado')
                                            <td><span class="badge badge-success">{{ strtoupper($pedido->status) }}</span></td>
                                            @else
                                            <td><span class="badge badge-danger">{{ strtoupper($pedido->status) }}</span></td>
                                            @endif

                                            @if ($pedido->payment_status === 'COMPLETED')
                                            <td><span class="badge badge-success">{{ strtoupper($pedido->payment_status) }}</span></td>
                                            @else
                                            <td><span class="badge badge-danger">{{ strtoupper($pedido->payment_status) }}</span></td>

                                            @endif

                                        </tr>
                                        @empty
                                        <div class="col-sm-12">
                                            <p class="alert alert-warning">Sin pedidos para mostrar.</p>
                                        </div>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>


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
            "order":[6,'des'],
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
