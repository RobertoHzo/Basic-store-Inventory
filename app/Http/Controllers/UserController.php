<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-usuarios|crear-usuario|editar-usuario|eliminar-usuario', ['only' => ['index']]);
        $this->middleware('permission:crear-usuario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-usuario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-usuario', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $from = trim($request->get('uno'));
        $to = trim($request->get('dos'));
        if ($from != '' && $from != '') {
            $users = User::whereBetween('created_at', [$from, $to])
            ->where("is_admin","=",1)
            ->paginate(1000);
            return view('users.index', compact('users'));
        }

        $users = User::select("*")
            ->where("is_admin", "=", 1)
            ->paginate(100); //solo selecciona a los que son admins
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact(('roles')));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required', 'lastname' => 'required', 'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password', 'roles' => 'required', 'phone' => 'required'
            ]
        );
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        $user->is_admin = '1'; //para que se creen admins
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required', 'lastname' => 'required',
            'email' => 'required|email|unique:users,email,' .
                $id, 'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index');
    }

    // ++++++++++++++++++++++++++++++++++Clientes+++++++++++++++++++++++++++++

    // public function editClient($id)
    // {
    //     $user = User::find($id);

    //     return view('main.usuario.editar', compact('user'));
    // }

    // public function updateClient(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'name' => 'required', 'lastname' => 'required',
    //         'email' => 'required|email|unique:users,email,' .
    //             $id, 'password' => 'same:confirm-password',
    //     ]);

    //     $input = $request->all();
    //     if (!empty($input['password'])) {
    //         $input['password'] = Hash::make($input['password']);
    //     } else {
    //         $input = Arr::except($input, array('password'));
    //     }
    //     $user = User::find($id);
    //     $user->update($input);
    //     return redirect()->route('dashboard');
    // }

    // public function destroyClient($id)
    // {
    //     User::find($id)->delete();
    //     Session::flush();
    //     Auth::logout();
    //     return redirect()->route('/');
    // }
}
