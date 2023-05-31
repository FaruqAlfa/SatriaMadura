<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::get('/barang', [App\Http\Controllers\BarangController::class, 'getBarang']);
Route::get('/staff', [App\Http\Controllers\StaffController::class, 'getStaff']);
Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'getSupplier']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
