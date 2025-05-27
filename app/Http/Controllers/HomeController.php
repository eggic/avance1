<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class HomeController extends Controller
{
    public function index()
    {
        $pedido = Pedido::first();  // O Pedido::latest()->first();

        return view('home', compact('pedido'));
    }
}
