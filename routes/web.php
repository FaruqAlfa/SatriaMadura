<?php

use App\Models\Supplier;
use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\StaffController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\SupplierResourceController;

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


// Auth::routes();

// Route::get('/', function () {
    //     return redirect->route('');
    // });
Route::get('/', [SupplierResourceController::class, 'index'])->name('home');
    
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/Postregister', [RegisterController::class, 'register'])->name('postregister');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'prosesLogin']);
});


Route::middleware('auth:admin')->group(function (){
    Route::resource('/staff', StaffController::class);
    Route::get('/getAllStaff',[StaffController::class, 'getAll'])->name('staffAll');
    Route::get('/StaffInput',[StaffController::class, 'create'])->name('staffCreate');
    Route::post('/makeStaff',[StaffController::class, 'store'])->name('makeStaff');
    // Route::resource('/supplier', [SupplierController::class]);
    Route::resource('/supplier', SupplierController::class);
    Route::get('/logoutAdmin', [AuthController::class, 'logoutAdmin'])->name('logoutAdmin');
    Route::get('/dashboardAdmin', [AdminController::class, 'index'])->name('dashboardAdmin');
    Route::get('/barang', [BarangController::class, 'getBarang'])->name('barang');
});


Route::middleware('auth:web')->group(function (){
    Route::get('/', [SupplierResourceController::class, 'index'])->name('home');
    Route::resource('/barang', BarangController::class);
    Route::resource('/barangmasuk', BarangMasukController::class);
    Route::resource('/dashboardSupplier', SupplierResourceController::class);
    Route::get('/logoutSupplier', [AuthController::class, 'logoutSupplier'])->name('logoutSupplier');
});



Route::middleware('auth:staff')->group(function (){
    Route::resource('/dashboard', StaffController::class);
    Route::get('/dashboardStaff', [StaffController::class, 'index'])->name('dashboardStaff');
    Route::resource('/barangKeluar', BarangKeluarController::class);
    Route::get('/logoutStaff', [AuthController::class, 'logoutStaff'])->name('logoutStaff');
});


Route::middleware('auth:staff')->group(function (){
    Route::resource('/dashboard', StaffController::class);
    Route::get('/dashboardStaff', [StaffController::class, 'index'])->name('dashboardStaff');
    Route::resource('/barangKeluar', BarangKeluarController::class);
    Route::get('/logoutStaff', [AuthController::class, 'logoutStaff'])->name('logoutStaff');
});


