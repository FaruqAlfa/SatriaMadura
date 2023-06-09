<?php

namespace App\Http\Controllers;

use App\Models\Barang_Keluar;
use App\Models\Lap_Barang_Keluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF as DomPDF;

class LapBarangKeluarController extends Controller
{
    public function index()
    {
        $barang_keluar = Barang_Keluar::all();
        return view('laporan.lap_barang_keluar', compact('barang_keluar'));
    }

    public function cetakPDF()
    {
        // $lap_barang_keluar = Lap_Barang_Keluar::with('barang_keluar')->get();

        // $pdf = new Dompdf();
        // $pdf->loadHtml(View::make('lap_barang_keluar.pdf', compact('lap_barang_keluar')));
        // $pdf->setPaper('A4', 'portrait');
        // $pdf->render();

        // return $pdf->stream('lap_barang_keluar.pdf');

        $lap_barang_keluar = Lap_Barang_Keluar::all();
 
    	// $pdf = PDF::loadView('lap_barang_keluar_pdf',['lap_barang_keluar'=>$lap_barang_keluar]);
        $pdf = DomPDF::loadView('lap_barang_keluar_pdf',['lap_Barangkeluar'=>$lap_barang_keluar]);
    	return $pdf->download('lap_barang_keluar_pdf');
    }
}
