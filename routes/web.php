<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\User_Controller;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ClienteController;

use App\Http\Controllers\MateriapController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\PedidoproductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('denegado', function () {
    return view('denegado');
});
Route::get('success', function () {
    return view('main.success');
});

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return view('main.index');
// });
Route::get('/', [App\Http\Controllers\ProductoController::class, 'home'])->name('/');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// admin
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');

Route::group(['middleware' => ['admin']], function () { //auth en vez de admin
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('proveedors', ProveedorController::class);
    Route::resource('materiaps', MateriapController::class);
    // Route::get('/entradas_salidas', [App\Http\Controllers\MateriapController::class, 'entradas'])->name('entradas');
    Route::post('materiapsi', 'MateriapController@storesi')->name('materiaps.storesi');

    Route::post('materiaps', [App\Http\Controllers\MateriapController::class, 'update_quan'])->name('update_quan');

    Route::resource('clientes', ClienteController::class);
    Route::resource('pedido_productos', PedidoproductoController::class);
    Route::resource('pedidos', PedidoController::class);
    Route::get('pedidos.completar', [PedidoController::class, 'completar'])->name('pedidos.completar');

});
//main
Route::get('sobre_nosotros', function () {
    return view('main.about');})->name('sobre_nosotros');
Route::get('/menu', [App\Http\Controllers\ProductoController::class, 'menu'])->name('menu');
//    Route::get('/carrito', [App\Http\Controllers\ProductoController::class, 'cart'])->name('carrito');


//    Route::get('menu', function () {return view('main.menu');});
//    Route::get('contact', function () {return view('main.contact');});
//    Route::get('inicio_sesion', function () {return view('main.login');});
//    Route::get('registro', function () {return view('main.registro');});
//    Route::get('carrito', function () {return view('main.cart');});
//    Route::get('checkout', function () {return view('main.checkout');});

// Route::resource('main', MainController::class);

//carrito
// Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
// Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
// Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
// Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
// Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');



// Route::get('/checkout',
// ['as' => 'checkout', 'uses' => 'ProductoController@checkout']);

Route::group(['middleware' => ['auth']], function () {

    Route::get('cart', [ProductoController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [ProductoController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [ProductoController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [ProductoController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [ProductoController::class, 'clearAllCart'])->name('cart.clear');
// mostrar la informacion de u pedido individual en la pagina del cliente
    Route::get('info/{pedido}', 'AuthController@show')->name('info.show');

    Route::get('/dashboard', [AuthController::class, 'dashboardView'])->name('dashboard');


    Route::get('/checkout', 'CheckoutController@getCheckout')->name('checkout.index');



    Route::post('/checkout/order', 'CheckoutController@placeOrder')->name('checkout.place.order');
    // Route::get('checkout/payment/complete', 'CheckoutController@complete')->name('checkout.payment.complete');

    Route::get('/paypal/process/{orderId}/{notes}/{hora}', 'PayPalCardController@process')->name('paypal.process');
    // Route::get('/paypal/process/{orderId}', [PayPalCardController::class, 'process'])->name('paypal.process');


    //Cliente
    // Route::get('editar_usuario', function () {
    //     return view('main.usuario.editar');
    // });
    // Route::get('editar_cliente', 'UserController@editClient')->name('editarCliente');
    // Route::post('editarCliente', [UserController::class, 'updateClient'])->name('cliente.update');
    // Route::post('removercliente', [UserController::class, 'destroyClient'])->name('cliente.destroy');


    // Route::post('modificar_cliente', 'UserController@updateClient')->name('checkout.index');
    // Route::post('eliminar_cliente', 'UserController@destroyClient')->name('checkout.index');
    Route::resource('cliente', ClienteController::class);
});


Route::get('payment', 'App\Http\Controllers\PaypalController@payment')->name('payment');
Route::get('cancel', 'App\Http\Controllers\PaypalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'App\Http\Controllers\PaypalController@success')->name('payment.success');
// Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
// Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
// Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));
// Route::get('payment', 'App\Http\Controllers\PaypalController@payment')->name('payment');
// Route::get('cancel', 'App\Http\Controllers\PaypalController@cancel')->name('payment.cancel');
// Route::get('payment/success', 'App\Http\Controllers\PaypalController@success')->name('payment.success');

// clientes
// Route::get('/inicio_sesion', [AuthController::class, 'index'])->name('inicio_sesion');
// Route::post('/custom-signin', [AuthController::class, 'createSignin'])->name('signin.custom');


// Route::get('/register', [AuthController::class, 'signup'])->name('register');
// Route::post('/create-user', [AuthController::class, 'customSignup'])->name('user.registration');


// Route::get('/logout_', [AuthController::class, 'logout_'])->name('logout_');


// contact
Route::get('contacto', [ContactUsFormController::class, 'createForm'])->name('contacto');
Route::post('contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');




// Route::get('home', 'User\\UserController@index')->name('home');
