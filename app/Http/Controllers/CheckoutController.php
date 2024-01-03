<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Pedido_producto;
use App\Services\PayPalService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    protected $payPal;
    public function __construct(PayPalService $payPal)
    {
        $this->payPal = $payPal;
    }

    public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $pedido = Pedido::where('order_number', $status['invoiceId'])->first();
        $pedido->status = 'processing';
        $pedido->payment_status = 1;
        $pedido->save();

        \Cart::clear();
        return view('main.success', compact('pedido'));
    }


    public function getCheckout()
    {
        $user = Auth::user();
        $prods = Pedido_producto::class;

        return view('main.checkout', array('user' => $user, 'prods' => $prods));
    }

    public function placeOrder(Request $request)
    {
        // Before storing the order we should implement the
        // request validation
        $pedido = Pedido::create([
            'order_number'      =>  'ORD-' . strtoupper(uniqid()),
            'user_id'           => auth()->user()->id,
            'status'            =>  'completo',
            'total'       =>  \Cart::getSubTotal(),
            'item_count'        =>  \Cart::getTotalQuantity(),
            'payment_status'    =>  0,
            'notes'             =>  $request['notes'],
            'hora_entrega' => now(),
            'fecha' => now(),
        ]);

        if ($pedido) { // si se crea el pedido...

            $items = \Cart::getContent();
            foreach ($items as $item) { // por cada producto va a crear un registro con su cantidad y precio
                $producto = Producto::where('nombre', $item->name)->first();
                $Pedido_producto = new Pedido_producto([
                    'producto_id'    =>  $producto->id,
                    'cantidad'      =>  $item->quantity,
                    'precio'         =>  $item->getPriceSum()
                ]);
                $pedido->items()->save($Pedido_producto);
            }
        }
        return view('main.success', compact('pedido'));
    }
}
