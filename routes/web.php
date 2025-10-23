<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonialController;

Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/projects', fn() => view('pages.projects'))->name('projects');
Route::get('/contact', fn() => view('pages.contact'))->name('contact');
Route::get('/testimonials', fn() => view('pages.testimonials'))->name('testimonials');

Route::resource('testimonials', TestimonialController::class)->only(['index', 'store', 'destroy']);

