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



Route::get('denegado', function () {
    return view('denegado');
});
Route::get('success', function () {
    return view('main.success');
});

Route::get('/', [App\Http\Controllers\ProductoController::class, 'home'])->name('/');
Route::get('sobre_nosotros', function () {
    return view('main.about');
})->name('sobre_nosotros');
Route::get('/menu', [App\Http\Controllers\ProductoController::class, 'menu'])->name('menu');
// contact
Route::get('contacto', [ContactUsFormController::class, 'createForm'])->name('contacto');
Route::post('contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

// admin
Auth::routes();
Route::get('/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');

Route::group(['middleware' => ['admin']], function () { //auth en vez de admin
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('proveedors', ProveedorController::class);
    Route::resource('materiaps', MateriapController::class);
    Route::post('materiapsi', 'MateriapController@storesi')->name('materiaps.storesi');

    Route::post('materiaps', [App\Http\Controllers\MateriapController::class, 'update_quan'])->name('update_quan');

    Route::resource('clientes', ClienteController::class);
    Route::resource('pedido_productos', PedidoproductoController::class);
    Route::resource('pedidos', PedidoController::class);
    Route::get('pedidos.completar', [PedidoController::class, 'completar'])->name('pedidos.completar');
});


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
    Route::get('/paypal/process/{orderId}/{notes}/{hora}', 'PayPalCardController@process')->name('paypal.process');

    Route::resource('cliente', ClienteController::class);
});

Route::get('payment', 'App\Http\Controllers\PaypalController@payment')->name('payment');
Route::get('cancel', 'App\Http\Controllers\PaypalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'App\Http\Controllers\PaypalController@success')->name('payment.success');
