<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use GuzzleHttp\Client;
use App\Models\Producto;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Pedido_producto;

class PaypalCardController extends Controller
{
    // Primero debes instalar Guzzle
    //    composer require guzzlehttp/guzzle


    // Las peticiones HTTP las puedes hacer usando un cliente de Guzzle,
    // que puedes definir en el constructor, donde además accedemos a nuestras credenciales de PayPal.
    private $client;
    private $clientId;
    private $secret;

    public function __construct()
    {
        $this->client = new Client([
            // 'base_uri' => 'https://api-m.paypal.com'
            'base_uri' => 'https://api-m.sandbox.paypal.com'
        ]);

        $this->clientId = env('PAYPAL_CLIENT_ID');
        $this->secret = env('PAYPAL_SECRET');
    }

    private function getAccessToken()
    {
        // Como puedes ver, estamos haciendo una petición POST al endpoint /v1/oauth2/token,
        // enviando nuestro clientId y secret, para obtener un accessToken como respuesta.
        $response = $this->client->request(
            'POST',
            '/v1/oauth2/token',
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'body' => 'grant_type=client_credentials',
                'auth' => [
                    $this->clientId, $this->secret, 'basic'
                ]
            ]
        );

        $data = json_decode($response->getBody(), true);
        return $data['access_token'];
    }


    public function process($orderId,$notes,$hora, Request $request)
    {
        // Aquí primero obtenemos un accessToken
        $accessToken = $this->getAccessToken();

        // Luego usamos este token y hacemos una petición POST a la URL que nos permitirá hacer capture de la orden.
        $requestUrl = "/v2/checkout/orders/$orderId/capture";

        $response = $this->client->request('POST', $requestUrl, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer $accessToken"
            ]
        ]);
        // Hacemos json_decode de la respuesta que nos da PayPal e imprimimos esta data usando la función dd de Laravel.
        $data = json_decode($response->getBody(), true);


        // Luego de hacer una petición para capturar una orden (a partir de su id),
        // lo siguiente es ejecutar código con nuestra lógica, según la respuesta que nos da PayPal.
        if ($data['status'] === 'COMPLETED') {

            // Obtener el paymentId y el monto pagado, de $data
            $payPalPaymentId = $data['purchase_units'][0]['payments']['captures'][0]['id'];
            $amount = $data['purchase_units'][0]['payments']['captures'][0]['amount']['value'];


            // ************************* Creacion del pedido en la bd ************************************************************
            $pedido = Pedido::create([
                // 'order_number'      =>  'ORD-' . strtoupper(uniqid()),
                'order_number'      =>  $payPalPaymentId,
                'user_id'           => auth()->user()->id,
                'status'            =>  'Por completar',
                'total'       => number_format($amount,2) ,
                'item_count'        =>  \Cart::getTotalQuantity(),
                'payment_status'    =>  $data['status'],
                'notes'             =>  $notes,
                'hora_entrega' => $hora,
                'fecha' => now(),
            ]);

            if ($pedido) { // si se crea el pedido...
                $items = \Cart::getContent();
                foreach ($items as $item) { // por cada producto va a crear un registro con su cantidad y precio
                    // $producto = Producto::where('id', $item->id)->first();
                    $Pedido_producto = new Pedido_producto([
                        'producto_id'    =>  $item->id,
                        'cantidad'      =>  $item->quantity,
                        'precio'         =>  $item->getPriceSum(),
                    ]);
                    $pedido->items()->save($Pedido_producto);
                }
            }
            \Cart::clear();
            // return view('main.success', compact('pedido'));
            return [
                'success' => true,
                'url' => 'success', // link al que redirigira despues de completar el pago
            ];
        }
        // *************************************************************************************************
        // Dar una respuesta de error si el status no es COMPLETED
        return $this->responseFailure();
    }


}
