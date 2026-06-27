<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

Route::get('/checkout/{event}', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout/{event}', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/payment/{order_id}', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::get('/success/{order_id}', [CheckoutController::class, 'success'])->name('checkout.success');

Route::post('/midtrans/callback', [\App\Http\Controllers\MidtransWebhookController::class, 'handle']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('events', \App\Http\Controllers\Admin\EventController::class);
        Route::get('transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions.index');
        Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');  
    });
});

Route::view('/profil', 'profil')->name('profil');

Route::view('/katalog', 'katalog')->name('katalog');

Route::view('/bantuan', 'bantuan')->name('bantuan');