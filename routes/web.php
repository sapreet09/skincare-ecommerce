<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/* Controllers */
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminOrderController;


/*
|--------------------------------------------------------------------------
| FRONT WEBSITE
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products');
    Route::get('/product/{slug}', 'detail')->name('product.detail');
});


/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::get('/add-to-cart/{id}', 'add')->name('add.cart');
    Route::post('/update-cart', 'update')->name('update.cart');
    Route::get('/remove-cart/{id}', 'remove')->name('remove.cart');
});


/*
|--------------------------------------------------------------------------
| CHECKOUT (AUTH REQUIRED)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout');

    Route::post('/place-order', [CheckoutController::class, 'placeOrder'])
        ->name('place.order');

});


/*
|--------------------------------------------------------------------------
| USER DASHBOARD & PROFILE
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('/my-orders', 'index')->name('my.orders');
        Route::get('/my-orders/{id}', 'show')->name('my.orders.show');
        Route::get('/order/{id}/invoice', 'invoice');
    });

});


require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::resource('products', AdminProductController::class);

        Route::controller(AdminOrderController::class)->group(function () {
            Route::get('/orders', 'index')->name('admin.orders');
            Route::get('/orders/{id}', 'show')->name('admin.orders.show');
            Route::post('/orders/{id}/status', 'updateStatus')
                ->name('admin.orders.status');
        });

    });


/*
|--------------------------------------------------------------------------
| ORDER SUCCESS
|--------------------------------------------------------------------------
*/

Route::get('/order-success/{id}', function ($id) {
    $order = \App\Models\Order::findOrFail($id);
    return view('front.orders.success', compact('order'));
})->name('order.success');


/*
|--------------------------------------------------------------------------
| PAYMENT SUCCESS
|--------------------------------------------------------------------------
*/

Route::get('/payment-success/{id}', function ($id) {

    $order = \App\Models\Order::findOrFail($id);

    $order->payment_status = 'paid';
    $order->status = 'processing';
    $order->save();

    \App\Models\Cart::where('session_id', session()->getId())->delete();

    return redirect()->route('order.success', $order->id);
});