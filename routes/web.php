<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaptopsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('laptops', [LaptopsController::class, 'laptops']) ->name('categories.laptops');
Route::get('gaming-laptops', [LaptopsController::class, 'gaminglaptops']) ->name('categories.gaming-laptops');

Route::get('shipping-policy', function () {
    return view('pages.service-policy.shipping-policy');
}) ->name('pages.shipping-policy');
Route::get('warranty-policy', function () {
    return view('pages.service-policy.warranty-policy');
}) ->name('pages.warranty-policy');
Route::get('flash-sale', function () {
    return view('pages.flash-sale');
}) ->name('pages.flash-sale');
Route::get('laptop-outlet', function () {
    return view('pages.laptop-outlet');
}) ->name('pages.laptop-outlet');

Route::get('login', function () {
    return view('pages.login');
}) ->name('pages.login');
Route::get('signup', function () {
    return view('pages.signup');
}) ->name('pages.signup');