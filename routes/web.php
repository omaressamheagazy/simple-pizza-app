<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [OrderController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])-> prefix('dashboard/order')->group(function () {
    /*
        order operations
    */
    Route::get('/', [OrderController::class, 'index'])->name('menu');
    Route::get('/summary/{id}', [OrderController::class, 'viewOrderSummary'])->name("order-summary")->where('id', '[0-9]+');
    Route::post('/add-to-cart', [OrderController::class, 'addToCart'])->name('add-to-cart');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/success', [OrderController::class, 'success'])->name('checkout.success');
    Route::get('/cancel', [OrderController::class, 'cancel'])->name('checkout.cancel');
    
});

// Auth::routes([
//     'verify' => true
// ]);

require __DIR__.'/auth.php';

