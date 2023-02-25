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
                    <div class="card-body">
                        <div class="">
                            <h2>Información del pedido: {{$pedido->order_number}}</h2>
                            {{-- <div class="table-responsive">
                                <table class="table table-hover"  style="min-width: auto !important;" id="table_id">
                                    <thead class="thead-dark">

                                        <th scope="col">No. de pedido</th>
                                        <th scope="col">$ Total</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Fecha</th>

                                        <th scope="col">Status</th>
                                        <th scope="col">Status de pago</th>

                                    </thead>
                                    <tbody>

                                            <td>{{ $pedido->order_number }}</td>

                                            <td>{{ config('settings.currency_symbol') }}{{ round($pedido->total, 2) }}</td>
                                            <td>{{ $pedido->item_count }}</td>
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



                                    </tbody>
                                </table>
                            </div> --}}
                            <div class="table-responsive">
                                <table class="table table-hover  " style=" min-width: auto !important;width:100%;">
                                    <thead style="background-color: #83d7c7;">
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
                                        <td>$ {{ number_format($pedido->total,2) }}</td>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover " style=" min-width: auto !important;width:100%;">
                                    <thead style="background-color: #83d7c7">
                                        <th style="color: white">Notas</th>
                                        <th style="color: white">Fecha de entrega</th>

                                    </thead>
                                    <tbody>
                                        @if ($pedido->notes === 'undefined'|| !isset($pedido->notes))
                                            <td>n/a</td>
                                            @else
                                            <td>{{ $pedido->notes }}</td>
                                            @endif
                                            <td>{{ $pedido->hora_entrega }}</td>

                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover " style=" min-width: auto !important;width:100%;">
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
                            <a href="{{route('dashboard')}}" class="btn btn-light">Regresar</a>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
