<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Barang_Keluar;
use App\Models\Barang_Masuk;
use App\Models\SupplierResource;


class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::all();
        return view('Admin.dashboardAdmin', ['Admin' => $admin]);
    }

    public function getAdmin1()
    {
        $barang_keluar = Barang_Keluar::all();
        // Menghitung jumlah total harga
        $total_harga1 = $barang_keluar->sum('total');
        return view('perbarangan.barang_keluar_admin', compact('barang_keluar', 'total_harga1'));
    }

    public function getLapAdmin1()
    {
        $barang_keluar = Barang_Keluar::all();
        // Menghitung jumlah total harga
        $total_harga1 = $barang_keluar->sum('total');
        return view('laporan.lap_barang_keluar_admin', compact('barang_keluar', 'total_harga1'));
    }

    public function getAdmin2()
    {
        $barang_masuk = Barang_Masuk::all();
        // Menghitung jumlah total harga
        $total_harga2 = $barang_masuk->sum('total');
        return view('perbarangan.barang_masuk_admin', compact('barang_masuk', 'total_harga2'));
    }

    public function getLapAdmin2()
    {
        $barang_masuk = Barang_Masuk::all();
        // Menghitung jumlah total harga
        $total_harga2 = $barang_masuk->sum('total');
        return view('laporan.lap_barang_masuk_admin', compact('barang_masuk', 'total_harga2'));
    }

    public function filterByTanggalKeluar2(Request $request)
    {
        // Validasi input tanggal
        $request->validate([
            'tanggal_keluar' => 'required',
        ]);
        $tanggal_keluar = $request->get('tanggal_keluar');

        // // Ambil data tanggal_keluar yang tersedia di database
        // $tanggal_keluar = Barang_Keluar::pluck('tanggal_keluar', 'id');

        // Filtering data berdasarkan tanggal_keluar
        $barang_keluar = Barang_Keluar::where('tanggal_keluar', $tanggal_keluar)->get();

        // Menghitung jumlah total harga
        $total_harga1 = $barang_keluar->sum('total');
        return view('laporan.lap_barang_keluar_admin', compact('barang_keluar', 'total_harga1'));
    }

    public function filterByTanggalMasuk2(Request $request)
    {

        // Validasi input tanggal
        $request->validate([
            'tanggal_masuk' => 'required',
        ]);
        $tanggal_masuk_admin = $request->get('tanggal_masuk');

        // // Ambil data tanggal_masuk yang tersedia di database
        // $tanggal_masuk = Barang_masuk::pluck('tanggal_masuk', 'id');

        // Filtering data berdasarkan tanggal_masuk
        $barang_masuk = Barang_Masuk::where('tanggal_masuk', $tanggal_masuk_admin)->get();

        // Menghitung jumlah total harga
        $total_harga2 = $barang_masuk->sum('total');
        return view('laporan.lap_barang_masuk_admin', compact('barang_masuk', 'total_harga2'));
    }

    // public function getSupplier1()
    // {
    //     $supplier1 = SupplierResource::all(); // Mengambil semua data dari tabel menggunakan model
    //     return view('perbarangan.supplier', compact('supplier1')); // Mengembalikan data ke view dengan nama 'your-view'
    // }
}
