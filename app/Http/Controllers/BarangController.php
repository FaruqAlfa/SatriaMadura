<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function getBarang()
    {
        $barang = Barang::all(); // Mengambil semua data dari tabel menggunakan model
        return view('perbarangan.barang', ['barang' => $barang]); // Mengembalikan data ke view dengan nama 'your-view'
    }
}
