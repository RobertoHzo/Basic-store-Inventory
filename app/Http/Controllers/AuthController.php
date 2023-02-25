<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function show(Pedido $pedido)
    {
        return view('main.info_pedido', compact('pedido'));
    }

    public function dashboardView()
    {
        $pedidos = auth()->user()->pedidos;
        $user = Auth::user();
        return view('main.dashboard', compact('pedidos', 'user'));
    }


    public function logout_()
    {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
