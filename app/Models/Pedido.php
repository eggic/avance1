<?php
// app/Models/Pedido.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente', 'total', 'estado'];

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }
}
