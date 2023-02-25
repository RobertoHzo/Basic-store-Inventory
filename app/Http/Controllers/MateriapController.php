<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Materiap;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class MateriapController extends Controller
{

    function __construct()
    {
        $this->middleware(
            'permission:ver-materia_prima|crear-materia_prima|editar-materia_prima|eliminar-materia_prima',
            ['only' => ['index']]
        );
        $this->middleware('permission:crear-materia_prima', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-materia_prima', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-materia_prima', ['only' => ['destroy']]);
    }

    public function index()
    {
        $materiaps = Materiap::paginate(10);
        return view('materiaps.index', compact('materiaps'));
    }

    public function create()
    {
        $areas = Area::pluck('nombre', 'id')->all();
        $proveedors = Proveedor::pluck('nombre', 'id')->all();
        return view('materiaps.create', compact('areas', 'proveedors'));
    }

    public function storesi(Request $request) //no me acuerdo para q es, pero no va
    {
        request()->validate([
            'nombre' => 'required',
            'proveedor_id' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'area_id' => 'required',
        ]);
        $materiap = $request->all();
        Materiap::create($materiap);
        return redirect()->route('materiaps.index');
    }

    public function edit(Materiap $materiap)
    {
        $areas = Area::pluck('nombre', 'id')->all();
        $proveedors = Proveedor::pluck('nombre', 'id')->all();
        return view('materiaps.edit', compact('materiap', 'areas', 'proveedors'));
    }

    public function update(Request $request, Materiap $materiap)
    {
        $prod = $request->all();
        $materiap->update($prod);
        return redirect()->route('materiaps.index');
    }

    public function destroy(Materiap $materiap)
    {
        $materiap->delete();
        return redirect()->route('materiaps.index');
    }

    public function update_quan(Request $request, Materiap $materiap)
    {
        request()->validate([
            'cantidad' => 'required',
        ]);
        $prod = $request->all();
        $materiap->update($prod);
        return redirect()->route('materiaps.index');
    }
}
