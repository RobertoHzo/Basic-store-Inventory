<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'producto_id',
        'pedido_id',
        'precio',
        'cantidad',
    ];

    public function producto(){
        return $this->belongsTo(Producto::class,'producto_id');
    }
    // public function pedido(){
    //     return $this->belongsToMany(Pedido::class,'pedido_id');
    // }
}
