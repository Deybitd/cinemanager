<!-- Navigation -->
<h6 class="navbar-heading text-muted">
    @if (auth()->user()->role == 'admin')
    Administracion 
    @else
    Menu
    @endif
</h6>
<ul class="navbar-nav">
    @if (auth()->user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="/home">
                <i class="ni ni-tv-2 text-primary"></i> Home
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/movies')}}">
            <i class="ni ni-button-play text-blue"></i> Peliculas
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/salas')}}">
            <i class="ni ni-building text-orange"></i> Salas
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/shows">
            <i class="ni ni-watch-time text-yellow"></i> Horarios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/products">
            <i class="ni ni-shop text-red"></i> Productos
            </a>
        </li>
    @elseif(auth()->user()->role== 'dulceria')
        <li class="nav-item">
            <a class="nav-link" href="/schedule">
                <i class="ni ni-basket text-green"></i> Ventas Dulceria
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/specialties')}}">
            <i class="ni ni-archive-2 text-info"></i> Mis Ventas
            </a>
        </li>
    @elseif(auth()->user()->role== 'taquilla')
    <li class="nav-item">
        <a class="nav-link" href="/schedule">
            <i class="ni ni-basket text-green"></i> Ventas Taquilla
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('/specialties')}}">
        <i class="ni ni-archive-2 text-info"></i> Mis Ventas
        </a>
    </li>
    @endif
 
    <li class="nav-item" hidden>
    <a class="nav-link" href="{{route('logout')}}"onclick="event.preventDefault();
     document.getElementById('formLogout').submit();">
        <i class="ni ni-key-25 text-info"></i> Cerrar sesion
    </a>
    <form action="{{ route('logout')}}" method="POST" style="display: none;" id="formLogout">
    @csrf

    </form>

    </li>
</ul>
@if (auth()->user()->role == 'admin')
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Empleados</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
    <a class="nav-link" href="{{url('/edulcerias')}}">
        <i class="ni ni-single-02 text-info"></i> Dulceria
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{url('/etaquillas')}}">
        <i class="ni ni-circle-08 text-default"></i> Taquilla
        </a>
    </li>
   
</ul>
@endif