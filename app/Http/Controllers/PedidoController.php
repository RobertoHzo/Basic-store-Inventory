<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-pedidos|crear-pedido|editar-pedido|eliminar-pedido', ['only' => ['index']]);
        // $this->middleware('permission:crear-pedido', ['only' => ['create', 'store']]);
        // $this->middleware('permission:editar-pedido', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:eliminar-pedido', ['only' => ['destroy']]);
    }



    public function index(Request $request)
    {
        $from = trim($request->get('uno'));
        $to = trim($request->get('dos'));
        if ($from != '' && $from != '') {
            $pedidos = Pedido::whereBetween('fecha', [$from, $to])
                ->paginate(1000);
            return view('pedidos.index', compact('pedidos'));
        }

        $pedidos = Pedido::paginate(10000);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $clientes = Cliente::pluck('nombre', 'id')->all();
        return view('pedidos.create', compact(('clientes')));
    }

    public function store(Request $request)
    {
        request()->validate([
            'cliente_id' => 'required',
            'total' => 'required',
            'folio' => 'required',
        ]);
        $pedido = $request->all();
        Pedido::create($pedido);
        return redirect()->route('pedidos.index');
    }

    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        request()->validate([
            'hora_entrega' => 'required',
        ]);
        $prod = $request->all();
        $pedido->update($prod);
        return redirect()->route('pedidos.index');

        // DB::table('pedidos')
        // ->where('id', $pedido)  // find your user by their email
        // ->limit(1)  // optional - to ensure only one record is updated.
        // ->update(array('status' => 'Completado'));  // update the record in the DB.

        //     Pedido::where('id', $pedido)
        //    ->update([
        //        'status' => 'Completado'
        //     ]);
        //     return view('pedidos.index');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index');
    }

    public function completar(Pedido $pedido)
    {
        DB::table('pedidos')
            ->where('id', $pedido)  
            ->limit(1)  // optional - to ensure only one record is updated.
            ->update(array('status' => 'Completado'));  // update the record in the DB.
        return redirect()->route('pedidos.index');
    }
}
