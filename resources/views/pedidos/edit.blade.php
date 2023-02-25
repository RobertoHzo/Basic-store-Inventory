@extends('layouts.app')
@section('title')
Pedidos
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar hora de entrega del pedido: {{$pedido->order_number}}</h3>
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

                        {!! Form::model($pedido, ['method' => 'PATCH', 'route' => ['pedidos.update', $pedido->id]]) !!}
                        <div class="row">




                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group ">
                                    <label for="HoraEntrega" >Hora de entrega actual</label>
                                    <br>

                                    <p name="HoraEntrega"><?php echo (new DateTime($pedido->hora_entrega))->format('d/m/Y, H:i');?></p>
                                    
                                    <br>
                                    <label for="hora_entrega" >Nueva hora de entrega</label>
                                    <br>
                                    <input type="datetime-local" id="hora_entrega" name="hora_entrega" min="<?php echo (new DateTime())->format('Y-m-d H:i');?>" value="<?php echo (new DateTime())->format('Y-m-d H:i');?>" required>
                                </div>
                            </div>


                            <div class="col-xs-12 col-md-12 col-md-12">
                                <button type="submit" class="btn btn-info" id="swal-edit">
                                    Editar
                                </button>
                                <a href="{{ route('pedidos.index')}}" class="btn btn-danger">
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
@endsection
