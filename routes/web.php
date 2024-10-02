<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('login', function () {
  return view('login');
})->name('login');
Route::get('register', function () {
  return view('register');
})->name('register');
Route::get('account', function () {
  return view('useraccount');
})->name('useraccount');