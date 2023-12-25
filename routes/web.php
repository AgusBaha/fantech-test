<?php

use App\Http\Controllers\Inventories\InventoriesController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Sales\SalesController;
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
    Route::controller(InventoriesController::class)->group(function () {
        Route::get('/datainventories', 'index')->name('datainventories');
        Route::get('/datainventories/create', 'create')->name('datainventories.create');
        Route::post('/datainventories/store', 'store')->name('datainventories.store');
        Route::get('/datainventories/{id}/edit', 'edit')->name('datainventories.edit');
        Route::put('/datainventories/{id}', 'update')->name('datainventories.update');
        Route::delete('/datainventories/{id}', 'destroy')->name('datainventories.destroy');
    });

    Route::controller(SalesController::class)->group(function () {
        Route::get('/sales', 'index')->name('sales.index');
        Route::get('/sales/create', 'create')->name('sales.create');
        Route::post('/sales/store', 'store')->name('sales.store');
        Route::get('/sales/{id}/edit', 'edit')->name('sales.edit');
        Route::put('/sales/{id}', 'update')->name('sales.update');
        Route::delete('/sales/{id}', 'destroy')->name('sales.destroy');

        Route::get('/sales/{id}', 'detail')->name('sales.detail');
        Route::post('/sales/storeDetail', 'storeDetail')->name('sales.store.detail');
        Route::put('/sales/detail/{id}', 'detailUpdate')->name('sales.detail.update');

        Route::get('/sales/{id}/print', 'printSales')->name('sales.print');
    });

    Route::controller(PurchaseController::class)->group(function () {
        Route::get('/purchase', 'index')->name('purchase.index');
        Route::get('/purchase/create', 'create')->name('purchase.create');
        Route::post('/purchase/store', 'store')->name('purchase.store');
        Route::get('/purchase/{id}/edit', 'edit')->name('purchase.edit');
        Route::put('/purchase/{id}', 'update')->name('purchase.update');
        Route::delete('/purchase/{id}', 'destroy')->name('purchase.destroy');

        Route::get('/purchase/{id}', 'detail')->name('purchase.detail');
        Route::post('/purchase/storeDetail', 'storeDetail')->name('purchase.store.detail');
        Route::put('/purchase/detail/{id}', 'detailUpdate')->name('purchase.detail.update');

        Route::get('/pruchase/{id}/print', 'printPruchase')->name('pruchase.print');
    });
});

Route::middleware(['auth', 'role:sales'])->group(function () {
    Route::controller(SalesController::class)->group(function () {
        Route::get('/sales', 'index')->name('sales.index');
        Route::get('/sales/create', 'create')->name('sales.create');
        Route::post('/sales/store', 'store')->name('sales.store');
        Route::get('/sales/{id}/edit', 'edit')->name('sales.edit');
        Route::put('/sales/{id}', 'update')->name('sales.update');
        Route::delete('/sales/{id}', 'destroy')->name('sales.destroy');

        Route::get('/sales/{id}', 'detail')->name('sales.detail');
        Route::post('/sales/storeDetail', 'storeDetail')->name('sales.store.detail');
        Route::put('/sales/detail/{id}', 'detailUpdate')->name('sales.detail.update');
    });
});

Route::middleware(['auth', 'role:purchase'])->group(function () {
    Route::controller(PurchaseController::class)->group(function () {
        Route::get('/purchase', 'index')->name('purchase.index');
        Route::get('/purchase/create', 'create')->name('purchase.create');
        Route::post('/purchase/store', 'store')->name('purchase.store');
        Route::get('/purchase/{id}/edit', 'edit')->name('purchase.edit');
        Route::put('/purchase/{id}', 'update')->name('purchase.update');
        Route::delete('/purchase/{id}', 'destroy')->name('purchase.destroy');

        Route::get('/purchase/{id}', 'detail')->name('purchase.detail');
        Route::post('/purchase/storeDetail', 'storeDetail')->name('purchase.store.detail');
        Route::put('/purchase/detail/{id}', 'detailUpdate')->name('purchase.detail.update');
    });
});

Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('managercoba', function () {
        return 'manager pages';
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
