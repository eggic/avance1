<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;


class PedidoController extends Controller
{
    // Muestra la vista para ordenar comida
    public function ordenar()
    {
        return view('orden');
    }

    // Almacena el pedido en la sesión
    public function store(Request $request)
    {
        $request->validate([
            'productos' => 'required|array|min:1',
        ]);

        session(['pedido' => $request->all()]);

        return redirect()->route('pedido.finalizar');
    }

    // Muestra los productos disponibles para comida
    public function showPedidoComida()
    {
        $productos = Producto::all();
        return view('pedido_comida', compact('productos'));
    }

    public function finalizar()
    {
        return view('finalizar_pedido');
    }

    public function comida()
    {
        return view('pedido_comida');
    }

    public function pupusas()
    {
        $productos = Producto::where('tipo', 'Pupusas')->get();
        return view('productos.pupusas', compact('productos'));
    }

    public function hamburguesa()
    {
        $productos = Producto::where('tipo', 'Hamburguesas')->get();
        return view('productos.hamburguesas', compact('productos'));
    }

    public function pollofrito()
    {
        $productos = Producto::where('tipo', 'Pollo')->get();
        return view('productos.pollofrito', compact('productos'));
    }

    public function hotdog()
    {
        $productos = Producto::where('tipo', 'Hot Dog')->get();
        return view('productos.hotdog', compact('productos'));
    }

    public function pizza()
    {
        $productos = Producto::where('tipo', 'Pizza')->get();
        return view('productos.pizza', compact('productos'));
    }

    public function tacos()
    {
        $productos = Producto::where('tipo', 'Tacos')->get();
        return view('productos.tacos', compact('productos'));
    }

    public function sushi()
    {
        $productos = Producto::where('tipo', 'Sushi')->get();
        return view('productos.sushi', compact('productos'));
    }

    public function comidachina()
    {
        $productos = Producto::where('tipo', 'Comida China')->get();
        return view('productos.comidachina', compact('productos'));
    }

    public function arepas()
    {
        $productos = Producto::where('tipo', 'Arepas')->get();
        return view('productos.arepas', compact('productos'));
    }

    public function bebidas()
    {
        return view('pedido_bebida');
    }

    public function cafeHelado()
    {
        $productos = Producto::where('tipo', 'Cafe Helado')->get();
        return view('productos.cafehelado', compact('productos'));
    }

    public function cadenas()
    {
        return view('pedido_cadenas');
    }
}
