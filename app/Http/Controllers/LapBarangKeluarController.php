<?php

namespace App\Http\Controllers;

use App\Models\Barang_Keluar;
use App\Models\Lap_Barang_Keluar;
use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;

class LapBarangKeluarController extends Controller
{
    public function index()
    {
        $barang_keluar = Barang_Keluar::all();
        $total_harga = $barang_keluar->sum('total');
        return view('laporan.lap_barang_keluar', compact('barang_keluar', 'total_harga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'staff_id' => 'required',
            'jumlah' => 'required',
            'tanggal_keluar' => 'required',
        ]);

        $lap_barang_keluar = new Barang_Keluar;
        $staff_id = $request->get('staff_id');
        $lap_barang_keluar->staff_id = $staff_id;
        $lap_barang_keluar->barang_id = $staff_id;
        $lap_barang_keluar->jumlah = $request->get('jumlah');

        $jumlah = $request->input('jumlah');
        $harga = $lap_barang_keluar->harga = $staff_id;

        $barang = Barang::findOrFail($staff_id);
        $barang = $lap_barang_keluar->barang ?? new Barang();
        $lap_barang_keluar->harga = $barang->harga;
        $harga = $barang->harga;
        $total = $jumlah * $harga;
        $barang->stok = $barang->stok + $request->jumlah;
        $barang->save();
        $lap_barang_keluar->total = $total;
        $lap_barang_keluar->tanggal_keluar = $request->get('tanggal_keluar');
        $lap_barang_keluar->save();


        return redirect()->route('barangkeluar.index')
            ->with('success', 'Barang keluar Berhasil Ditambahkan');
    }

    public function cetakPDF1(Request $request)
    {
        $tanggal_keluar = $request->get('tanggal_keluar');
        $lap_barang_keluar = Barang_Keluar::where('tanggal_keluar', $request->get('tanggal_keluar'))->get();

        $pdf = PDF::loadview('laporan.lap_barang_keluar_pdf', ['lap_barang_keluar' => $lap_barang_keluar]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }

    public function cetakPDF1All()
    {
        $lap_barang_keluar = Barang_Keluar::all();

        $pdf = PDF::loadview('laporan.lap_barang_keluar_pdf', ['lap_barang_keluar' => $lap_barang_keluar]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }

    public function filterByTanggalKeluar(Request $request)
    {
        // Validasi input tanggal
        $request->validate([
            'tanggal_keluar' => 'required',
        ]);
        $tanggal_keluar = $request->get('tanggal_keluar');
       
        // Filtering data berdasarkan tanggal_keluar
        $barang_keluar = Barang_Keluar::where('tanggal_keluar', $tanggal_keluar)->get();

        // Menghitung jumlah total harga
        $total_harga = $barang_keluar->sum('total');
        return view('laporan.lap_barang_keluar', compact('barang_keluar', 'total_harga'));
    }
}
