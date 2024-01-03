<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class ClienteController extends Controller
{

    public function index()
    {
        $clientes = User::select("*")
            ->where("is_admin", "=", 0)
            ->paginate(100);
        return view('clientes.index', compact('clientes'));
    }

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

}
