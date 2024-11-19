<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Direccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'orden_id',
        'nombre',
        'apellido',
        'telefono', 
        'direccion',
        'ciudad',
        'distrito',
        'codigo_postal'
    ];

    public function orden(){
        return $this->belongsTo(Orden::class);
    }

    public function getFullNameAttribute(){
        return "{$this->nombre} {$this->apellido}";
    }   
}
