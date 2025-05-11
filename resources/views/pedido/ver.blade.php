<!-- resources/views/pedido/ver.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Pedido</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
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

    <!-- Contenido del Carrito -->
    <div class="container mt-5 pt-5">
        <h1 class="mb-4">Carrito de Compras</h1>

        <!-- Lista de productos en el carrito -->
        <div class="list-group">
            @foreach(session('carrito', []) as $producto)
            <div class="list-group-item d-flex align-items-center">
                <!-- Imagen del producto -->
                <img src="{{ $producto['imagen'] }}" alt="Imagen del producto" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                
                <!-- Información del producto -->
                <div class="ms-3">
                    <h5>{{ $producto['nombre'] }}</h5>
                    <p>${{ number_format($producto['precio'], 2) }}</p>
                </div>

                <!-- Controles de cantidad -->
                <div class="ms-auto d-flex align-items-center gap-2">
                    <button class="btn btn-outline-secondary" onclick="actualizarCantidad('{{ $producto['id'] }}', -1)">-</button>
                    <span id="cantidad-{{ $producto['id'] }}">{{ $producto['cantidad'] }}</span>
                    <button class="btn btn-outline-secondary" onclick="actualizarCantidad('{{ $producto['id'] }}', 1)">+</button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Total del carrito -->
        <div class="mt-4">
            <h3>Total: $<span id="total">${{ number_format($total, 2) }}</span></h3>
            <p>Costo de envío: ${{ number_format($envio, 2) }}</p>
            <h4>Total a pagar: $<span id="total-pagar">${{ number_format($total + $envio, 2) }}</span></h4>
        </div>

        <!-- Botón de realizar pedido -->
        <div class="mt-4">
            <button class="btn btn-primary" onclick="realizarPedido()">Realizar Pedido</button>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function actualizarCantidad(id, cambio) {
            const cantidadElem = document.getElementById('cantidad-' + id);
            let cantidad = parseInt(cantidadElem.textContent);
            cantidad += cambio;
            if (cantidad >= 1) {
                cantidadElem.textContent = cantidad;
                // Aquí actualizarías la sesión en el backend, por ejemplo usando AJAX
                // Puedes enviar la actualización de la cantidad con un formulario o una petición AJAX
            }
        }

        function realizarPedido() {
            // Aquí agregarías lógica para realizar el pedido, por ejemplo, redirigiendo a otra página
            alert("Pedido realizado");
        }
    </script>

    <!-- Bootstrap JS (Opcional para el dropdown y otros componentes de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
