<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{

    public function agregar(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|integer|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $productoId = $request->input('producto_id');
        $cantidad = $request->input('cantidad');

        $producto = Producto::findOrFail($productoId);

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$productoId])) {
            $carrito[$productoId]['cantidad'] += $cantidad;
        } else {
            $carrito[$productoId] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => $cantidad,
            ];
        }

        session(['carrito' => $carrito]);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    // Muestra la vista del carrito con productos y total
    public function index()
    {
        $carrito = session('carrito', []);

        return view('carrito', compact('carrito'));
    }

    // Confirmar y guardar el pedido en BD
    public function confirmarPedido(Request $request)
    {
        $carrito = session('carrito', []);

        if (empty($carrito)) {
            return redirect()->back()->with('error', 'El carrito está vacío.');
        }

        DB::beginTransaction();

        try {
            $total = 0;

            foreach ($carrito as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }

            $pedido = Pedido::create([
                'total' => $total,
                'estado' => 'pendiente',
                // Aquí podrías agregar 'cliente' si tienes esa info
            ]);

            foreach ($carrito as $item) {
                DetallePedido::create([
                    'pedido_id' => $pedido->id,
                    'producto_id' => $item['id'],
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $item['precio'],
                ]);
            }

            session()->forget('carrito');

            DB::commit();

            return redirect()->route('carrito.index')->with('success', '¡Pedido realizado correctamente!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al procesar el pedido.');
        }
    }
}
