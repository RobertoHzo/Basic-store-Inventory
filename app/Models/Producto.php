<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'categoria_id',
        'precio',
        'descripcion',
        'imagen',
        'disponible',
    ];
    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
    public function pedidoProducto()
    {
        return $this->belongsToMany(Pedidoproducto::class);
    }
}
