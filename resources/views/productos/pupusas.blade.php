<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pupuserías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tarjetas.css') }}">

{{-- Incluir el navbar --}}
    @include('layouts.navbar')

    <main class="container py-4">
        @yield('content')
    </main>

</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">Pupuserías Destacadas</h1>

    <div class="comidas-apiladas">
        @forelse($productos as $producto)
        <div class="mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('storage/' . $producto->imagen) }}" class="img-pequena" alt="Imagen pupusería">
                <div class="card-body">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <p class="card-text">{{ $producto->descripcion }}</p>
                    <p><strong>Precio por unidad:</strong> ${{ number_format($producto->precio, 2) }}</p>

                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <button class="btn btn-outline-secondary" onclick="cambiarCantidad({{ $loop->index }}, -1)">-</button>
                        <span id="cantidad-{{ $loop->index }}">0</span>
                        <button class="btn btn-outline-secondary" onclick="cambiarCantidad({{ $loop->index }}, 1)">+</button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center">No hay productos disponibles.</p>
        @endforelse
    </div>

    <div class="text-center mt-5">
        <button class="btn btn-success px-5 py-2">Hacer pedido</button>
    </div>
</div>

<!-- Solo un script al final -->
<script>
    function cambiarCantidad(index, cambio) {
        const cantidadSpan = document.getElementById('cantidad-' + index);
        let cantidad = parseInt(cantidadSpan.textContent);

        cantidad += cambio;
        if (cantidad < 0) cantidad = 0;

        cantidadSpan.textContent = cantidad;
    }
</script>

</body>
</html>
