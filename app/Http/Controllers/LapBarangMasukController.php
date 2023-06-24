<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang_Masuk;
use App\Models\Barang;
use App\Models\Lap_Barang_Masuk;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;

class LapBarangMasukController extends Controller
{
    public function index()
    {
        $barang_masuk = Barang_Masuk::with('supplier')->get();
        // Menghitung jumlah total harga
        $total_harga = $barang_masuk->sum('total');
        return view('laporan.lap_barang_masuk', compact('barang_masuk', 'total_harga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'jumlah' => 'required',
            'tanggal_masuk' => 'required',
        ]);

        $lap_barang_masuk = new Barang_Masuk;
        $supplier_id = $request->get('supplier_id');
        $lap_barang_masuk->supplier_id = $supplier_id;
        $lap_barang_masuk->barang_id = $supplier_id;
        $lap_barang_masuk->jumlah = $request->get('jumlah');

        $jumlah = $request->input('jumlah');
        $harga = $lap_barang_masuk->harga = $supplier_id;

        $barang = Barang::findOrFail($supplier_id);
        $barang = $lap_barang_masuk->barang ?? new Barang();
        $lap_barang_masuk->harga = $barang->harga;
        $harga = $barang->harga;
        $total = $jumlah * $harga;
        $barang->stok = $barang->stok + $request->jumlah;
        $barang->save();
        $lap_barang_masuk->total = $total;
        $lap_barang_masuk->tanggal_masuk = $request->get('tanggal_masuk');
        $lap_barang_masuk->save();


        return redirect()->route('barangmasuk.index')
            ->with('success', 'Barang masuk Berhasil Ditambahkan');
    }

    public function cetakPDF2(Request $request)
    {
        $lap_barang_masuk = Barang_Masuk::where('tanggal_masuk', $request->input('tanggal_masuk'))->get();

        // $a = $request->input('tanggal_masuk');
        // echo "<script>coxnsole.log($a)</script>";

        $pdf = PDF::loadview('laporan.lap_barang_masuk_pdf', ['lap_barang_masuk' => $lap_barang_masuk]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }

    public function cetakPDF2All()
    {
        $lap_barang_masuk = Barang_Masuk::all();

        $pdf = PDF::loadview('laporan.lap_barang_masuk_pdf', ['lap_barang_masuk' => $lap_barang_masuk]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }

    public function filterByTanggalMasuk(Request $request)
    {

        // Validasi input tanggal
        $request->validate([
            'tanggal_masuk' => 'required',
        ]);
        $tanggal_masuk = $request->get('tanggal_masuk');

        // // Ambil data tanggal_masuk yang tersedia di database
        // $tanggal_masuk = Barang_masuk::pluck('tanggal_masuk', 'id');

        // Filtering data berdasarkan tanggal_masuk
        $barang_masuk = Barang_Masuk::where('tanggal_masuk', $tanggal_masuk)->get();

        // Menghitung jumlah total harga
        $total_harga = $barang_masuk->sum('total');
        return view('laporan.lap_barang_masuk', compact('barang_masuk', 'total_harga', 'tanggal_masuk'));
    }
}
