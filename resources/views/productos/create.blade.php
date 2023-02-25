@extends('layouts.app')
@section('title')
Productos
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Crear producto</h3>
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
                        {{-- **************************** FORM ************************************** --}}
                        {!! Form::open(array('route'=>'productos.store', 'method'=>'POST', 'enctype'=> 'multipart/form-data'))!!}

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    {{-- {!! Form::text('nombre',null, array('class'=>'form-control'))!!} --}}
                                    <input type="text" name="nombre" class="form-control" autofocus>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    {!! Form::text('descripcion',null, array('class'=>'form-control'))!!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Categoria</label>
                                    {!! Form::select('categoria_id', $categorias,null, ['placeholder'=>'Seleccione una categoria','class'=>'form-control'])!!}
                                </div>
                            </div>


                            <div class="col-xs-6 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    {!! Form::number('precio',null, array('class'=>'form-control'))!!}
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    {{-- {!! Form::imagen('imagen',null,array('class'=>'form-control'))!!} --}}
                                    <input type="file" name="imagen" id="imagen">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="disponible">Disponible</label>
                                    {!! Form::select('disponible',['SI' => 'SI','NO'=>'NO',],'SI',['class'=>'form-control']) !!}
                                </div>
                            </div>
                            {{-- ************************************************************* --}}
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary" id="add">Guardar</button>
                                <a href="{{ route('productos.index')}}" class="btn btn-danger">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById("add").addEventListener("click", success);

    function success() {
        Swal.fire({
            icon: 'success',
            title: 'Registro añadido correctamente',
            showConfirmButton: false,
            timer: 3000
        })
        }
</script>
@endsection
