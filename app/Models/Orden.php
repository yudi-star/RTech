<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Orden extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'metodo_pago',
        'estado_pago',
        'estado',
        'tipo_moneda',
        'cantidad_compra',
        'metodo_compra',
        'notas'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ordenItems(){
        return $this->hasMany(OrdenItem::class);
    }

    public function direccion(){
        return $this->hasOne(Direccion::class);
    }
}
