@extends('main.layouts.layout_auth')
{{-- @section('title', 'Order Completed') --}}
@section('content')
<section class="ftco-section" style="padding: 9em 0;
padding-bottom: 2em;
position: relative;
background-color: rgb(255, 255, 255);">

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2 class="title-page">¡Pedido Completado!</h2>

                </div>
<div class="card-body">
    <main class="col-sm-12">
        <p class="alert alert-success">Se pedido se ha realizado correctamente.</p></main>
        <div style="display: flex;justify-content:center;">
            <a href="dashboard" class=" btn-lg btn-info">Ver pedidos</a>
        </div>
    </div>
</div>



        </div>
</section>
@endsection
