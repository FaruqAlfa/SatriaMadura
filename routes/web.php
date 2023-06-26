<?php

use App\Models\Supplier;
use App\Models\Staff;
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
use App\Http\Controllers\LapBarangKeluarController;
use App\Http\Controllers\LapBarangMasukController;
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
// Route::get('/', [SupplierResourceController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/Postregister', [RegisterController::class, 'register'])->name('postregister');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'prosesLogin']);
});


Route::middleware('auth:admin')->group(function () {
    Route::resource('/staff', StaffController::class);
    Route::get('/search', [StaffController::class, 'index'])->name('search');
    Route::get('/getAllStaff', [StaffController::class, 'getAll'])->name('staffAll');
    Route::get('/StaffInput', [StaffController::class, 'create'])->name('staffCreate');
    Route::post('/makeStaff', [StaffController::class, 'store'])->name('makeStaff');
    Route::resource('/supplierRes', SupplierResourceController::class);
    Route::resource('/supplier', SupplierController::class);
    Route::delete('/deleteStaff{id}', [StaffController::class, 'destroy'])->name('deleteStaff');
    Route::get('/logoutAdmin', [AuthController::class, 'logoutAdmin'])->name('logoutAdmin');
    Route::get('/dashboardAdmin', [AdminController::class, 'index'])->name('dashboardAdmin');
    Route::get('/admin/{id}', [AdminController::class, 'showAdmin'])->name('layoutsAdmin.sidebarAdmin');
    Route::get('/barang', [BarangController::class, 'getBarang'])->name('barang');
    Route::get('/barang_masuk_admin', [AdminController::class, 'getAdmin2'])->name('barang_masuk_admin');
    Route::get('/barang_keluar_admin', [AdminController::class, 'getAdmin1'])->name('barang_keluar_admin');
    Route::get('/lap_barang_masuk_admin', [AdminController::class, 'getLapAdmin2'])->name('lap_barang_masuk_admin');
    Route::get('/lap_barang_keluar_admin', [AdminController::class, 'getLapAdmin1'])->name('lap_barang_keluar_admin');
    Route::post('/lap_barang_masuk_admin', [AdminController::class, 'filterByTanggalMasuk2'])->name('filterByTanggalMasuk2');
    Route::post('/lap_barang_keluar_admin', [AdminController::class, 'filterByTanggalKeluar2'])->name('filterByTanggalKeluar2');
    Route::get('/supplier1', [SupplierResourceController::class, 'getSupplier'])->name('supplier1');
});

Route::middleware('auth:web')->group(function () {
    Route::resource('/supplier', SupplierController::class);
    Route::resource('/barang', BarangController::class);
    Route::resource('/barangmasuk', BarangMasukController::class);
    Route::get('/barangmasukSup', [BarangMasukController::class, 'index'])->name('barangMasukSup');
    Route::resource('/dashboardSupplier1', SupplierResourceController::class);
    Route::get('/dashboardSupplier', [SupplierResourceController::class, 'index'])->name('dashboardSupplier');
    Route::get('/logoutSupplier', [AuthController::class, 'logoutSupplier'])->name('logoutSupplier');
    Route::get('/detailEditSupplier/{id}', [SupplierResourceController::class, 'show'])->name('detailEditSupplier');
    Route::get('/detailSupplier/{id}', [SupplierResourceController::class, 'show'])->name('showDetailSupplier');
    Route::get('/editSupplier{id}', [SupplierResourceController::class, 'edit'])->name('editSup');
    Route::put('/updateSupplier{id}', [SupplierResourceController::class, 'update'])->name('updateSup');
});


Route::middleware('auth:staff')->group(function () {
    Route::resource('/supplier', SupplierController::class);
    Route::resource('/dashboardSup', SupplierResourceController::class);
    Route::resource('/dashboard', StaffController::class);
    Route::get('/dashboardStaff', [StaffController::class, 'index'])->name('dashboardStaff');
    Route::get('/detailStaff/{id}', [StaffController::class, 'show'])->name('showDetail');
    Route::get('/detailEdit/{id}', [StaffController::class, 'show'])->name('detailEdit');
    Route::get('/editStaff{id}', [StaffController::class, 'edit'])->name('edit');
    Route::put('/updateStaff{id}', [StaffController::class, 'update'])->name('update');
    Route::resource('/barangan', BarangController::class);
    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::get('/inputbarang', [BarangController::class, 'create'])->name('inputbarang');
    Route::resource('/barangm', BarangMasukController::class);
    Route::resource('/barangkeluar', BarangKeluarController::class);
    Route::get('/barangkeluarSta', [BarangKeluarController::class, 'index'])->name('barangKeluar');
    Route::resource('/barangmasuk', BarangMasukController::class);
    Route::get('/barangmasuk', [BarangMasukController::class, 'index'])->name('barangMasuk');
    Route::resource('/barangk', BarangKeluarController::class);
    Route::post('/lap_barang_keluar', [LapBarangKeluarController::class, 'filterByTanggalKeluar'])->name('filterByTanggalKeluar');
    Route::get('/lap_barang_masuk', [LapBarangMasukController::class, 'index'])->name('lap_barang_masuk');
    Route::get('/lap_barang_keluar', [LapBarangKeluarController::class, 'index'])->name('lap_barang_keluar');
    Route::get('/lap_barang_masuk/cetakPDF2', [LapBarangMasukController::class, 'cetakPDF2'])->name('cetakPDF2');
    Route::get('/lap_barang_masuk/cetakPDF2All', [LapBarangMasukController::class, 'cetakPDF2All'])->name('cetakPDF2All');
    Route::post('/lap_barang_masuk', [LapBarangMasukController::class, 'filterByTanggalMasuk'])->name('filterByTanggalMasuk');
    Route::get('/lap_barang_keluar/cetakPDF1', [LapBarangKeluarController::class, 'cetakPDF1'])->name('cetakPDF1');
    Route::get('/lap_barang_keluar/cetakPDF1All', [LapBarangKeluarController::class, 'cetakPDF1All'])->name('cetakPDF1All');
    Route::get('/supplierWeb', [SupplierResourceController::class, 'getSupplier2'])->name('supplierWeb');
    Route::get('/logoutStaff', [AuthController::class, 'logoutStaff'])->name('logoutStaff');
});
