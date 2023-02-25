<?php

namespace App\Http\Controllers;

use App\Models\Area;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-area|crear-area|editar-area|eliminar-area', ['only' => ['index']]);
        $this->middleware('permission:crear-area', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-area', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-area', ['only' => ['destroy']]);
    }

    public function index()
    {
        $areas = Area::paginate(10);
        return view('areas.index', compact('areas'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
        ]);
        $area = $request->all();

        Area::create($area);
        return redirect()->route('areas.index');
    }

    public function show($id)
    {
    }

    public function edit(Area $area)
    {
        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        request()->validate([
            'nombre' => 'required',
        ]);
        $prod = $request->all();
        $area->update($prod);
        return redirect()->route('areas.index');
    }

    public function destroy(Area $area)
    {
        $area->delete();
        return redirect()->route('areas.index');
    }
}
