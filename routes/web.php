<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CartController;

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
