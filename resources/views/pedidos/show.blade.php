@extends('layouts.app')
@section('title')
Pedidos
@endsection
@section('content')
<?php
$total = number_format($pedido->total,2);
?>
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Información del pedido: <b>{{$pedido->order_number}}</b></h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mt-2">
                                <thead style="background-color: #83d7c7">
                                    <th style="color: white">Id</th>
                                    <th style="color: white">Cantidad de productos</th>
                                    <th style="color: white">Productos, cantidad</th>
                                    <th style="color: white">Status</th>
                                    <th style="color: white">Precio total</th>

                                </thead>
                                <tbody>
                                    <td>{{ $pedido->id }}</td>
                                    <td>{{$pedido->item_count}}</td>
                                    <td>
                                        @foreach ($pedido->items as $item)
                                        <b>{{$item->producto->nombre}} → {{$item->cantidad}}</b>  <br>
                                        @endforeach
                                    </td>

                                    <td>{{ strtoupper($pedido->status) }}</td>
                                    <td>$ {{ $total }}</td>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover " style=" min-width: auto !important;width:100%;">
                                <thead style="background-color: #83d7c7">
                                    <th style="color: white">Notas</th>
                                    <th style="color: white">Fecha de entrega</th>
                                    @if ($pedido->status  =!'Completado')
                                    <th></th>
                                    @else

                                    @endif

                                </thead>
                                <tbody>
                                    @if ($pedido->notes === 'undefined'|| !isset($pedido->notes))
                                    <td>n/a</td>
                                    @else
                                    <td>{{ $pedido->notes }}</td>
                                    @endif
                                    <td>{{ $pedido->hora_entrega }}</td>

                                    @if ($pedido->status  =!'Completado')
                                    <td>Para cambiar la fecha de entrega favor de llamar para solicitar el cambio</td>

                                    @else

                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mt-2">
                                <thead style="background-color: #83d7c7">
                                    <th style="color: white">Usuario</th>
                                    <th style="color: white">Estado del pago</th>
                                    <th style="color: white">Fecha de pago</th>
                                    <th style="color: white">Fecha de modificación</th>
                                </thead>
                                <tbody>
                                    <td>{{ $pedido->user->name }} {{ $pedido->user->lastname }}</td>
                                    <td>{{$pedido->payment_status}}</td>
                                    <td>{{$pedido->fecha}}</td>
                                    <td>{{$pedido->updated_at}}</td>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <a href="{{route('pedidos.index')}}" class="btn btn-light">Regresar</a>
                        <a href="{{ route('pedidos.edit', $pedido->id)}}" class="btn btn-info">Editar la hora de entrega</i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
