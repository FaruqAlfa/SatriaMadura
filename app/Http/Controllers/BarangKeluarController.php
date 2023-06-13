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
    public function index()
    {
        $barang_keluar = Barang_Keluar::all();
        return view('perbarangan.barang_keluar', ['Barang_Keluar' => $barang_keluar]);

        if (request('search')) {
            $barang_keluar = Barang_Keluar::where('id', 'LIKE', '%' . request('search') . '%')
                ->orWhere('staff_id', 'LIKE', '%' . request('search') . '%')
                ->orWhere('jumlah', 'LIKE', '%' . request('search') . '%')
                ->orWhere('total', 'LIKE', '%' . request('search') . '%')
                ->orWhereHas('barang_keluar', function ($query) {
                    $query->where('tanggal_keluar', 'like', '%' . request('search') . '%');
                })->with('barang_keluar')
                ->paginate(5);

            return view('perbarangan.barang-masuk', ['paginate' => $barang_keluar]);
        } else {
            $barang_keluar = Barang_Keluar::with('barang_keluar')->get(); // Mengambil semua isi tabel
            $paginate = Barang_Keluar::orderBy('id', 'asc')->Paginate(5);
            return view('perbarangan.barang_keluar', ['barang_keluar' => $barang_keluar, 'paginate' => $paginate]);
        }
    }

    /**
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
            'jumlah' => 'required',
            'tanggal_keluar' => 'required',
        ]);

        $barang_keluar = new Barang_Keluar;
        $staff_id = $request->get('staff_id');
        $barang_keluar->staff_id = $staff_id;
        $barang_keluar->barang_id = $staff_id;
        $barang_keluar->jumlah = $request->get('jumlah');

        $jumlah = $request->input('jumlah');
        $harga = $barang_keluar->harga = $staff_id;

        $barang = Barang::findOrFail($staff_id);
        $barang = $barang_keluar->barang ?? new Barang();
        $barang_keluar->harga = $barang->harga;
        $harga = $barang->harga;
        $total = $jumlah * $harga;
        $barang->stok = $barang->stok + $request->jumlah;
        $barang->save();
        $barang_keluar->total = $total;
        $barang_keluar->tanggal_keluar = $request->get('tanggal_keluar');
        $barang_keluar->save();

        return redirect()->route('barangkeluar.index')
            ->with('success', 'Barang Keluar Berhasil Ditambahkan');
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

        // $barang_keluar = barang_keluar::findOrFail($id);
        $barang = Barang::findOrFail($barang_keluar->barang_id);

        // Mengembalikan jumlah stok barang sebelumnya
        $barang->stok = $barang->stok + $barang_keluar->jumlah;

        $barang_keluar->jumlah = $request->get('jumlah');
        $barang_keluar->save();
        // Mengupdate jumlah stok barang dengan nilai baru
        $barang->stok = $barang->stok - $request->jumlah;
        $barang->save();

        $barang_keluar->harga = $barang->harga;
        $harga = $barang->harga;
        $total = $request->jumlah * $harga;

        $barang_keluar->total = $total;
        $barang_keluar->jumlah = $request->get('jumlah');
        $barang_keluar->save();


        return redirect()->route('barangkeluar.index')
            ->with('success', 'Barang Keluar Berhasil Ditambahkan');
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
