<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';

    protected $fillable = [
        'nombre_producto',
        'precio',
        'cantidad_en_stock',
        'proveedor',
        'fecha_de_creacion',
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_producto', 'id');
    }
}
