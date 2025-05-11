<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">

    <div class="container">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h2 class="card-title mb-4">Editar producto</h2>

                <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Campo Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del producto</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" class="form-control" required>
                    </div>

                    <!-- Campo Descripción -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                    </div>

                    <!-- Campo Precio -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio ($)</label>
                        <input type="number" name="precio" id="precio" value="{{ old('precio', $producto->precio) }}" class="form-control" required step="0.01">
                    </div>

                    <!-- Campo Stock -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock', $producto->stock) }}" class="form-control" required>
                    </div>

                    <!-- Campo Tipo -->
<div class="mb-3">
    <label for="tipo" class="form-label">Tipo</label>
    <select name="tipo" id="tipo" class="form-control" required>
        <option value="">Selecciona un tipo</option>
        <option value="Pupusas" {{ old('tipo', $producto->tipo) == 'Pupusas' ? 'selected' : '' }}>Pupusas</option>
        <option value="Hamburguesas" {{ old('tipo', $producto->tipo) == 'Hamburguesas' ? 'selected' : '' }}>Hamburguesas</option>
        <option value="Pollo" {{ old('tipo', $producto->tipo) == 'Pollo' ? 'selected' : '' }}>Pollo</option>
        <option value="HotDog" {{ old('tipo', $producto->tipo) == 'HotDog' ? 'selected' : '' }}>Hot Dog</option>
        <option value="Pizza" {{ old('tipo', $producto->tipo) == 'Pizza' ? 'selected' : '' }}>Pizza</option>
        <option value="Tacos" {{ old('tipo', $producto->tipo) == 'Tacos' ? 'selected' : '' }}>Tacos</option>
        <option value="Comida China" {{ old('tipo', $producto->tipo) == 'Comida China' ? 'selected' : '' }}>Comida China</option>
        <option value="Arepas" {{ old('tipo', $producto->tipo) == 'Arepas' ? 'selected' : '' }}>Arepas</option>
    </select>
</div>                   
                    <!-- Botones -->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Opcional para algunos componentes como modales o tooltips) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
