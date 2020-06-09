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
            <a class="nav-link" href="palets">
              <i class="nav-icon icon-book-open"></i> APD </a>
          </li>
          @if (Session::get('role', 0) === 'admin')
          <li class="nav-item">
            <a class="nav-link" href="displaymasters">
              <i class="nav-icon icon-docs"></i> Masters </a>
          </li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link  nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-people"></i> Usuarios</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="createuser">
                  <i class="nav-icon icon-user-follow"></i> Crear Usuario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="displayusers">
                  <i class="nav-icon icon-user"></i> Desplegar Usuarios</a>
              </li>
            </ul>
        </li>


            <li class="nav-item">
              <a class="nav-link" href="workshifts">
                <i class="nav-icon icon-hourglass"></i> Turno </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="storagefloors">
                <i class="nav-icon icon-briefcase"></i> Tren </a>
            </li>
          @endif
      </ul>
    </nav>
          <!-- <button class="sidebar-minimizer brand-minimizer" type="button"></button> -->
  </div>
