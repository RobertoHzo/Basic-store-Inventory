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
    // public function index()
    // {
    //     return view('main.login');
    // }


    // public function createSignin(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('dashboard')
    //                     ->withSuccess('Logged-in');
    //     }
    //     return redirect("inicio_sesion")->withSuccess('Credentials are wrong.');
    // }


    // public function signup()
    // {
    //     return view('main.registro');
    // }


    // public function customSignup(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'lastname' => 'required',
    //         'email' => 'required|email|unique:clientes,email',
    //         'phone' => 'required',
    //         'password' => 'required|min:6|same:confirm-password',
    //     ]);
    //     $data = $request->all();
    //     $check = $this->createUser($data);
    //     $cliente = Auth::clientes();

    //     return redirect('dashboard',array('cliente'=>$cliente))->withSuccess('Successfully logged-in!');
    // }


    // public function createUser(array $data)
    // {
    //   return Cliente::create([
    //     'nombre' => $data['name'],
    //     'apellido' => $data['lastname'],
    //     'email' => $data['email'],
    //     'telefono' => $data['phone'],
    //     'contraseña' => Hash::make($data['password'])
    //   ]);
    // }

    public function show(Pedido $pedido){
        return view('main.info_pedido', compact('pedido'));
    }

    public function dashboardView()
    {
            $pedidos = auth()->user()->pedidos;
            $user=Auth::user();
            return view('main.dashboard', compact('pedidos','user'));
    }


    public function logout_() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
