<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;


Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/projects', fn() => view('pages.projects'))->name('projects');
Route::get('/contact', fn() => view('pages.contact'))->name('contact');
Route::get('/testimonials', fn() => view('pages.testimonials'))->name('testimonials');

Route::resource('testimonials', TestimonialController::class)->only(['index', 'store', 'destroy']);

Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/checkout', [CartController::class, 'checkoutForm'])->name('cart.checkout.form');
Route::post('/checkout/submit', [CartController::class, 'checkoutSubmit'])->name('cart.checkout.submit');

Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');


Route::get('/cart', [CartController::class, 'index'])->name('cart.view');


Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');



// Admin products CRUD (resource)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class)->except(['show']);
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('products.destroy');
});

// Frontend products listing and detail
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');




Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.view'); // your cart page
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update'); // for qty changes




Route::get('/projects', [ProductController::class, 'index'])->name('projects');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

