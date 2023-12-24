<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes(
    ['register' => false]
);

Route::middleware(['auth', 'role:superuser'])->group(function () {
    Route::get('superadmin', function () {
        return 'superadmin dashboard';
    });
});

Route::middleware(['auth', 'role:sales'])->group(function () {
    Route::get('sales', function () {
        return 'sales pages';
    });
});

Route::middleware(['auth', 'role:purchase'])->group(function () {
    Route::get('purchase', function () {
        return 'purchase pages';
    });
});

Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('manager', function () {
        return 'manager pages';
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
