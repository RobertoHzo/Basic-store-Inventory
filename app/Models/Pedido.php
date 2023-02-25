<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_number', 'user_id', 'status',
         'total', 'item_count', 'payment_status','notes','hora_entrega','fecha'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function items()
    {
        return $this->hasMany(Pedido_producto::class);
    }

    // public function pedidoProducto(){
    //     return $this->belongsToMany(Pedido_producto::class);
    // }
}
