<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class OrdenItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'orden_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'precio_total'
    ];

    public function orden(){
        return $this->belongsTo(Orden::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
