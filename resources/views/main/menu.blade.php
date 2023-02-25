@extends('main.layouts.layout')
@section('top')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/barra.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread neonText">Nuestro Menú</h1>
                    {{-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menú</span></p> --}}
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('content')

{{-- menu con cart --}}
<section class="ftco-menu mb-5 pb-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Descubra</span>
                <h2 class="mb-4">Nuestros productos</h2>
                <br>
            </div>
        </div>
        {{-- para que la primera categoria sea la activa --}}
        @php
        $min = $categorias[0];
        @endphp
        <div class="row d-md-flex">
            <div class="col-lg-12 ftco-animate p-md-5">
                <div class="row">
                    <div class="col-md-12 nav-link-wrap mb-5">
                        <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="margin-bottom: 20px;">
                            @foreach ($categorias as $categoria)
                            @if ($categoria==$min)
                            <a class="nav-link active" id="{{$categoria->id}}-tab" data-toggle="pill" href="#v-{{$categoria->id}}" role="tab" aria-controls="v-{{$categoria->id}}" aria-selected="true">{{$categoria->nombre}}</a>
                            @else
                            <a class="nav-link " id="{{$categoria->id}}-tab" data-toggle="pill" href="#v-{{$categoria->id}}" role="tab" aria-controls="v-{{$categoria->id}}" aria-selected="false">{{$categoria->nombre}}</a>
                            @endif
                            @endforeach
                            {{-- <a class="nav-link " id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Main Dish</a>
                            <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>
                            <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a> --}}
                        </div>
                    </div>

                    <div class="col-md-12 d-flex align-items-center">
                        <div class="tab-content ftco-animate" id="v-pills-tabContent">
                            @foreach ($categorias as $categoria)
                            @if ($categoria==$min)
                            <div class="tab-pane fade show active" id="v-{{$categoria->id}}" role="tabpanel" aria-labelledby="{{$categoria->id}}-tab">
                                @else
                                <div class="tab-pane fade show " id="v-{{$categoria->id}}" role="tabpanel" aria-labelledby="{{$categoria->id}}-tab">
                                    @endif
                                    <div class="row">
                                        @foreach ($productos as $producto)
                                        @if ($producto->disponible=="SI"&&$producto->categoria_id==$categoria->id)
                                        <div class="col-md-4 text-center">
                                            <div class="menu-wrap">
                                                {{-- <a href="#" class="menu-img img mb-4" style="background-image: url(admin/img/{{$producto->imagen}});"></a> --}}
                                                <img src="admin/img/{{$producto->imagen}}" alt="{{$producto->nombre}}" class="menu-img img mb-4">
                                                {{-- <img class="menu-img img mb-4" style="background-image: url(images/Banana.jpeg);"/> --}}
                                                <div class="text">
                                                    <h3>{{$producto->nombre}}</h3>
                                                    <p>{{$producto->descripcion}}</p>
                                                    <p class="price"><span>$ {{$producto->precio}}</span></p>
                                                    {{-- Carrito --}}
                                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{ $producto->id }}" name="id">
                                                        <input type="hidden" value="{{ $producto->nombre }}" name="name">
                                                        <input type="hidden" value="{{ $producto->precio }}" name="price">
                                                        <input type="hidden" value="{{ $producto->imagen }}"  name="image">
                                                        <input type="hidden" value="1" name="quantity">
                                                        <p><button class="btn btn-primary btn-outline-primary">Añadir al carrito</button></p>
                                                    </form>
                                                    {{-- <p><a href="#" class="btn btn-primary btn-outline-primary">Añadir al carrito</a></p> --}}
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    @endsection

