<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CPUController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaptopController;

Auth::routes();

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
  Route::get('/', [UserController::class, 'index'])->name('home.index');
});
Route::middleware(['auth', AuthAdmin::class])->group(function () {
  Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
});


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('gaming-laptops', function () {
  return view('categories.gaming-laptops');
})->name('categories.gaming-laptops');
Route::get('laptops', function () {
  return view('categories.laptops');
})->name('categories.laptops');
Route::get('gaming-gears', function () {
  return view('categories.gaming-gears');
})->name('categories.gaming-gears');
Route::get('monitors', function () {
  return view('categories.monitors');
})->name('categories.monitors');
Route::get('pc-parts', function () {
  return view('categories.pc-parts');
})->name('categories.pc-parts');
Route::get('media-devices', function () {
  return view('categories.media-devices');
})->name('categories.media-devices');
Route::get('coolings', function () {
  return view('categories.coolings');
})->name('categories.coolings');
Route::get('accessories', function () {
  return view('categories.accessories');
})->name('categories.accessories');

Route::get('shipping-policy', function () {
  return view('pages.service-policy.shipping-policy');
})->name('pages.shipping-policy');
Route::get('warranty-policy', function () {
  return view('pages.service-policy.warranty-policy');
})->name('pages.warranty-policy');
Route::get('flash-sale', function () {
  return view('pages.flash-sale');
})->name('pages.flash-sale');
Route::get('laptop-outlet', function () {
  return view('pages.laptop-outlet');
})->name('pages.laptop-outlet');
Route::get('account', function () {
  return view('user-account');
})->name('user-account');

//admin view
Route::get('admin/new-product', function () {
  return view('admin.pages.new-product');
})->name('new-product');

//single laptop
Route::get('laptops/{type}/{brand}/{id}', [LaptopController::class, 'show'])->name('laptop.show');



//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');


//single cpu
Route::get('cpus/{brand}/{id}', [CPUController::class, 'show'])->name('cpu.show');

