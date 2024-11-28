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
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\CoolingController;
use App\Http\Controllers\GaminggearController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PcpartController;


Auth::routes([
  'verify' => true
]);

Route::post('/change-password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'changePassword'])->name('password.change');


Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home.index');

//Trang chuyen muc laptop
Route::prefix('laptops')->group(function () {
  Route::get('Gaming', [LaptopController::class, 'showGamingLaptops'])->name('gaming-laptops.show');
  Route::get('Office', [LaptopController::class, 'showOfficeLaptops'])->name('office-laptops.show');
});
//Trang chuyen muc man hinh
Route::get('monitors', [MonitorController::class, 'showMonitors'])->name('monitors.show');

//Trang chuyen muc pc part
Route::get('pc-parts', [PcpartController::class, 'showPcparts'])->name('pc-parts.show');
Route::prefix('pc-parts')->group(function() {
  Route::get('cpu', [CpuController::class, 'showCpus'])->name('cpus.show');
  Route::get('gpu', [GpuController::class, 'showGpus'])->name('gpus.show');
});

//Trang chuyen muc Gaming Gear
Route::get('gaminggears', [GaminggearController::class, 'showGaminggears'])->name('gaming-gears.show');

//Trang chuyen muc Media
Route::get('media', [MediaController::class, 'showMedia'])->name('media_devices.show');

//Trang chuyen muc Cooling
Route::get('coolings', [CoolingController::class, 'showCoolings'])->name('coolings.show');

//Trang chuyen muc Accessory
Route::get('accessories', [AccessoryController::class, 'showAccessories'])->name('accessories.show');

//Trang flash sale chill chill
Route::get('flash-sale', [SaleController::class, 'showFlashSale'])->name('flash-sale');


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
  Route::get('/order/{id}', [AdminOrderController::class, 'getOrderDetails']);
  Route::post('/order/{id}', [AdminOrderController::class, 'updateOrder'])->name('admin.order-update');

  Route::get('/sale', [AdminSaleController::class, 'index'])->name('admin.show-sale');
  Route::get('/slider', [SliderController::class, 'showAllSliders'])->name('admin.show-slider');
  Route::get('/new-slider', [SliderController::class, 'showAddSlider'])->name('admin.new-slider');
  Route::post('/new-slider', [SliderController::class, 'saveSlider'])->name('admin.save-slider');
});


Route::delete('/delete-product/{table}/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');
Route::delete('/delete-sale-product/{table}/{id}', [AdminSaleController::class, 'deleteSaleProduct'])->name('delete.saleproduct');
Route::get('/search-products', [ProductController::class, 'searchProducts']);

//cart
Route::prefix('cart')->group( function() {
  Route::get('/', [CartController::class, 'show'])->name('cart');
  Route::post('/add', [CartController::class, 'add'])->name('cart.add');
  Route::patch('/{product_type}/{product_id}', [CartController::class, 'update'])->name('cart.update');
  Route::delete('/{product_type}/{product_id}', [CartController::class, 'remove'])->name('cart.remove');
  Route::patch('/update-bulk', [CartController::class, 'updateBulkQuantity'])->name('cart.updateBulkQuantity');
  Route::get('/count', [CartController::class, 'cartCount'])->name('cart.count');
  Route::post('/buynow', [CartController::class, 'buynow'])->name('buynow');

});

//order
Route::prefix('cart/order')->group( function() {
  Route::get('/', [OrderController::class, 'orderInfo'])->name('order.info');
  Route::post('/place', [OrderController::class, 'placeOrder'])->name('order.place')->middleware('verified');
});
// Route::post('/order/confirm-payment', [OrderController::class, 'confirmPayment'])->name('order.confirm-payment');



//route cho single
Route::get('laptops/{type}/{brand}/{id}', [LaptopController::class, 'show'])->name('laptop.show');
Route::prefix('pc-parts')->group( function() {
  Route::get('/cpu/{brand}/{id}', [CpuController::class, 'show'])->name('cpu.show');
  Route::get('/gpu/{brand}/{id}', [GpuController::class, 'show'])->name('gpu.show');
});
Route::get('monitors/{brand}/{id}', [MonitorController::class, 'show'])->name('monitor.show');
Route::get('gaminggears/{brand}/{id}', [GaminggearController::class, 'show'])->name('gaminggear.show');
Route::get('media/{brand}/{id}', [MediaController::class, 'show'])->name('media.show');
Route::get('cooling/{brand}/{id}', [CoolingController::class, 'show'])->name('cooling.show');
Route::get('accessory/{brand}/{id}', [AccessoryController::class, 'show'])->name('accessory.show');


//filter
Route::get('/laptops/filter', [LaptopController::class, 'filterLaptops'])->name('laptop.filter');
Route::get('/gaminggears/filter', [GaminggearController::class, 'filterGaminggears'])->name('gaminggear.filter');
Route::get('/media/filter', [MediaController::class, 'filterMedia'])->name('media.filter');
Route::get('/coolings/filter', [CoolingController::class, 'filterCoolings'])->name('cooling.filter');
Route::get('/accessories/filter', [AccessoryController::class, 'filterAccessories'])->name('accessory.filter');

//Thanh tim kiem
Route::get('/search-suggestions', [HomeController::class, 'getSuggestions']);
