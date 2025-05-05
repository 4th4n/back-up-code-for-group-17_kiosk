<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Log; 

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestockController;
use App\Http\Controllers\DisplayController;
Route::get('/admin/restock', [RestockController::class, 'index'])->name('restock.index');
Route::post('/admin/restock', [RestockController::class, 'store'])->name('restock.store');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/admin', [AuthController::class, 'showDashboard'])->name('admin.dashboard');
Route::get('/admin_dashboard', [AuthController::class, 'showDashboard'])->name('admin.dashboard');
// Route::middleware('auth')->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
// });
// routes/web.php
Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
Route::get('/admin/history', [OrderController::class, 'orderHistory'])->name('admin.history');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');





// Route::get('/admin', function () {
//     return view('admin'); // Ang 'admin' ay tumutukoy sa 'admin.blade.php' file sa views folder.
// });


// use App\Http\Controllers\AdminController;

// Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
// Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
// Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');


Route::get('/', [OrderController::class, 'index'])->name('kiosk.index');
Route::post('/add-to-order', [OrderController::class, 'addToOrder'])->name('order.add');
Route::post('/remove-from-order', [OrderController::class, 'removeFromOrder'])->name('order.remove');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::get('/orders/view', [OrderController::class, 'viewOrders'])->name('orders.view');
Route::get('/admin/orders', [OrderController::class, 'viewOrders'])->name('admin.orders');
Route::get('/order/{orderNumber}', [OrderController::class, 'viewOrder'])->name('order.view');

Route::get('/order/cart', [OrderController::class, 'getCartData'])->name('order.cart');


Route::post('/remove-from-order', [OrderController::class, 'removeFromOrder'])->name('order.remove');
Route::get('/orders/history', [OrderController::class, 'orderHistory'])->name('orders.history');



// Show the form to add a new item
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');

// Store the newly created item
Route::post('/items', [ItemController::class, 'store'])->name('items.store');

Route::get('items', [ItemController::class, 'index'])->name('items.index');

Route::resource('items', ItemController::class);

Route::post('/order/update', [OrderController::class, 'update'])->name('order.update');

Route::get('/menu/search', [ItemController::class, 'search'])->name('menu.search');

Route::get('/menu/category/{category}', [ItemController::class, 'showCategory'])->name('menu.category');




// In routes/web.php
Route::patch('/order/{id}/complete', [OrderController::class, 'completeOrder'])->name('order.complete');

Route::get('/reports', [OrderController::class, 'dailyReport'])->name('reports');
// Route::get('order/{orderNumber}/receipt', [OrderController::class, 'generateReceipt'])->name('order.receipt');
use App\Http\Controllers\CashierController;

Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');
Route::post('/cashier/order/{id}/complete', [CashierController::class, 'complete'])->name('cashier.complete');
Route::post('/cashier/order/{id}/cancel', [CashierController::class, 'cancel'])->name('cashier.cancel');
// routes/web.php
Route::get('/cashier/staff', [CashierController::class, 'paidOrders'])->name('cashier.paidOrders');
// routes/web.php
Route::get('/cashier/receipt/{id}', [CashierController::class, 'generateReceipt'])->name('cashier.generateReceipt');
Route::get('/cashier/orders', [OrderController::class, 'fetchOrders'])->name('cashier.orders');
Route::get('/cashier/orders', [CashierController::class, 'fetchOrders'])->name('cashier.fetchOrders');


Route::get('/cashier/paid-orders', [CashierController::class, 'paidOrders'])->name('cashier.staff');
Route::post('/cashier/cancel/{order}', [CashierController::class, 'cancel'])->name('cashier.cancel');
// Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/restocks', [RestockController::class, 'index'])->name('admin.restocks');

use App\Http\Controllers\AdminController;

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::get('/cart/view', [OrderController::class, 'viewCart'])->name('cart.view');
// In routes/web.php
Route::get('/display-board', [DisplayController::class, 'index'])->name('display.board');
Route::post('/cashier/mark-order-ready', [CashierController::class, 'markOrderReady'])->name('cashier.markOrderReady');

Route::get('/display', [OrderController::class, 'showReadyOrders'])->name('orders.display');
Route::post('/order/{id}/ready', [OrderController::class, 'markAsReady'])->name('order.ready');
Route::post('/order/{id}/picked-up', [OrderController::class, 'markAsPickedUp'])->name('order.pickedup');
Route::post('/auto-pickup', [OrderController::class, 'autoPickUp'])->name('order.autoPickUp');
// Add this to your routes/web.php file
Route::post('/reset-food-quantities', [App\Http\Controllers\ItemController::class, 'resetFoodQuantities'])->name('items.reset-food');
// Route::get('/test-reset-food', [App\Http\Controllers\ItemController::class, 'testResetFoodQuantities']);
Route::get('/api/orders/ready', 'OrderController@getReadyOrders')->name('api.orders.ready');