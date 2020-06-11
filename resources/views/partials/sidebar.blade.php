<div class="sidebar">
    <nav class="sidebar-nav" >
        <ul class="nav" >
            <li class="nav-item">
                <a class="nav-link" href="dashboard">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>
            <li class="nav-title">Módulos</li>

            <li class="nav-item">
                <a class="nav-link" href="#">{{-- route('captura') --}}
                <i class="nav-icon fas fa-barcode"></i> Ingreso </a> {{--COMPRA--}}
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">{{-- route('captura') --}}
                <i class="nav-icon fas fa-dollar-sign"></i> Venta </a>
            </li>
            @if (Auth::user()->rol === 'Administrador')
                {{--<li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-people"></i> Usuarios</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <i class="nav-icon icon-user-follow"></i> Crear Usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <i class="nav-icon icon-user"></i> Desplegar Usuarios</a>
                        </li>
                    </ul>
                </li>--}}

                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <i class="nav-icon fas fa-users"></i> Usuarios </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <i class="nav-icon fas fa-horse-head-solid"></i> Corrales </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <i class="nav-icon icon-hourglass"></i> Fórmulas </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <i class="nav-icon icon-briefcase"></i> Personas </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <i class="nav-icon icon-briefcase"></i> Precios </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <i class="nav-icon icon-briefcase"></i> Tipo de Alimentación </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <i class="nav-icon icon-briefcase"></i> Tipo de Animal </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <i class="nav-icon fas fa-hat-cowboy"></i> Tipo de Persona </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <i class="nav-icon icon-briefcase"></i> Tipo de Reproducción </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <i class="nav-icon icon-briefcase"></i> Tipo de Tratamiento </a>
                </li>
            @endif
        </ul>
    </nav>
  </div>
