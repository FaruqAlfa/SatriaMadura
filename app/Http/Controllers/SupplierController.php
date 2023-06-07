<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function getSupplier(){
        $supplier = Supplier::all(); // Mengambil semua data dari tabel menggunakan model

        return view('perbarangan.supplier', ['supplier' => $supplier]); // Mengembalikan data ke view dengan nama 'your-view'
    }
}
