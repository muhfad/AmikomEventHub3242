<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\ReviewController;


/*
|--------------------------------------------------------------------------
| Customer Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    // Login
    Route::get('/login', [CustomerAuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [CustomerAuthController::class, 'authenticate'])
        ->name('login.authenticate');

    // Register
    Route::get('/register', [CustomerAuthController::class, 'register'])
        ->name('register');

    Route::post('/register', [CustomerAuthController::class, 'store'])
        ->name('register.store');

    // Google Login
    Route::get('/auth/google', [GoogleController::class, 'redirect'])
        ->name('google.login');

    Route::get('/auth/google/callback', [GoogleController::class, 'callback']);
});

Route::post('/logout', [CustomerAuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

Route::middleware('auth')->group(function () {

    Route::get('/checkout/{event}', [CheckoutController::class, 'create'])
        ->name('checkout.create');

    Route::post('/checkout/{event}', [CheckoutController::class, 'store'])
        ->name('checkout.store');

});

Route::middleware('auth')->group(function () {

    Route::get('/review/{transaction}', [ReviewController::class, 'create'])
        ->name('review.create');

    Route::post('/review/{transaction}', [ReviewController::class, 'store'])
        ->name('review.store');

});

Route::middleware('auth')->group(function () {

    Route::get('/my-tickets', [App\Http\Controllers\TicketController::class, 'index'])
        ->name('tickets.index');

});

Route::get('/payment/{order_id}', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::get('/success/{order_id}', [CheckoutController::class, 'success'])->name('checkout.success');

Route::post('/midtrans/callback', [WebhookController::class, 'handle']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('events', \App\Http\Controllers\Admin\EventController::class);
        Route::get('transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions.index');
        Route::resource('categories', CategoryController::class);  
    });
});

Route::view('/profil', 'profil')->name('profil');

Route::view('/katalog', 'katalog')->name('katalog');

Route::view('/bantuan', 'bantuan')->name('bantuan');