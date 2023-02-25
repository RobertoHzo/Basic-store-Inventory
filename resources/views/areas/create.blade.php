@extends('layouts.app')
@section('title')
Areas
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear area</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- validation --}}
                            @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                <strong>Check again</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{$error}}</span>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            {!! Form::open(array('route'=>'areas.store', 'method'=>'POST'))!!}

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombre">Name</label>
                                        {{-- {!! Form::text('nombre',null, array('class'=>'form-control'))!!} --}}
                                        <input type="text" name="nombre" class="form-control" autofocus>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary" id="add">Guardar</button>
                                    <a href="{{ route('areas.index')}}" class="btn btn-danger">
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
