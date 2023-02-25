<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;

use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-proveedor|crear-proveedor|editar-proveedor|eliminar-proveedor', ['only' => ['index']]);
        $this->middleware('permission:crear-proveedor', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-proveedor', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-proveedor', ['only' => ['destroy']]);
    }


    public function index()
    {
        $proveedors = Proveedor::paginate(1000);
        return view('proveedors.index', compact('proveedors'));
    }

    public function create()
    {
        return view('proveedors.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
        ]);
        $proveedor = $request->all();
        Proveedor::create($proveedor);
        return redirect()->route('proveedors.index');
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedors.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        request()->validate([
            'nombre' => 'required',
        ]);
        $prod = $request->all();
        $proveedor->update($prod);
        return redirect()->route('proveedors.index');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedors.index');
    }

}
