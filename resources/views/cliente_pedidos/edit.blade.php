@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Cliente pedido</h3>
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

                         {!! Form::model($cliente_pedido, ['method' => 'PATCH', 'route' => ['cliente_pedidos.update', $cliente_pedido->id]]) !!}
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="producto_id">producto_id</label>
                                    {!! Form::number('producto_id',null, array('class'=>'form-control'))!!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="pedido_id">pedido_id</label>
                                    {!! Form::number('pedido_id',null, array('class'=>'form-control'))!!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="hora entrega">hora entrega</label>
                                    {!! Form::text('hora entrega',null, array('class'=>'form-control'))!!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="fecha">fecha</label>
                                    {!! Form::text('fecha',null, array('class'=>'form-control'))!!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="cantidad">cantidad</label>
                                    {!! Form::number('cantidad',null, array('class'=>'form-control'))!!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-12 col-md-12">
                                <button type="submit" class="btn btn-info" id="swal-edit">
                                    Editar
                                </button>
                                <a href="{{ route('cliente_pedidos.index')}}" class="btn btn-danger">
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
