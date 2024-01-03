<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-productos|crear-producto|editar-producto|eliminar-producto', ['only' => ['index']]);
        $this->middleware('permission:crear-producto', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-producto', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-producto', ['only' => ['destroy']]);
    }

    public function index()
    {
        $productos = Producto::paginate(10000);
        return view('productos.index', compact('productos'));
    }

    public function menu()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('main.menu', compact('productos', 'categorias'));
    }

    public function home()
    {
        $productos = Producto::where('disponible', '=', 'SI')
            ->limit(4)
            ->inRandomOrder()
            ->get();
        return view('main.index')->with('productos', $productos);
    }

    public function productList() // carrito
    {
        $products = Producto::all();
        return view('products', compact('products'));
    }

    public function cart() //productos sugeridos
    {
        $productos = Producto::where('disponible', '=', 'SI')
            ->limit(4)
            ->inRandomOrder()
            ->get();
        return view('main.cart')->with('productos', $productos);
    }

    public function create()
    {
        $categorias = Categoria::pluck('nombre', 'id')->all();
        return view('productos.create', compact(('categorias')));
    }

    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required', 'categoria_id' => 'required',
            'precio' => 'required', 'descripcion' => 'required', 'imagen' => 'required'
        ]);
        $producto = $request->all();
        if ($imagen = $request->file('imagen')) {
            $SaveImgpath = 'admin/img/';
            $imagenProductoName = date('YmdHis') . "_" . $imagen->getClientOriginalName();
            $imagen->move($SaveImgpath, $imagenProductoName);
            $producto['imagen'] = "$imagenProductoName";
        }
        Producto::create($producto);
        return redirect()->route('productos.index');
    }


    public function edit(Producto $producto)
    {
        $categorias = Categoria::pluck('nombre', 'id')->all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        request()->validate([
            'nombre' => 'required', 'categoria_id' => 'required',
            'precio' => 'required', 'descripcion' => 'required',
        ]);
        $prod = $request->all();
        if ($imagen = $request->file('imagen')) {
            unlink("admin/img/" . $producto->imagen);
            $SaveImgpath = 'admin/img/';
            $imagenProductoName = date('YmdHis') . "_" . $imagen->getClientOriginalName();
            $imagen->move($SaveImgpath, $imagenProductoName);
            $prod['imagen'] = "$imagenProductoName";
        } else {
            unset($prod['imagen']);
        }
        $producto->update($prod);
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        unlink("admin/img/" . $producto->imagen);
        $producto->delete();
        return redirect()->route('productos.index');
    }

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    public function cartList()
    {
        $cartItems = \Cart::getContent(); //obtiene el contenido del carrito
        $productos = Producto::where('disponible', '=', 'SI')
            ->limit(4)
            ->inRandomOrder()
            ->get(); // productos sugeridos
        return view('main.cart', compact('cartItems'))->with('productos', $productos);
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', '¡Producto añadido al carrito correctamente!');
        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            ['quantity' => ['relative' => false, 'value' => $request->quantity],]
        );
        session()->flash('success', '¡Cantidad actualizada correctamente!');
        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', '¡Producto eliminado correctamente!');
        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('success', '¡Todos los productos se han eliminado!');
        return redirect()->route('cart.list');
    }
}
