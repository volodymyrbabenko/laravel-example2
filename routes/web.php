<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/cart', [MainController::class, 'cart'])->name('cart');
Route::post('/cart', [MainController::class, 'updateCart'])->name('cart.update');

Route::get('/delivery', [MainController::class, 'delivery'])->name('delivery');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
Route::get('/section', [MainController::class, 'section'])->name('section');
Route::get('/good/{alias}', [MainController::class, 'good'])->name('good');
Route::get('/sort/{type}/{up}', [MainController::class, 'sort'])->name('sort');
Route::get('/sort_section/{type}/{up}/{name}', [MainController::class, 'sortSection'])->name('sort_section');
Route::get('/genre/{name}', [MainController::class, 'show'])->name('genre.show');

Route::get('/add_to_cart/{id}', [MainController::class, 'addToCart'])->name('add_to_cart');
Route::get('/cart_delete/{id}', [MainController::class, 'cartDelete'])->name('cart_delete');

Route::any('/checkout', [MainController::class, 'checkout'])->name('checkout');
Route::get('/addorder', [MainController::class, 'addOrderView'])->name('addorder');
Route::get('/search', [MainController::class, 'search'])->name('search');