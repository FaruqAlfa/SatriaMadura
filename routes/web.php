<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authenticate;

use function Ramsey\Uuid\v1;

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

// Route::get('/', function () {
//     return view('Auth.login');
// });


Auth::routes();
Route::get('/barang', [App\Http\Controllers\BarangController::class, 'getBarang']);
Route::get('/staff', [App\Http\Controllers\StaffController::class, 'getStaff']);
Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'getSupplier']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'prosesLogin']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/dashboard', function(){
    return view('dashboardAdmin');
})->middleware('auth:admin,web');

