@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page_heading">Inicio</h3>
    </div>
    <div class="section-body">

        <div class="col-md-12">
            <div class="row ">
                @php
                use Spatie\Permission\Models\Role;
                use App\Models\User;
                use App\Models\Producto;
                use App\Models\Materiap;
                use App\Models\Pedido;
                use App\Models\Area;
                $cant_roles = Role::count();
                $cant_users = User::where("is_admin","=","1")->count();
                $cant_clientes = User::where("is_admin","!=","1")->count();
                $cant_prods = Producto::count();
                $cant_mp= Materiap::count();
                $cant_pedido= Pedido::where("status","!=","Completado")
                ->count();
                $cant_area= Area::count();
                @endphp

                <div class="main-section">
                    <div class="dashbord dashbord-orange">
                        <div class="icon-section">
                            <i class="fa fa-bell" aria-hidden="true"></i><br>
                            <small>Pedidos por realizar</small>
                            <p>{{$cant_pedido}}</p>
                        </div>
                        <div class="detail-section">
                            <a href="/pedidos">Más información </a>
                        </div>
                    </div>

                    <div class="dashbord dashbord-green">
                        <div class="icon-section">
                            <i class="fas fa-shopping-basket" aria-hidden="true"></i><br>
                            <small>Materia prima</small>
                            <p>{{$cant_mp}}</p>
                        </div>
                        <div class="detail-section">
                            <a href="/materiaps">Más información</a>
                        </div>
                    </div>
                    <div class="dashbord dashbord-red">
                        <div class="icon-section">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i><br>
                            <small>Productos</small>
                            <p>{{$cant_prods}}</p>
                        </div>
                        <div class="detail-section">
                            <a href="/productos">Más información </a>
                        </div>
                    </div>
                    <div class="dashbord">
                        <div class="icon-section">
                            <i class="fa fa-user-tie" aria-hidden="true"></i><br>
                            <small>Usuarios</small>
                            <p>{{$cant_users}}</p>
                        </div>
                        <div class="detail-section">
                            <a href="/users">Más información</a>
                        </div>
                    </div>


                    <div class="dashbord dashbord-skyblue">
                        <div class="icon-section">
                            <i class="fas fa-users" aria-hidden="true"></i><br>
                            <small>Clientes</small>
                            <p>{{$cant_clientes}}</p>
                        </div>
                        <div class="detail-section">
                            <a href="/areas">Más información </a>
                        </div>
                    </div>
                    <div class="dashbord dashbord-blue">
                        <div class="icon-section">
                            <i class="fas fa-user-cog" aria-hidden="true"></i><br>
                            <small>Roles</small>
                            <p>{{$cant_roles}}</p>
                        </div>
                        <div class="detail-section">
                            <a href="/roles">Más información </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<br>
<br>
<div class="row" >
    <div class="card" style="display: flex;justify-content:center;"></div>
    <div class="col-md-6" >
        <canvas id="myChart" width="300" height="300"></canvas>
    </div>
    <div class="col-md-6">
        <canvas id="myChart22" width="300" height="300"></canvas>
    </div>
</div>
</section>
<script  type="text/javascript" charset="utf8" src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script type="text/javascript">

    var labels2 =  {{ Js::from($labelsPedidos) }};
    var users2 =  {{ Js::from($dataPedidos) }};

    const data2 = {
        labels: labels2,
        datasets: [{
            label: 'Pedidos creados',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: users2,
        }]
    };

    const config2 = {
        type: 'line',
        data: data2,
        options: {}
    };

    const myChart = new Chart(
    document.getElementById('myChart22'),
    config2
    );



    var labels =  {{ Js::from($labels) }};
    var users =  {{ Js::from($data) }};

    const data = {
        labels: labels,
        datasets: [{
            label: 'Usuarios creados',
            backgroundColor: '#2980b9',
            borderColor: '#2980b9',
            data: users,
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };

    const myChart1 = new Chart(
    document.getElementById('myChart'),
    config
    );


</script>


@endsection

