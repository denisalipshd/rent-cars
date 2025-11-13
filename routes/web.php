<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/rent-cars', [FrontController::class, 'rentCars'])->name('front.rent-cars');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');

Route::post('/rentals', [FrontController::class, 'rentals'])->name('front.rentals');

Route::get('/payment/{rental}', [FrontController::class, 'payment'])->name('front.payment');
Route::post('/payment/{rental}/store', [FrontController::class, 'paymentStore'])->name('front.payment.store');
