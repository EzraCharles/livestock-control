<nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="position: fixed;
z-index: 999;
opacity:1;
width: 100%;">

    <a class="navbar-brand" href="{{ url('/dashboard') }}">
        <img class="navbar-brand-full" src="img/logo.jpg" alt="Grupo RES" style="
        width: auto;
        height: 80px;
        z-index: -1;
        ">
    </a>
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <img class="navbar-brand-minimized" src="img/logo.jpg" width="auto" height="40px" alt="Grupo RES min"
    style="margin-right: auto; height: 60px;">

    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" style="margin: 0 !important;" type="button" data-toggle="dropdown" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="fas fa-angle-down"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <img class="navbar-brand-full" src="img/fie-ehm.png" alt="Grupo RES" style="width: auto; height: 100px; margin-left: auto; ">
        <img class="navbar-brand-full" src="img/Hda.-La-Metatera.jpg" alt="Grupo RES" style="width: auto; height: 100px; margin-left: auto; ">
        <img class="navbar-brand-full" src="img/FIE-RES.png" alt="Grupo RES" style="width: auto; height: 80px; margin-left: auto; ">

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="navbar-brand-full nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="padding: 0px;">
                        <div class="dropdown-header text-center" style="padding: 5px">
                            <i class="fas fa-cog"></i>
                            <strong>Configuración</strong>
                        </div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-lock"></i> Cerrar Sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>

                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
