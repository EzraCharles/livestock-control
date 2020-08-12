<div class="sidebar" style="padding-top: 115px; z-index: 1;">
    <nav class="sidebar-nav">
        <ul class="nav" >
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
                @if (Auth::user()->rol === 'Administrador')
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i class="nav-icon fas fa-chart-pie"></i> Análisis </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i class="nav-icon fas fa-handshake"></i> Liquidación </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('eliminados') }}">
                        <i class="nav-icon fas fa-eraser"></i> Eliminados </a>
                    </li>
                @endif
            </li>
            <li class="nav-title">Módulos</li>

            <li class="nav-item">
                <a class="nav-link" href="#">{{-- route('captura') --}}
                <i class="nav-icon fas fa-barcode"></i> Ingreso </a> {{--COMPRA--}}
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">{{-- route('captura') --}}
                <i class="nav-icon fas fa-dollar-sign"></i> Salida </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="nav-icon fas fa-truck-moving"></i> Embarques </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="nav-icon fas fa-syringe"></i> Sanidad </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="nav-icon fas fa-calendar-alt"></i> Calendarización </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="nav-icon fas fa-cookie-bite"></i> Engorda </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="nav-icon far fa-eye"></i> Criadero </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-people"></i> Catálogos</a>
                <ul class="nav-dropdown-items">

                    @if (Auth::user()->rol === 'Administrador')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usuarios.index') }}">
                            <i class="nav-icon fas fa-users"></i> Usuarios </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('precios.index') }}">
                            <i class="nav-icon fas fa-hand-holding-usd"></i> Precios </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('animales.index') }}">
                        <i class="nav-icon fas fa-paw"></i> Animales </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('personas.index') }}">
                        <i class="nav-icon fas fa-tractor"></i> Personas </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('diagnosticos.index') }}">
                        <i class="nav-icon fas fa-pencil-alt"></i> Diagnósticos </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tratamientos.index') }}">
                        <i class="nav-icon fas fa-file-medical"></i> Tratamientos </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tipo-reproducciones.index') }}">
                        <i class="nav-icon fas fa-venus-mars"></i> Tipo de Reproducción </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tipo-tratamientos.index') }}">
                        <i class="nav-icon fas fa-stethoscope"></i> Tipo de Tratamiento </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('corrales.index') }}">
                        <i class="nav-icon fas fa-landmark"></i> Corrales </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('formulas.index') }}">
                        <i class="nav-icon fas fa-seedling"></i> Fórmulas </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tipo-animales.index') }}">
                        <i class="nav-icon fas fa-horse"></i> Tipo de Animal </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tipo-alimentaciones.index') }}">
                        <i class="nav-icon fas fa-utensils"></i> Tipo de Alimentación </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tipo-personas.index') }}">
                        <i class="nav-icon fas fa-user-tag"></i> Tipo de Persona </a>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>
  </div>
