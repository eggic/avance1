<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 fixed-top">
    <a class="navbar-brand" href="{{ route('home') }}">
         <strong>FastFood Rubania</strong>
    </a>

    <div class="ms-auto d-flex align-items-center gap-3">
        <!-- Notificaciones -->
        <div class="dropdown">
            <button class="btn btn-outline-light position-relative" type="button" id="dropdownNotif" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-bell-fill"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    0
                </span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownNotif">
                <li><span class="dropdown-item-text text-muted">Sin notificaciones</span></li>
            </ul>
        </div>

        <!-- Carrito -->
        <a href="{{ route('pedido.ver') }}" class="btn btn-outline-light position-relative">
            <i class="bi bi-cart-fill"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                {{ session('carrito') ? count(session('carrito')) : 0 }}
            </span>
        </a>

        <!-- Cerrar sesión -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Salir</button>
        </form>
    </div>
</nav>
