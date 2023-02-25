<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Cliente extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'cliente';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'contraseña',
    ];

    protected $hidden = [
        'contraseña','remember_token'
    ];

    public function pedido()
    {
        return $this->hasMany(Pedido::class,'id');
    }
}
