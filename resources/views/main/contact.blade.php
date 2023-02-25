@extends('main.layouts.layout')
@section('top')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/cuadros.jpg); " data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread neonText">Contáctanos</h1>
                    {{-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact</span></p> --}}
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="ftco-section contact-section">
    <div class="container mt-5">
        <div class="row block-9">
            <div class="col-md-4 contact-info ftco-animate">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h2 class="h4">Información de contacto</h2>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Dirección:</span> Blvd. Miguel Hidalgo 950, Residencial San José, 88710 Reynosa, Tamps.</p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Telefonos:</span><br> 8991 0198 71
                            <br>8992 3040 05</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>E-mail:</span> info@yoursite.com</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Facebook:</span> yoursite.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 ftco-animate">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <form action="" method="post" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="{{ $errors->has('name') ? 'error' : '' }} form-control" type="text" placeholder="Nombre" name="name" id="name">
                                    @if ($errors->has('name'))
                                    <div class="error">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control {{ $errors->has('email') ? 'error' : '' }}" placeholder="Su E-mail" name="email" id="email">
                                    @if ($errors->has('email'))
                                    <div class="error">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" placeholder="Asunto" name="subject" id="subject">
                            @if ($errors->has('subject'))
                            <div class="error">
                                {{ $errors->first('subject') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" cols="30" rows="7" class="form-control {{ $errors->has('message') ? 'error' : '' }}" placeholder="Mensaje" ></textarea>
                            @if ($errors->has('message'))
                            <div class="error">
                                {{ $errors->first('message') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" name="send" value="Enviar" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>


    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3591.7570895956223!2d-98.34208832397779!3d26.066732597469446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8665059610dc62a1%3A0x3dd7ac1881eb519a!2sSnack%20n%20Roll%20Diner!5e0!3m2!1ses-419!2smx!4v1655760260265!5m2!1ses-419!2smx" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    @endsection
