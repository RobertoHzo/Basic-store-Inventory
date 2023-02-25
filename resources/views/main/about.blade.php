@extends('main.layouts.layout')

@section('top')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/sillas.jpeg);" data-stellar-background-ratio="0.5">
        <div class="overlay">
        </div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread neonText">Sobre Nosotros
                    </h1>
                    {{-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>About</span></p> --}}
                </div>

            </div>
        </div>
    </div>
</section>


@endsection

@section('content')
{{-- historia --}}
<section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url(images/Panoramica.jpeg); ">
    </div>
    <div class="one-half ftco-animate">
        <div class="overlap">
            <div class="heading-section ftco-animate ">
                <span class="subheading">Nuestra</span>
                <h2 class="mb-4">Historia</h2>
            </div>
            <div>
                <p>Snack n Roll nace el día 1 de Junio del 2018 en un pequeño local de la colonia villa florida creado como un negocio familiar, como un lugar donde encontrar postres y pequeños refrigerios, teniendo como primeros colaboradores los miembros de la familia, con un concepto de fuente de sodas de los años cincuenta, al poco tiempo se mudan a una ubicación donde se instala un espacio más amplio como restaurante y contratando a nuestros 2 primeros colaboradores, al paso de unos meses se empieza a modificar el menú por la demanda de productos más elaborados, después de un par de años operando con gran éxito se reubica a nuestro actual local conservando el concepto de los años 50, agregando al nombre la palabra Diner (nombre que se les da a las cafeterías con nuestro concepto en EU) y ahora operando como restaurante. </p>
            </div>
        </div>
    </div>
</section>

<section>
    {{-- <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Testimony</span>
                <h2 class="mb-4">Customers Says</h2>
                <br>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>
    </div> --}}
    <div class="container-wrap" style="border-top-style: outset">
        <div class="row d-flex no-gutters" style="background-color: #bd2828; border-right-style: groove;">
            <div class="col-lg " style="border-right-style: groove;">
                <div class="testimony overlay">
                    <blockquote>
                        <div class=" d-flex mt-4">

                            <div class="name align-self-center">MISIÓN
                            </div>
                        </div>
                        <br>
                        <p>&ldquo;Mejorar la calidad de vida de nuestros clientes y empleados ofreciendo una amplia variedad de productos cerca de sus casas.&rdquo;</p>
                    </blockquote>

                </div>
            </div>
            <div class="col-lg " style="border-right-style: groove;">
                <div class="testimony overlay">
                    <blockquote>
                        <div class=" d-flex mt-4">
                            <div class="name align-self-center">VISIÓN
                            </div>
                        </div>
                        <br>
                        <p>&ldquo;Como empresa buscamos ser un mejor lugar para vender nuestros productos ofreciendo a los clientes en Reynosa productos de buena calidad al mejor precio.&rdquo;</p>
                    </blockquote>

                </div>
            </div>
            <div class="col-lg " style="border-right-style: groove;">
                <div class="testimony overlay">
                    <blockquote>
                        <div class=" d-flex mt-4">

                            <div class="name align-self-center">VALORES
                            </div>
                        </div>
                        <br>
                        <p>&ldquo;A nuestros clientes les brindamos la tranquilidad de que los productos y servicios que ofrecemos son de primera calidad. Y a nuestros proveedores se les ofrece una comunicación de ganar-ganar transparencia y lealtad.&rdquo;</p>
                    </blockquote>

                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="ftco-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pr-md-5">
                <div class="heading-section text-md-right ftco-animate">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Our Menú</h2>
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    <p><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menú</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url(main/images/menu-1.jpg);"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry mt-lg-4">
                            <a href="#" class="img" style="background-image: url(main/images/menu-2.jpg);"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url(main/images/menu-3.jpg);"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry mt-lg-4">
                            <a href="#" class="img" style="background-image: url(main/images/menu-4.jpg);"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

{{-- <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(main/images/bg_2.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span>
                                </div>
                                <strong class="number" data-number="100">0</strong>
                                <span>Coffee Branches</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span>
                                </div>
                                <strong class="number" data-number="85">0</strong>
                                <span>Number of Awards</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span>
                                </div>
                                <strong class="number" data-number="10567">0</strong>
                                <span>Happy Customer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span>
                                </div>
                                <strong class="number" data-number="900">0</strong>
                                <span>Staff</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection
