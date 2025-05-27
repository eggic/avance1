<nav class="navbar navbar-expand-lg" style="background-color: #f7b6d2;">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height:40px;">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto align-items-center">

        <!-- Notificaciones -->
        <li class="nav-item me-3">
          <a class="nav-link position-relative text-dark" href="#">
            <i class="bi bi-bell" style="font-size: 1.5rem;"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              3
              <span class="visually-hidden">notificaciones sin leer</span>
            </span>
          </a>
        </li>

        <!-- Carrito de compra -->
        <li class="nav-item me-3">
          <a href="{{ route('carrito.index') }}" class="btn d-flex align-items-center"
             style="background-color: #f9d1e0; border: none; color: #000;">
            <i class="bi bi-cart me-2" style="font-size: 1.5rem;"></i>
            Carrito
          </a>
        </li>

        <!-- Perfil -->
        <li class="nav-item dropdown me-3">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarPerfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mi Perfil
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Ver Perfil</a></li>
            <li><a class="dropdown-item" href="#">Editar Perfil</a></li>
          </ul>
        </li>

        <!-- Cerrar sesión -->
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link nav-link text-dark" style="display:inline; padding:0;">
              Cerrar Sesión
            </button>
          </form>
        </li>

      </ul>
    </div>
  </div>
</nav>
