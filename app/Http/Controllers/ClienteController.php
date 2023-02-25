<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClienteController extends Controller
{

    public function index()
    {
        // $clientes = Cliente::paginate(10);
        $clientes = User::select("*")
            ->where("is_admin", "=", 0)
            ->paginate(100);
        return view('clientes.index', compact('clientes'));}

    // public function create(){return view('clientes.create');}

    // public function store(Request $request)
    // {   $this->validate(       $request,
    //         [   'nombre' => 'required',
    //             'apellido' => 'required',
    //             'email' => 'required|email|unique:clientes,email',
    //             'telefono' => 'required',
    //             'contraseña' => 'required|same:confirm-password',]
    //     );
    //     $input = $request->all();
    //     $input['contraseña'] = Hash::make($input['contraseña']);
    //     Cliente::create($input);
    //     return redirect()->route('clientes.index');
    // }

    // public function edit($id)
    // {$cliente = Cliente::find($id);
    //     return view('clientes.edit', compact('cliente'));}

    // public function update(Request $request, $id)
    // {$this->validate(       $request,
    //         [   'nombre' => 'required',
    //             'apellido' => 'required',
    //             'email' => 'required|email|unique:clientes,email,' . $id,
    //             'telefono' => 'required',
    //             'contraseña' => 'same:confirm-password',]
    //     );
    //     $input = $request->all();
    //     if (!empty($input['contraseña'])) {
    //         $input['contraseña'] = Hash::make($input['contraseña']);
    //     } else {
    //         $input = Arr::except($input, array('contraseña'));}
    //     $cliente = Cliente::find($id);
    //     $cliente->update($input);
    //     return redirect()->route('clientes.index');}

    // public function destroy($id)
    // { Cliente::find($id)->delete();
    //     return redirect()->route('clientes.index');}
    public function edit($id)
    {
        $user = User::find($id);

        return view('main.editar_cliente', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required', 'lastname' => 'required',
            'email' => 'required|email|unique:users,email,' .
                $id, 'password' => 'same:confirm-password',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        return redirect()->route('dashboard');
    }

    // public function destroy($id)
    // {
    //     User::find($id)->delete();
    //     Session::flush();
    //     Auth::logout();
    //     return redirect()->route('/');
    // }
}
