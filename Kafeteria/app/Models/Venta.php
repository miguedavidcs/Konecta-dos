<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'ventas';

    protected $fillable = [
        'id',
        'id_producto',
        'fecha_venta',
        'cantidad_vendida',
        'monto_total',
    ];
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id');
    }
}
