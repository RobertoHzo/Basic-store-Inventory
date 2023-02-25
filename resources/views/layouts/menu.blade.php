
<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-home"></i><span>Inicio</span>
    </a>
</li>
{{-- @can('ver-pedidos')

<li class="side-menus {{ Request::is('pedido_productos') ? 'active' : '' }}">
    <a class="nav-link" href="/pedido_productos">
        <i class=" fas fa-shopping-bag"></i><span>Pedido productos</span>
    </a>
</li>
@endcan --}}
@can('ver-pedidos')

<li class="side-menus {{ Request::is('pedidos') ? 'active' : '' }}">
    <a class="nav-link" href="/pedidos">
        <i class=" fas fa-shopping-cart"></i><span>Pedidos</span>
    </a>
</li>
@endcan


@can('ver-productos')
<li class="side-menus {{ Request::is('productos') ? 'active' : '' }}">
    <a class="nav-link" href="/productos">
        <i class=" fas fa-hamburger"></i><span>Productos</span>
    </a>
</li>
@endcan



@can('ver-categoria')
<li class="side-menus {{ Request::is('categorias') ? 'active' : '' }}">
    <a class="nav-link" href="/categorias">
        <i class=" fas fa-clipboard-list"></i><span>Categorias</span>
    </a>
</li>
@endcan
@can('ver-materia_prima')
<li class="side-menus {{ Request::is('materiaps') ? 'active' : '' }}">
    <a class="nav-link" href="/materiaps">
        <i class=" fas fa-shopping-basket"></i><span>Materia prima</span>
    </a>
</li>
@endcan
@can('ver-proveedor')
<li class="side-menus {{ Request::is('proveedors') ? 'active' : '' }}">
    <a class="nav-link" href="/proveedors">
        <i class=" fas fa-truck"></i><span>Proveedores</span>
    </a>
</li>
@endcan
@can('ver-area')
<li class="side-menus {{ Request::is('areas') ? 'active' : '' }}">
    <a class="nav-link" href="/areas">
        <i class=" fas fa-cash-register"></i><span>Areas</span>
    </a>
</li>
@endcan
@can('ver-clientes')
<li class="side-menus {{ Request::is('clientes') ? 'active' : '' }}">
    <a class="nav-link" href="/clientes">
        <i class=" fas fa-users"></i><span>Clientes</span>
    </a>
</li>
@endcan
@can('ver-usuarios')
<li class="side-menus {{ Request::is('users') ? 'active' : '' }}">
    <a class="nav-link" href="/users">
        <i class=" fas fa-user"></i><span>Usuarios</span>
    </a>
</li>
@endcan

@can('ver-rol')
<li class="side-menus {{ Request::is('roles') ? 'active' : '' }}">
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-cog"></i><span>Roles</span>
    </a>
</li>
@endcan

