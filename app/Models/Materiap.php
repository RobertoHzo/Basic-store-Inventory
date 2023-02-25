<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiap extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'proveedor_id',
        'cantidad',
        'precio',
        'area_id',
    ];
    //llaves foraneas
    public function areas()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
    public function proveedors()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
