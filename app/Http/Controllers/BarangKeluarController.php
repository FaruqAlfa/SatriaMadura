<?php

namespace App\Http\Controllers;

use App\Models\Barang_Keluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $search = $request->search;
    $perPage = $request->input('per_page', 5);

    $barang_keluar = Barang_Keluar::select('barang_keluar.*', 'barang.nama_barang', 'staff.nama_staff')
        ->join('barang', 'barang.id', '=', 'barang_keluar.barang_id')
        ->join('staff', 'staff.id', '=', 'barang_keluar.staff_id')
        ->where('barang.nama_barang', 'like', "%$search%")
        ->orWhere('barang_keluar.jumlah', 'like', "%$search%")
        ->orWhere('barang_keluar.harga', 'like', "%$search%")
        ->orWhere('barang_keluar.tanggal_keluar', 'like', "%$search%")
        ->orWhere('barang_keluar.total', 'like', "%$search%")
        ->orWhere('staff.nama_staff', 'like', "%$search%")
        ->paginate($perPage);

    return view('perbarangan.barang_keluar', ['Barang_Keluar' => $barang_keluar]);
}


    /**~
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perbarangan.createBarangKeluar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'staff_id' => 'required',
            'barang_id' => 'required',
            'jumlah' => 'required',
            'tanggal_keluar' => 'required',
        ]);

        $barang_keluar = new Barang_Keluar;
        $staff_id = $request->get('staff_id');
        $barang_id = $request->get('barang_id');
        $barang_keluar->staff_id = $staff_id;
        $barang_keluar->barang_id = $barang_id;
        $barang_keluar->jumlah = $request->get('jumlah');

        $jumlah = $request->input('jumlah');
        $harga = $barang_keluar->harga = $staff_id;

        $barang = Barang::findOrFail($barang_id);
        $barang = $barang_keluar->barang ?? new Barang();
        // Periksa apakah stok mencukupi
        if ($barang->stok >= $jumlah) {
            $harga = $barang->harga;
            $total = $jumlah * $harga;
            
            // Kurangi stok
            $barang->stok = $barang->stok - $jumlah;
            $barang->save();
            
            $barang_keluar->harga = $harga;
            $barang_keluar->total = $total;
            $barang_keluar->tanggal_keluar = $request->get('tanggal_keluar');
            $barang_keluar->save();
            
            return redirect()->route('barangkeluar.index')
                ->with('success', 'Barang Keluar Berhasil Ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Stok tidak mencukupi.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang_keluar = Barang_Keluar::find($id);
        return view('perbarangan.detailBarangKeluar', compact('barang_keluar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang_keluar = Barang_Keluar::find($id);
        return view('perbarangan.editBarangKeluar', compact('barang_keluar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required',
        ]);

        $barang_keluar = Barang_Keluar::findOrFail($id);

        // $barang_masuk = Barang_Masuk::findOrFail($id);
        $barang = Barang::findOrFail($barang_keluar->barang_id);
        
        // Mengembalikan jumlah stok barang sebelumnya
    $barang->stok += $barang_keluar->jumlah;

    // Mengupdate jumlah stok barang dengan nilai baru
    $jumlah = $request->input('jumlah');

    // Periksa apakah stok mencukupi
    if ($barang->stok >= $jumlah) {
        $barang->stok -= $jumlah;
        $barang->save();

        $barang_keluar->jumlah = $jumlah;

        $harga = $barang->harga;
        $total = $jumlah * $harga;

        $barang_keluar->harga = $harga;
        $barang_keluar->total = $total;
        $barang_keluar->save();

        return redirect()->route('barangKeluar')
            ->with('success', 'Barang Keluar Berhasil Diupdate');
    } else {
        return redirect()->back()->with('error', 'Stok tidak mencukupi.');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
