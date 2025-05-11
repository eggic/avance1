<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    // Mostrar el formulario para crear un nuevo producto
    public function create()
    {
        return view('productos.create');
    }

    // Almacenar un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'tipo' => 'required|in:Pupusas,Hamburguesas,Pollo,HotDog,Pizza,Tacos,Sushi,China,Arepas',
        ]);

        Producto::create($request->except('_token'));

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    // Mostrar productos filtrados por tipo "Pupusa"
    public function pupusas()
    {
        $productos = Producto::where('tipo', 'Pupusa')->get();
        return view('productos.pupusas', compact('productos'));

    }

        public function hamburguesas()
    {
        $productos = Producto::where('tipo', 'Hamburguesa')->get();
        return view('productos.hamburguesas', compact('productos'));
    }

    public function pedido_comida()
{
    $productos = Producto::all(); // Obtener todos los productos sin filtrar por tipo
    return view('pedido_comida', compact('productos')); // Enviar a la vista 'pedido_comida'
}


    // Mostrar productos filtrados por tipo "Hamburguesa"


    // Mostrar el formulario para editar un producto existente
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // Actualizar un producto existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'tipo' => 'required|in:Pupusas,Hamburguesas,Pollo,HotDog,Pizza,Tacos,Sushi,China,Arepas',
        ]);

        $producto = Producto::findOrFail($id);

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'tipo' => $request->tipo,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
    }

    // Eliminar un producto
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
