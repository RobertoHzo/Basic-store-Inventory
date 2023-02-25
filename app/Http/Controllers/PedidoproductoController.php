<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Pedido_producto;

class PedidoproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pedidosProds = Pedido_producto::join('pedidos', 'pedido_productos.pedido_id', '=', 'pedidos.id')
        //     ->join('productos', 'pedido_productos.producto_id', '=', 'productos.id')
        //     ->select('pedido_productos.*', 'pedidos.folio as pefolio', 'productos.nombre as prname')
        //     ->paginate(1000);
        // return view('pedido_productos.index')->with('pedidosProds', $pedidosProds);
        $pedidosProds = Pedido_producto::paginate(10000);
        return view('pedido_productos.index', compact('pedidosProds'));
    }

    public function create()
    {
        $pedido = Pedido::pluck('folio', 'id');
        $producto = Producto::pluck('nombre', 'id');
        $selectedID = 0;
        return view('pedido_productos.create', compact('pedido', 'producto', 'selectedID'));}

    public function store(Request $request)
    {
        $request->validate([ //debe concordar con nombre de los campos en la migracion
            'pedido_id' => 'required','producto_id' => 'required','hora_entrega' => 'required',
            'fecha' => 'required','cantidad' => 'required',]);
        Pedido_producto::create($request->all()); //pedir todas las columnas del modelo de Pedido y validar (?) INSERTAR
        return redirect()->route('pedido_productos.index')
            ->with('success', 'Your producto was created');}

    public function edit($id)
    {
        $pedido_producto = Pedido_producto::find($id);
        $pedido = Pedido::pluck('nombre', 'id');
        $producto = Producto::pluck('nombre', 'id');
        return view('pedido_productos.edit', compact('pedido_producto', 'pedido', 'producto'));}

    public function update(Request $request, $id)
    {
        $pedido_producto = Pedido_producto::find($id);
        $request->validate([
            'pedido_id' => 'required','producto_id' => 'required','hora_entrega' => 'required',
            'fecha' => 'required','cantidad' => 'required',]);
        $pedido_producto->update($request->all());
        return redirect()->route('pedido_productos.index')
            ->with('success', 'Your pedido producto was edited');}

    public function destroy($sc)
    {
        Pedido_producto::find($sc)->delete();
        return redirect()->route('pedido_productos.index')
            ->with('success', 'Your pedido producto was deleted');}

    // public function show($id)
    // {
    //     $pedido_producto = Pedido_producto::join('pedidos', 'pedido_productos.pedido_id', '=', 'pedidos.id')
    //         ->join('productos', 'pedido_productos.producto_id', '=', 'productos.id')
    //         ->select('pedido_productos.*', 'pedidos.nombre as pename', 'productos.nombre as prname')
    //         ->where('courses_students.id', $id)
    //         ->get();
    //     return view('pedido_productos.show', compact('pedido_producto'));
    // }
}
