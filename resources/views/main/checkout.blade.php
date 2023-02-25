@extends('main.layouts.layout_auth')
@section('top')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/sillas.jpeg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread neonText">Pago</h1>
                    {{-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span></span></p> --}}
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('content1')
{{-- <section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 ftco-animate">
                <form action="#" class="billing-form ftco-bg-dark p-3 p-md-5">
                    <h3 class="mb-4 billing-heading">Billing Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Firt Name</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country">State / Country</label>
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="">France</option>
                                        <option value="">Italy</option>
                                        <option value="">Philippines</option>
                                        <option value="">South Korea</option>
                                        <option value="">Hongkong</option>
                                        <option value="">Japan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetaddress">Street Address</label>
                                <input type="text" class="form-control" placeholder="House number and street name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="towncity">Town / City</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postcodezip">Postcode / ZIP *</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailaddress">Email Address</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <div class="radio">
                                    <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
                                    <label><input type="radio" name="optradio"> Ship to different address</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form><!-- END -->



                <div class="row mt-5 pt-3 d-flex">
                    <div class="col-md-6 d-flex">
                        <div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Cart Total</h3>
                            <p class="d-flex">
                                <span>Subtotal</span>
                                <span>$20.60</span>
                            </p>
                            <p class="d-flex">
                                <span>Delivery</span>
                                <span>$0.00</span>
                            </p>
                            <p class="d-flex">
                                <span>Discount</span>
                                <span>$3.00</span>
                            </p>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span>$17.60</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-detail ftco-bg-dark p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Payment Method</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                                    </div>
                                </div>
                            </div>
                            <p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</section>  --}}
@endsection

