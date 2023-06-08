<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang_Masuk;
use App\Models\Lap_Barang_Masuk;
use Barryvdh\DomPDF\Facade\PDF;

class LapBarangMasukController extends Controller
{
    public function index()
    {
        $barang_masuk = Barang_Masuk::all();
        return view('laporan.lap_barang_masuk', compact('barang_masuk'));
    }

    public function cetakPDF()
    {
        // $lap_barang_masuk = Lap_Barang_Masuk::with('barang_masuk')->get();

        // $pdf = new Dompdf();
        // $pdf->loadHtml(View::make('lap_barang_masuk.pdf', compact('lap_barang_masuk')));
        // $pdf->setPaper('A4', 'portrait');
        // $pdf->render();

        // return $pdf->stream('lap_barang_masuk.pdf');

        $lap_barang_masuk = Lap_Barang_Masuk::all();
 
    	$pdf = PDF::loadview('lap_barang_masuk_pdf',['lap_barang_masuk'=>$lap_barang_masuk]);
    	return $pdf->download('lap_barang_masuk_pdf');
    }
}
