
@extends('main.layouts.layout')

@section('top')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(images/panoramica2.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    {{-- <span class="subheading">Bienvenidos</span> --}}
                    <h1 class="mb-4 neonText">Snack & Roll Diner</h1>
                    <p class="mb-4 mb-md-5">Las mejores burgers y malteadas, con un tema retro inspirado en los años 50's. </p>
                    <p><a href="menu" class="btn btn-primary p-3 px-xl-4 py-xl-3">Ver Menú</a> </p>
                </div>

            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image: url(images/Panoramica.jpeg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    {{-- <span class="subheading">Bienvenidos</span> --}}
                    <h1 class="mb-4 neonText">Snack & Roll Diner</h1>
                    <p class="mb-4 mb-md-5">Te esperamos en el Diner con un delicioso menú y el mejor ambiente </p>
                    <p><a href="menu" class="btn btn-primary p-3 px-xl-4 py-xl-3">Ver Menú</a> </p>
                </div>

            </div>
        </div>
    </div>


</section>
@endsection

@section('content')
{{-- descubra --}}
<section class="ftco-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pr-md-5">
                <div class="heading-section text-md-right ftco-animate">
                    <span class="subheading">Descubra</span>
                    <h2 class="mb-4">Nuestro Menú</h2>
                    <p class="mb-4">Nos vemos hoy en nuestro #RetroDiner para que disfrutes de unas buenas burgers, malteadas y unos deliciosos waffles. </p>
                    <p><a href="menu" class="btn btn-primary btn-outline-primary px-4 py-3">Ver menu completo</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row" >
                    <div class="col-md-6">
                        <div class="menu-entry">
                            <a  href="#" class="img" style="background-image: url(images/WaffleNieve.jpeg);cursor:auto;"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry mt-lg-4">
                            <a href="#" class="img" style="background-image: url(images/MalteadaCoca.jpeg);cursor:auto;"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url(images/mazapan.jpeg);cursor:auto;"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry mt-lg-4">
                            <a href="#" class="img" style="background-image: url(images/Hamburguesa4.jpeg);cursor:auto;"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Mas vendidos --}}
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Productos</span>
                <h2 class="mb-4">Más vendidos</h2>
                <p>Disfrute de las burgers y malteadas mas consumidas por nuestros clientes.</p>
            </div>
        </div>
        <div class="row">

            @foreach ($productos as $producto)
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(admin/img/{{$producto->imagen}}); cursor:auto;"></a>
                    <div class="text text-center pt-4">
                        <h3>{{$producto->nombre}}</h3>
                        <p>{{$producto->descripcion}}</p>
                        <p class="price"><span>$ {{$producto->precio}}</span></p>
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $producto->id }}" name="id">
                            <input type="hidden" value="{{ $producto->nombre }}" name="name">
                            <input type="hidden" value="{{ $producto->precio }}" name="price">
                            <input type="hidden" value="{{ $producto->imagen }}"  name="image">
                            <input type="hidden" value="1" name="quantity">
                            <p><button class="btn btn-primary btn-outline-primary">Añadir al carrito</button></p>
                        </form>
                        {{-- <p><a href="#" class="btn btn-primary btn-outline-primary">Agregar al carrito</a></p> --}}
                    </div>
                </div>
            </div>
            @endforeach

            {{-- <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(images/nieveRoja.jpeg);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">Coffee Capuccino</a></h3>
                        <p>A small river named Duden flows by their place and supplies</p>
                        <p class="price"><span>$5.90</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div> - --}}

        </div>
    </div>
</section>
{{-- servicios --}}
<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-choices"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Ordene ahora</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-delivery-truck"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Recoga en tienda</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-coffee-bean"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Productos de calidad</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- gallery --}}
<section class="ftco-gallery">
    <div class="container-wrap">
        <div class="row no-gutters">
            <div class="col-md-3 ftco-animate">
                <a href="javascript:void(0);" class="gallery img d-flex align-items-center" style="background-image: url(images/Hamburguesa3.jpeg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="javascript:void(0);" class="gallery img d-flex align-items-center" style="background-image: url(images/Waffle.jpeg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="javascript:void(0);" class="gallery img d-flex align-items-center" style="background-image: url(images/Hotdog2.jpeg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="javascript:void(0);" class="gallery img d-flex align-items-center" style="background-image: url(images/mazapan.jpeg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>





@endsection


