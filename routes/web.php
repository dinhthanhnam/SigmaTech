<?php

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
use App\Http\Controllers\SaleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\OrderController;




Auth::routes();

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
  Route::get('/', [UserController::class, 'index'])->name('home.index');
});
Route::middleware(['auth', AuthAdmin::class])->group(function () {
  Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('laptops/Gaming', [LaptopController::class, 'showGamingLaptops'])
  ->name('gaming-laptops.show');

Route::get('laptops/Office', [LaptopController::class, 'showOfficeLaptops'])
  ->name('office-laptops.show');

Route::get('flash-sale', [SaleController::class, 'showFlashSale'])
  ->name('flash-sale');

Route::get('pc-parts/cpu', [CpuController::class, 'showCpus'])
  ->name('cpus.show');

Route::get('gaming-gears', function () {
  return view('categories.gaming-gears');
})->name('gaming-gears.show');
Route::get('monitors', function () {
  return view('categories.monitors');
})->name('monitors.show');
Route::get('pc-parts', function () {
  return view('categories.pc-parts');
})->name('pc-parts.show');
Route::get('media-devices', function () {
  return view('categories.media-devices');
})->name('media-devices.show');
Route::get('coolings', function () {
  return view('categories.coolings');
})->name('coolings.show');
Route::get('accessories', function () {
  return view('categories.accessories');
})->name('accessories.show');

Route::get('shipping-policy', function () {
  return view('pages.service-policy.shipping-policy');
})->name('pages.shipping-policy');
Route::get('warranty-policy', function () {
  return view('pages.service-policy.warranty-policy');
})->name('pages.warranty-policy');
Route::get('laptop-outlet', function () {
  return view('pages.laptop-outlet');
})->name('pages.laptop-outlet');
Route::get('account', function () {
  return view('user-account');
})->name('user-account');

//admin view
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/product', [ProductController::class, 'showAllProducts'])->name('admin.show-product');
Route::get('/admin/new-product', [ProductController::class, 'showAddProduct'])->name('admin.new-product');
Route::post('/admin/new-product', [ProductController::class, 'saveProduct'])->name('admin.save-product');
Route::get('/admin/order', [OrderController::class, 'showAllOrders'])->name('admin.show-order');



//single laptop
Route::get('laptops/{type}/{brand}/{id}', [LaptopController::class, 'show'])->name('laptop.show');

//cart
Route::get('/cart', [CartController::class, 'show'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/{product_type}/{product_id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{product_type}/{product_id}', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/update-bulk', [CartController::class, 'updateBulkQuantity'])->name('cart.updateBulkQuantity');
Route::get('/cart/count', [CartController::class, 'cartCount'])->name('cart.count');
//order
Route::get('/cart/order', [OrderController::class, 'orderInfo'])->name('order.info');
Route::post('/cart/order/place', [OrderController::class, 'placeOrder'])->name('order.place');


//single cpu
Route::get('pc-parts/{pcpart_type}/{brand}/{id}', [CpuController::class, 'show'])->name('cpu.show');

//single gpu
Route::get('gpu/{brand}/{id}', [GpuController::class, 'show'])->name('gpu.show');

//filter
Route::get('/laptops/filter', [LaptopController::class, 'filterLaptops'])->name('laptop.filter');

//Thanh tim kiem
Route::get('/search-suggestions', [HomeController::class, 'getSuggestions']);
