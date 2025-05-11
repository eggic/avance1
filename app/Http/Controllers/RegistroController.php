<?php

// app/Http/Controllers/RegistroController.php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index()
    {
        // Obtener todos los registros desde la base de datos
        $registros = Registro::all();
        
        // Pasar los registros a la vista
        return view('registros.index', compact('registros'));
    }
}
