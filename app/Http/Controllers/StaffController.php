<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function getStaff()
    {
        $staff = Staff::all(); // Mengambil semua data dari tabel menggunakan model

        return view('perbarangan.staff', ['staff' => $staff]); // Mengembalikan data ke view dengan nama 'your-view'
    }
}