@section('content')
<section class="ftco-section" style="    padding: 9em 0;
padding-bottom: 2em;
position: relative;
background-color: white;">
<div class="container">

    <div class="row">
        <div class="col-sm-12">
            @if (Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif
            @if ($message = Session::get('success'))
            <div class="custom-alerts alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                {!! $message !!}
            </div>
            <?php Session::forget('success');?>
            @endif

            @if ($message = Session::get('error'))
            <div class="custom-alerts alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                {!! $message !!}
            </div>
            <?php Session::forget('error');?>
            @endif
        </div>
    </div>
    <?php
    $cart_contents = \Cart::getContent()
    ?>
    <div class="row">
        <div class="col-xl-12 ftco-animate">
            <div class="list-group">
                <div class="list-group-item">
                    <div class="list-group-item-heading">
                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <h3 class="mb-4 billing-heading">Productos a ordenar</h3>

                                <div class="table-responsive">
                                    <table class="table table-responsive table-stripped table-hover" style="    min-width: auto !important;">
                                        <tr class=" uppercase" style="background-color: #82d7c7; height:3rem;">
                                            <td class="hidden text-center md:table-cell">
                                                No.
                                            </td>
                                            <td class="hidden text-center md:table-cell">Imagen</td>
                                            <td class="hidden text-center md:table-cell">Producto</td>
                                            <td class="hidden text-center md:table-cell">Cantidad</td>
                                            <td class="hidden text-center md:table-cell">Precio</td>
                                            <td class="hidden text-center md:table-cell">Sub Total</td>
                                        </tr>
                                        <tr>
                                            <?php $n=1; ?>
                                            @foreach($cart_contents as $cart)
                                            <td>{{$n}}</td>
                                            <td> <img src="admin/img/{{ $cart->attributes->image }}" style="width:40px" /> </td>
                                            <td>{{$cart->name}}</td>
                                            <td> {{$cart->quantity}} </td>
                                            <td>$ {{$cart->price}}</td>
                                            <td>$ {{$cart->quantity*$cart->price}}</td>
                                            <?php $n++; ?>

                                        </tr>
                                        @endforeach
                                    </table>
                                    <br>
                                    <br>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-6">
                                <h3 class="mb-4 billing-heading">Datos del usuario</h3>

                                <div class="">
                                    <label for="inputname">Nombre</label>
                                    <p style="border: 0;" class="form-control form-control-large">@if($user){{$user->name}}@endif</p>
                                </div>

                                <div class="">
                                    <label for="inputemail">Email</label>
                                    <p style="border: 0;" class="form-control form-control-large">@if($user){{$user->email}}@endif</p>
                                </div>
                                <div class="">
                                    <label for="inputphone">Teléfono</label>
                                    <p style="border: 0;" class="form-control form-control-large">@if($user){{$user->phone}}@endif</p>
                                </div>
                                <div style="border-top: 1px solid black;height: 2px;padding: 10px;margin: 20px auto 0 auto;"></div>

                                <form action="{{ route('checkout.place.order') }}" method="POST" role="form" >

                                    @csrf


                                    <div class="form-group ">
                                        <label for="notes" >Notas</label>
                                        <input type="text" class="form-control form-control-large" name="notes" value=" " required>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="HoraEntrega" >Hora de entrega</label>
                                        <br>
                                        <input type="datetime-local" id="HoraEntrega" name="HoraEntrega" min="<?php echo (new DateTime())->format('Y-m-d H:i');?>" value="<?php echo (new DateTime())->format('Y-m-d H:i');?>" required>
                                    </div>
                                    {{-- <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus> --}}

                                    {{-- <input id="amount" type="hidden" class="form-control" name="amount" value="{{ Cart::getSubTotal()}}" autofocus> --}}

                                    <h1 id="prueba"  class="text-right">Total: $ {{ Cart::getTotal()}}</h1>

                                    {{-- <a href="{{ route('payment') }}" class="btn btn-success">Pay $100 from Paypal</a> --}}
                                    <!-- Include the PayPal JavaScript SDK; replace "test" with your own sandbox Business account app client ID -->
                                    {{-- <script src="https://www.paypal.com/sdk/js?client-id=sb-&currency=MXN"></script> --}}
                                    <!-- Set up a container element for the button -->


                                    <div style="border-top: 1px solid black;height: 2px;padding: 10px;margin: 20px auto 0 auto;"></div>


                                    <div class="well">
                                        @if (Cart::getTotal() >= '1')
                                        <div id="paypal-button-container"></div>
                                        {{-- <button  type="submit" class="btn btn-primary btn-lg btn-block">o</button> --}}

                                        @else
                                        <a href="{{ route ('menu')}}" type="button" class="btn btn-primary btn-lg btn-block">Añada productos primero</a>
                                        @endif
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{{-- ********************************** zona de paypal********************************************************* --}}
</section>
<?php
$items = \Cart::getContent();
$items1 = array();
foreach ($items as $item) { // sacar el nombre de cada producto del carrito
    $orderItems = $item->name.' → '.$item->quantity;


    array_push($items1, $orderItems);
}
?>
<script>
    var $datos = <?php echo json_encode($items1); ?>;
    $prods = $datos.join(', ');
    console.log($prods);

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    window.onkeyup = keyup;

    var notes;
    var hora;

    function keyup(e) {
        //setting your input text to the global Javascript Variable for every key press
        notes = e.target.value;
    }
    //detecta cada que se hace un click en cualquier parte
    window.onclick = function(event) {
        hora = document.getElementById("HoraEntrega").value;

    }
</script>


<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID')}}&currency=MXN&locale=es_MX" data-sdk-integration-source="button-factory"></script>
<script>

    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'gold',
                layout: 'vertical',
                label: 'pay',
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    application_context: {
                        shipping_preference: "NO_SHIPPING"
                    },
                    purchase_units: [{
                        "description":$prods,
                        "amount":{"currency_code":"MXN","value":{{Cart::getTotal()}} },

                    }]
                });
            },
            // Call your server to finalize the transaction
            onApprove: function(data, actions) {

                return fetch('/paypal/process/' + data.orderID +'/'+ notes + '/'+ hora )
                .then(res => res.json())
                .then(function(response) {
                    // Show a failure message
                    if (!response.success) {
                        const failureMessage = 'Sorry, your transaction could not be processed.';
                        alert(failureMessage);
                        return;
                    }
                    location.href = 'success';
                });
            },
            onError: function(err) {
                console.log(err);
                alert(err);
            }
        }).render('#paypal-button-container');
    }
    initPayPalButton();
</script>
@endsection
