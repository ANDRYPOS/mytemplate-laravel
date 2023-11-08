<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
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
// lemparan jika sudah login tidak akan bisa mengakses login kembali jika belum logout
Route::get('/home', function () {
    return redirect('/');
});

// akses sebelum login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'authenticate']);
});

// akses setelah login
Route::middleware(['auth'])->group(function () {
    // auth
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // customer
    Route::get('/data-customer', [DataController::class, 'customer'])->name('view-data');
    Route::get('/insert-customer', [DataController::class, 'insert'])->name('view-data');
    Route::post('/store-customer', [DataController::class, 'store'])->name('view-data');
    Route::get('/edit-customer/{id}', [DataController::class, 'edit'])->name('view-data');
    Route::put('/update-customer', [DataController::class, 'update'])->name('report-data');
    Route::get('/destroy-customer/{id}', [DataController::class, 'destroy'])->name('report-data');

    // sales
    Route::get('/sales', [SalesController::class, 'sales'])->name('view-sales');
    Route::get('/insert-sales', [SalesController::class, 'insert'])->name('view-sales');
    Route::post('/store-sales', [SalesController::class, 'store'])->name('view-sales');
    Route::get('/edit-sales/{id}', [SalesController::class, 'edit'])->name('view-sales');
    Route::put('/update-sales', [SalesController::class, 'update'])->name('view-sales');
    Route::get('/destroy-sales/{id}', [SalesController::class, 'destroy'])->name('view-sales');

    // item
    Route::get('/item', [ItemController::class, 'item'])->name('view-item');
    Route::get('/insert-item', [ItemController::class, 'insert'])->name('view-item');
    Route::post('/store-item', [ItemController::class, 'store'])->name('view-item');
    Route::get('/edit-item/{id}', [ItemController::class, 'edit'])->name('view-item');
    Route::put('/update-item', [ItemController::class, 'update'])->name('view-item');
    Route::get('/destroy-item/{id}', [ItemController::class, 'destroy'])->name('view-item');
});
