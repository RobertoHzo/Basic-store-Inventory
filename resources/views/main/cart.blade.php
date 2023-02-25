@extends('main.layouts.layout_auth')
@section('top')
<!-- ///////////////// -->
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(images/sillas.jpeg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread neonText">Carrito</h1>
                    {{-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p> --}}
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<br>
<br>
<section class="ftco-section ftco-cart">
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td class="product-remove"><a href="#"><span class="icon-close"></span></a></td>

                                <td class="image-prod"><div class="img" style="background-image:url(main/images/menu-2.jpg);"></div></td>

                                <td class="product-name">
                                    <h3>Creamy Latte Coffee</h3>
                                    <p>Far far away, behind the word mountains, far from the countries</p>
                                </td>

                                <td class="price">$4.90</td>

                                <td class="quantity">
                                    <div class="input-group mb-3">
                                        <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                    </div>
                                </td>

                                <td class="total">$4.90</td>
                            </tr><!-- END TR-->

                            <tr class="text-center">
                                <td class="product-remove"><a href="#"><span class="icon-close"></span></a></td>

                                <td class="image-prod"><div class="img" style="background-image:url(main/images/dish-2.jpg);"></div></td>

                                <td class="product-name">
                                    <h3>Grilled Ribs Beef</h3>
                                    <p>Far far away, behind the word mountains, far from the countries</p>
                                </td>

                                <td class="price">$15.70</td>

                                <td class="quantity">
                                    <div class="input-group mb-3">
                                        <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                    </div>
                                </td>

                                <td class="total">$15.70</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate justify-content-start">
                <div class="cart-total mb-3">
                    <h3>Totales del carrito</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>$20.60</span>
                    </p>

                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>$17.60</span>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="cart-detail ftco-bg-dark p-3 p-md-4 justify-content-end">
                    <h3 class="billing-heading mb-4">Metodo de pago</h3>

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="radio">
                                <span class="icon icon-logo_paypal"></span><label> Paypal</label>
                            </div>
                        </div>
                    </div>

                    <p><a href="#"class="btn btn-primary py-3 px-4">Ordenar</a></p>
                </div>
            </div>
        </div>


    </div> --}}
    <main class="my-8">

        <div class="container px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div style="padding: 2rem;" class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    @if ($message = Session::get('success'))
                    <div class="p-4 mb-3 bg-green-400 rounded" style="background-color: greenyellow; --darkreader-inline-bgcolor: #5d8400;">
                        <p class="text-green-800">{{ $message }}</p>
                    </div>
                    @endif
                    @if (\Cart::isEmpty())
                    <p class="alert alert-warning">Su carrito esta vacio.</p>
                    @endif
                    <h3 class="text-3xl text-bold">Lista del carrito</h3>
                    <div class="flex-1">
                        <div class="table-responsive" style="display: grid;">
                            <table class="w-full text-sm lg:text-base" cellspacing="0">
                                <thead>
                                    <tr class=" uppercase" style="background-color: #82d7c7; height:3rem;    box-shadow: 0 0 8px #008e73;">
                                        <th class="hidden md:table-cell"></th>
                                        <th class="text-center">Producto</th>
                                        <th  class="pl-5 text-left lg:text-right lg:pl-0">
                                            {{-- <span class="hidden lg:inline">Cantidad</span> --}}
                                            Cantidad
                                        </th>
                                        <th class="hidden text-center md:table-cell"> Precio</th>
                                        <th class="hidden text-center md:table-cell"> Eliminar </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="hidden pb-4 md:table-cell" style="padding: 1rem">
                                            <a href="#">
                                                <img src="admin/img/{{ $item->attributes->image }}" class="w-20 rounded" style="height: 150px; width: 150px;     box-shadow: 0 0 5px #707070;
                                                " alt="admin/img/{{ $item->attributes->image }}">
                                            </a>
                                        </td>
                                        <td style="padding: 1rem">
                                            <a href="#">
                                                <p class="mb-2 md:ml-4">{{ $item->name }}</p>

                                            </a>
                                        </td>
                                        <td style="padding: 1rem"  class="justify-center mt-6 md:justify-end md:flex">
                                            <div class="h-10 w-28">
                                                <div class="relative flex flex-row w-full h-8">

                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id}}" >
                                                        <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                        class="w-6 text-center bg-gray-300" />
                                                        <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500"><i class="fas fa-sync-alt"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding: 1rem" class="hidden text-right md:table-cell">
                                            <span class="text-sm font-medium lg:text-base">
                                                ${{ $item->price }}
                                            </span>
                                        </td>
                                        <td style="padding: 1rem" class="hidden text-right md:table-cell">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <button class="px-4 py-2 text-white bg-red-600"><i class='fa fa-eraser'></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div>
                            <h5 >Total: ${{ Cart::getTotal() }}</h5>

                            <div class="row" style="justify-content: space-between;padding:1rem;">
                                @if (\Cart::isEmpty())
                                <a  href="#" class="btn btn-primary disabled">Proceder al pago</a>
                                @else
                                <a  href="{{ route('checkout.index') }}" class="btn btn-primary">Proceder al pago</a>
                                @endif

                                <form action="{{ route('cart.clear') }}" method="POST" >
                                    @csrf
                                    @if (\Cart::isEmpty())
                                    <button style="color: white !important;
                                    padding: 2px;" class="btn btn-danger" disabled>Eliminar productos</button>
                                    @else
                                    <button style="    color: white !important;
                                    padding: 2px;" class="btn btn-danger ">Eliminar productos</button>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Descubra</span>
                <h2 class="mb-4">Productos relacionados</h2>
                {{-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p> --}}
            </div>
        </div>

        <div class="row">

            @foreach ($productos as $producto)
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(admin/img/{{$producto->imagen}});"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">{{$producto->nombre}}</a></h3>
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
                    <a href="#" class="img" style="background-image: url(images/Hotdog.jpeg);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">Coffee Capuccino</a></h3>
                        <p>A small river named Duden flows by their place and supplies</p>
                        <p class="price"><span>$5.90</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(images/MalteadaChoco.jpeg);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">Coffee Capuccino</a></h3>
                        <p>A small river named Duden flows by their place and supplies</p>
                        <p class="price"><span>$5.90</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(images/nieveRoja.jpeg);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">Coffee Capuccino</a></h3>
                        <p>A small river named Duden flows by their place and supplies</p>
                        <p class="price"><span>$5.90</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(images/mazapan.jpeg);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">Coffee Capuccino</a></h3>
                        <p>A small river named Duden flows by their place and supplies</p>
                        <p class="price"><span>$5.90</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>

@endsection
