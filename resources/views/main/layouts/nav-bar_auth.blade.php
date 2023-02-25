<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar  ftco-navbar-light" id="ftco-navbar" style="background-color: #ff77ab">
    <div class="container">
        {{-- <a class="navbar-brand" href="/">Snack & Roll<small>Diner</small></a> --}}
        <a href="/"><img src="images/logoletra2.png" alt="" style="max-width: 165px; height: auto;"></a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menú
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item  {{ Request::is('/') ? 'neonText' : '' }}"><a href="/" class="nav-link">Inicio</a></li>
                <li class="nav-item {{ Request::is('menu') ? 'neonText' : '' }}"><a href="{{route('menu')}}" class="nav-link">Menú</a></li>
                <li class="nav-item {{ Request::is('about') ? 'neonText' : '' }}"><a href="{{route('sobre_nosotros')}}"" class="nav-link">Sobre Nosotros</a></li>

                <li class="nav-item {{ Request::is('contact') ? 'neonText' : '' }}"><a href="{{route('contacto')}}" class="nav-link">Contacto</a></li>
                {{-- <li class="nav-item cart {{ Request::is('login') ? 'neonText' : '' }}"><a href="{{ route('dashboard') }}" class="nav-link"><span class="icon icon-person"></span></a></li> --}}
                @if(\Illuminate\Support\Facades\Auth::user())
                <li class="dropdown nav-item cart">
                  
                    <a href="javascript:void(0);"  class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                        <span class="icon icon-person "></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right " style="border: 1px solid #4ac6d7;">
                        <div class="dropdown-title" style="display: flex; justify-content:center; color:white;">
                            Bienvenido, {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                            <a class="dropdown-item has-icon edit-profile" href="dashboard" data-id="{{ \Auth::id() }}">
                                <i class="fa fa-user"></i>Ver perfil</a>

                                    <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                                    onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                        @else
                        <li class="dropdown nav-item cart ">
                            <a href="javascript:void(0);"  class="nav-link dropdown-toggle" id="dropdown04" aria-haspopup="true" aria-expanded="false">
                                <span class="icon icon-person "></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown04"  style="border: 1px solid #4ac6d7;">
                                <a href="{{ route('login') }}" class="dropdown-item has-icon">
                                    <i class="fas fa-sign-in-alt"></i> Iniciar sesión
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('register') }}" class="dropdown-item has-icon">
                                    <i class="fas fa-user-plus"></i> Crear cuenta
                                </a>
                            </div>


                        </li>
                        @endif
                <li class="nav-item cart {{ Request::is('cart') ? 'neonText' : '' }}"><a href="{{ route('cart.list') }}" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>{{ Cart::getTotalQuantity()}}</small></span></a></li>

                {{-- <li class="nav-item cart"><a href="carrito" class="nav-link"><span class="icon icon-shopping_cart">
                </span><span class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a></li> --}}
            </ul>
        </div>
    </div>
</nav>
