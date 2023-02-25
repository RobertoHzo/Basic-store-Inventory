<?php

namespace App\Http\Controllers;

use PayPal\Api\Item;
use PayPal\Api\Payer;
use App\Models\Pedido;
// use App\Contracts\PedidoContract;
// use Darryldecode\\Cart\\Cart;
use Mockery\Exception;
use PayPal\Api\Amount;
use PayPal\Api\Details;

use PayPal\Api\Payment;
use App\Models\Producto;
use PayPal\Api\ItemList;
use Darryldecode\Cart\Cart;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use App\Models\Pedido_producto;
use PayPal\Api\PaymentExecution;
use App\Contracts\PedidoContract;
use App\Services\PayPalService; ///
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PayPal\Exception\PayPalConnectionException;



class CheckoutController extends Controller
{
    // protected $orderRepository;

    // public function __construct(PedidoContract $orderRepository)
    // {
    //     $this->orderRepository = $orderRepository;
    // }

    protected $payPal; ///
    public function __construct(PayPalService $payPal) ///
    {
        $this->payPal = $payPal;
    }

    public function complete(Request $request) ///
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $pedido = Pedido::where('order_number', $status['invoiceId'])->first();
        $pedido->status = 'processing';
        $pedido->payment_status = 1;
        // $pedido->payment_method = 'PayPal -' . $status['salesId'];
        $pedido->save();

        \Cart::clear();
        return view('main.success', compact('pedido'));
    }


    public function getCheckout()
    {
        // return view('main.checkout');
        // $cart_contents = \Cart::getContent();

        $user = Auth::user();
        $prods = Pedido_producto::class;

        return view('main.checkout', array( 'user' => $user, 'prods' => $prods));
    }

    public function placeOrder(Request $request)
    {
        // Before storing the order we should implement the
        // request validation which I leave it to you

        // $order = $this->storeOrderDetails($request->all());

        // dd($order);
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
            // $this->payPal->processPayment($pedido); ///

            ////////////
            //  return route('make.payment');
        }
        // return $pedido;
        return view('main.success', compact('pedido'));

        // return redirect()->back()->with('message', 'Order not placed'); ///
        // return route('make.payment');

    }
}
