<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;







// Ruta para la página principal
Route::get('/', function () {
    return view('home'); // Carga la vista home.blade.php
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login'); // o donde quieras redirigir
})->name('logout');





Route::get('/pedido-pupusas', [ProductoController::class, 'pedidoPupusas'])->name('productos.pedido_pupusas');
Route::get('/productos/pupusas', [ProductoController::class, 'pupusas'])->name('productos.pupusas');

Route::get('/pupusas', [PedidoController::class, 'pupusas'])->name('pupusas');
Route::get('/hamburguesa', [PedidoController::class, 'hamburguesa'])->name('hamburguesas');
Route::get('/pollofrito', [PedidoController::class, 'pollofrito'])->name('pollofrito');
Route::get('/arepas', [PedidoController::class, 'arepa'])->name('arepas');
Route::get('/comidachina', [PedidoController::class, 'comidachina'])->name('comidachina');
Route::get('/hotdog', [PedidoController::class, 'hotdog'])->name('hotdog');
Route::get('/pizza', [PedidoController::class, 'pizza'])->name('pizza');
Route::get('/sushi', [PedidoController::class, 'sushi'])->name('sushi');
Route::get('/tacos', [PedidoController::class, 'tacos'])->name('tacos');


Route::get('/pedido/cafehelado', [PedidoController::class, 'cafeHelado'])->name('pedido.cafehelado');
Route::get('/pedido/licuadodefresa', [PedidoController::class, 'licuadodefresa'])->name('pedido.licuadodefresa');
Route::get('/pedido/jugodenaranja', [PedidoController::class, 'jugodenaranja'])->name('pedido.jugodenaranja');
Route::get('/pedido/horchata', [PedidoController::class, 'horchata'])->name('pedido.horchata');
Route::get('/pedido/teverdefrio', [PedidoController::class, 'teverdefrio'])->name('pedido.teverdefrio');
Route::get('/pedido/smoothie', [PedidoController::class, 'smoothie'])->name('pedido.smoothie');
Route::get('/pedido/soda', [PedidoController::class, 'soda'])->name('pedido.soda');
Route::get('/pedido/cafeexpresso', [PedidoController::class, 'cafeexpresso'])->name('pedido.cafeexpresso');
Route::get('/pedido/malteada', [PedidoController::class, 'malteada'])->name('pedido.malteada');

Route::get('/pedido/mcdonalds', [PedidoController::class, 'mcdonalds'])->name('pedido.mcdonalds');
Route::get('/pedido/kfc', [PedidoController::class, 'kfc'])->name('pedido.kfc');
Route::get('/pedido/burgerking', [PedidoController::class, 'burgerking'])->name('pedido.burgerking');
Route::get('/pedido/subway', [PedidoController::class, 'subway'])->name('pedido.subway');
Route::get('/pedido/pizzahut', [PedidoController::class, 'pizzahut'])->name('pedido.pizzahut');
Route::get('/pedido/dominos', [PedidoController::class, 'dominos'])->name('pedido.dominos');
Route::get('/pedido/tacobell', [PedidoController::class, 'tacobell'])->name('pedido.tacobell');
Route::get('/pedido/popeyes', [PedidoController::class, 'popeyes'])->name('pedido.popeyes');
Route::get('/pedido/starbucks', [PedidoController::class, 'starbucks'])->name('pedido.starbucks');


Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Route::get('/productos/pupusas', [ProductoController::class, 'pupusas'])->name('productos.pupusas');
Route::get('/hamburguesas', [ProductoController::class, 'hamburguesas'])->name('hamburguesas');





Route::get('/pedido', [App\Http\Controllers\PedidoController::class, 'ver'])
    ->name('pedido.ver');

// Rutas para hacer un pedido según la categoría
Route::get('/pedido/comida', [PedidoController::class, 'comida'])->name('pedido.comida');
Route::get('/pedido/bebidas', [PedidoController::class, 'bebidas'])->name('pedido.bebidas');
Route::get('/pedido/cadenas', [PedidoController::class, 'cadenas'])->name('pedido.cadenas');
Route::get('/pedido/otros', [PedidoController::class, 'otros'])->name('pedido.otros');

Route::get('/', function () {
    return view('home');
})->name('home');   


Route::get('/pedido-bebida', function () {
    return view('pedido_bebida');
})->name('pedido.bebida');


Route::get('/pedido-cadenas', function () {
    return view('pedido_cadenas');
})->name('pedido.cadenas');



// Ruta para finalizar el pedido
Route::get('/pedido/finalizar', [PedidoController::class, 'finalizar'])->name('pedido.finalizar');

// Ruta para la página de pago (opcional)
Route::get('/pedido/pago', [PedidoController::class, 'pago'])->name('pedido.pago');


// Rutas para los productos con CRUD
Route::resource('productos', ProductoController::class);

Route::get('/pedido/ordenar', [PedidoController::class, 'ordenar'])->name('pedido.ordenar');  // Ruta para la vista de ordenar comida
Route::post('/pedido/store', [PedidoController::class, 'store'])->name('pedido.store');  // Ruta para almacenar el pedido en el carrito
Route::get('/pedido/finalizar', [PedidoController::class, 'finalizar'])->name('pedido.finalizar');  // Ruta para finalizar el pedido
