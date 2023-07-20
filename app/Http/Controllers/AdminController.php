<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Barang_Keluar;
use App\Models\Barang_Masuk;
use App\Models\SupplierResource;
use App\Models\Lap_Barang_Masuk;


class AdminController extends Controller
{
    // public function index()
    // {
    //     $admin = Admin::all();
    //     return view('Admin.dashboardAdmin', ['Admin' => $admin]);
    // }

    public function dashboard()
    {
        return view('admin.dashboardAdmin');
    }

    public function getAdmin1(Request $request)
    {
        $barang_keluar1 = Barang_Keluar::all();
        $total_harga1 = $barang_keluar1->sum('total');
        // Menghitung jumlah total harga
        $search = $request->search;
        $perPage = $request->input('per_page', 5);

        $barang_keluar1 = Barang_Keluar::join('barang', 'barang.id', '=', 'barang_keluar.barang_id')
            ->join('staff', 'staff.id', '=', 'barang_keluar.staff_id')
            ->where('barang.nama_barang', 'like', "%$search%")
            ->orWhere('barang_keluar.jumlah', 'like', "%$search%")
            ->orWhere('barang_keluar.harga', 'like', "%$search%")
            ->orWhere('barang_keluar.tanggal_keluar', 'like', "%$search%")
            ->orWhere('barang_keluar.total', 'like', "%$search%")
            ->orWhere('staff.nama_staff', 'like', "%$search%")
            ->paginate($perPage);
        return view('perbarangan.barang_keluar_admin', compact('barang_keluar1', 'total_harga1'));
    }

    public function getLapAdmin1()
    {
        $barang_keluar2 = Barang_Keluar::all();
        // Menghitung jumlah total harga
        $total_harga2 = $barang_keluar2->sum('total');
        return view('laporan.lap_barang_keluar_admin', compact('barang_keluar2', 'total_harga2'));
    }

    public function getAdmin2(Request $request)
    {
        $barang_masuk1 = Barang_Masuk::all();
        // Menghitung jumlah total harga
        $total_harga3 = $barang_masuk1->sum('total');

        $search = $request->search;
        $perPage = $request->input('per_page', 5);

        $barang_masuk1 = Barang_Masuk::join('barang', 'barang.id', '=', 'barang_masuk.barang_id')
            ->join('supplier', 'supplier.id', '=', 'barang_masuk.supplier_id')
            ->where('barang.nama_barang', 'like', "%$search%")
            ->orWhere('barang_masuk.jumlah', 'like', "%$search%")
            ->orWhere('barang_masuk.harga', 'like', "%$search%")
            ->orWhere('barang_masuk.tanggal_masuk', 'like', "%$search%")
            ->orWhere('barang_masuk.total', 'like', "%$search%")
            ->orWhere('supplier.nama_supplier', 'like', "%$search%")
            ->paginate($perPage);
        return view('perbarangan.barang_masuk_admin', compact('barang_masuk1', 'total_harga3'));
    }

    public function getLapAdmin2()
    {
        $barang_masuk2 = Barang_Masuk::all();
        // Menghitung jumlah total harga
        $total_harga4 = $barang_masuk2->sum('total');
        return view('laporan.lap_barang_masuk_admin', compact('barang_masuk2', 'total_harga4'));
    }

    public function filterByTanggalKeluar2(Request $request)
    {
        // Validasi input tanggal
        $request->validate([
            'tanggal_keluar' => 'required',
        ]);
        $tanggal_keluar_admin = $request->get('tanggal_keluar');

        // Filtering data berdasarkan tanggal_keluar
        $barang_keluar = Barang_Keluar::where('tanggal_keluar', $tanggal_keluar_admin)->get();

        // Menghitung jumlah total harga
        $total_harga1 = $barang_keluar->sum('total');
        return view('laporan.lap_barang_keluar_admin', compact('barang_keluar', 'total_harga1', 'tanggal_keluar_admin'));
    }

    public function filterByTanggalMasuk2(Request $request)
    {
        // Validasi input tanggal
        $request->validate([
            'tanggal_masuk' => 'required',
        ]);
        $tanggal_masuk_admin = $request->get('tanggal_masuk');

        // Filtering data berdasarkan tanggal_masuk
        $barang_masuk = Barang_Masuk::where('tanggal_masuk', $tanggal_masuk_admin)->get();

        // Menghitung jumlah total harga
        $total_harga2 = $barang_masuk->sum('total');
        return view('laporan.lap_barang_masuk_admin', compact('barang_masuk', 'total_harga2', 'tanggal_masuk_admin'));
    }

    public function grafikLapBarangMasuk()
    {
        $lapBarangMasuk = Lap_Barang_Masuk::all();

        $labels = $lapBarangMasuk->pluck('tanggal_masuk');
        $data = $lapBarangMasuk->pluck('jumlah');

        return view('dashboardAdmin', compact('labels', 'data'));
    }
}
