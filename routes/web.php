<?php

use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CpuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GpuController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController as AdminSaleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\CoolingController;
use App\Http\Controllers\GaminggearController;
use App\Http\Controllers\MediaController;
use App\Models\Accessory;

Auth::routes();

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route::middleware(['auth'])->group(function () {
//   Route::get('/', [UserController::class, 'index'])->name('home.index');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');

//Trang chuyen muc laptop
Route::prefix('laptops')->group(function () {
  Route::get('Gaming', [LaptopController::class, 'showGamingLaptops'])->name('gaming-laptops.show');
  Route::get('Office', [LaptopController::class, 'showOfficeLaptops'])->name('office-laptops.show');
});
//Trang chuyen muc man hinh
Route::get('monitors', [MonitorController::class, 'showMonitors'])->name('monitors.show');

//Trang chuyen muc pc part
Route::prefix('pc-parts')->group(function() {
  Route::get('cpu', [CpuController::class, 'showCpus'])->name('cpus.show');
  Route::get('gpu', [GpuController::class, 'showGpus'])->name('cpus.show');
});
//Trang chuyen muc Gaming Gear
Route::get('gaminggears', [GaminggearController::class, 'showGaminggears'])->name('gaming-gears.show');

//Trang chuyen muc Media
Route::get('media', [MediaController::class, 'showMedia'])->name('media.show');

//Trang chuyen muc Cooling
Route::get('cooling', [CoolingController::class, 'showCoolings'])->name('coolings.show');

//Trang chuyen muc Accessory
Route::get('accessory', [AccessoryController::class, 'showAccessories'])->name('accessories.show');

//Trang flash sale chill chill
Route::get('flash-sale', [SaleController::class, 'showFlashSale'])->name('flash-sale');




Route::get('pc-parts', function () {
  return view('categories.pc-parts');
})->name('pc-parts.show');
// Route::get('media-devices', function () {
//   return view('categories.media-devices');
// })->name('media-devices.show');
// Route::get('coolings', function () {
//   return view('categories.coolings');
// })->name('coolings.show');
// Route::get('accessories', function () {
//   return view('categories.accessories');
// })->name('accessories.show');

Route::get('shipping-policy', function () {
  return view('pages.service-policy.shipping-policy');
})->name('pages.shipping-policy');
Route::get('warranty-policy', function () {
  return view('pages.service-policy.warranty-policy');
})->name('pages.warranty-policy');
Route::get('laptop-outlet', function () {
  return view('pages.laptop-outlet');
})->name('pages.laptop-outlet');

//user account
Route::get('account', [UserController::class, 'index'])->name('user-account');
Route::get('account/order/{id}', [UserController::class, 'getOrderDetails']);


//admin view

Route::middleware(['auth', AuthAdmin::class])->prefix('admin')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.index');
  Route::get('/product', [ProductController::class, 'showAllProducts'])->name('admin.show-product');
  Route::get('/new-product', [ProductController::class, 'showAddProduct'])->name('admin.new-product');
  Route::post('/new-product', [ProductController::class, 'saveProduct'])->name('admin.save-product');
  Route::get('/order', [AdminOrderController::class, 'showAllOrders'])->name('admin.show-order');
  Route::get('/sale', [AdminSaleController::class, 'index'])->name('admin.show-sale');
});

//cart
Route::prefix('cart')->group( function() {
  Route::get('/', [CartController::class, 'show'])->name('cart');
  Route::post('/add', [CartController::class, 'add'])->name('cart.add');
  Route::patch('/{product_type}/{product_id}', [CartController::class, 'update'])->name('cart.update');
  Route::delete('/{product_type}/{product_id}', [CartController::class, 'remove'])->name('cart.remove');
  Route::patch('/update-bulk', [CartController::class, 'updateBulkQuantity'])->name('cart.updateBulkQuantity');
  Route::get('/count', [CartController::class, 'cartCount'])->name('cart.count');
});

//order
Route::prefix('cart/order')->group( function() {
  Route::get('/', [OrderController::class, 'orderInfo'])->name('order.info');
  Route::post('/place', [OrderController::class, 'placeOrder'])->name('order.place');
});

//route cho single
Route::get('laptops/{type}/{brand}/{id}', [LaptopController::class, 'show'])->name('laptop.show');
Route::prefix('pc-parts')->group( function() {
  Route::get('/cpu/{brand}/{id}', [CpuController::class, 'show'])->name('cpu.show');
  Route::get('/gpu/{brand}/{id}', [GpuController::class, 'show'])->name('gpu.show');
});
Route::get('monitors/{brand}/{id}', [MonitorController::class, 'show'])->name('monitor.show');
Route::get('gaminggears/{brand}/{id}', [GaminggearController::class, 'show'])->name('gaminggear.show');


//filter
Route::get('/laptops/filter', [LaptopController::class, 'filterLaptops'])->name('laptop.filter');
Route::get('/gaminggears/filter', [GaminggearController::class, 'filterGaminggears'])->name('gaminggear.filter');

//Thanh tim kiem
Route::get('/search-suggestions', [HomeController::class, 'getSuggestions']);
