<?php

namespace App\Http\Controllers;

use App\Models\Barang_Masuk;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
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
    
        $barang_masuk = Barang_Masuk::select('barang_masuk.*', 'barang.nama_barang', 'supplier.nama_supplier')
            ->join('barang', 'barang.id', '=', 'barang_masuk.barang_id')
            ->join('supplier', 'supplier.id', '=', 'barang_masuk.supplier_id')
            ->where('barang.nama_barang', 'like', "%$search%")
            ->orWhere('barang_masuk.jumlah', 'like', "%$search%")
            ->orWhere('barang_masuk.harga', 'like', "%$search%")
            ->orWhere('barang_masuk.tanggal_masuk', 'like', "%$search%")
            ->orWhere('barang_masuk.total', 'like', "%$search%")
            ->orWhere('supplier.nama_supplier', 'like', "%$search%")
            ->paginate($perPage);
    
        // dd($barang_masuk);
        return view('perbarangan.barang_masuk', ['Barang_Masuk' => $barang_masuk]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perbarangan.createBarangMasuk');
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
            'barang_id' => 'required',
            'jumlah' => 'required',
            'tanggal_masuk' => 'required',
        ]);

        $barang_masuk = new Barang_Masuk;
        $supplier_id = $request->get('barang_id');
        $barang_masuk->supplier_id = $supplier_id;
        $barang_masuk->barang_id = $supplier_id;
        $barang_masuk->jumlah = $request->get('jumlah');

        $jumlah = $request->input('jumlah');
        $harga = $barang_masuk->harga = $supplier_id;

        $barang = Barang::findOrFail($supplier_id);
        $barang = $barang_masuk->barang ?? new Barang();
        $barang_masuk->harga = $barang->harga;
        $harga = $barang->harga;
        $total = $jumlah * $harga;
        $barang->stok = $barang->stok + $request->jumlah;
        $barang->save();
        $barang_masuk->total = $total;
        $barang_masuk->tanggal_masuk = $request->get('tanggal_masuk');
        $barang_masuk->save();


        return redirect()->route('barangMasukSup')
            ->with('success', 'Barang Masuk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang_masuk = Barang_Masuk::find($id);
        return view('perbarangan.detailBarangMasuk', compact('barang_masuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang_masuk = Barang_Masuk::find($id);
        return view('perbarangan.editBarangMasuk', compact('barang_masuk'));
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

        $barang_masuk = Barang_Masuk::findOrFail($id);

        // $barang_masuk = Barang_Masuk::findOrFail($id);
        $barang = Barang::findOrFail($barang_masuk->barang_id);

        // Mengembalikan jumlah stok barang sebelumnya
        $barang->stok = $barang->stok - $barang_masuk->jumlah;

        $barang_masuk->jumlah = $request->get('jumlah');
        $barang_masuk->save();
        // Mengupdate jumlah stok barang dengan nilai baru
        $barang->stok = $barang->stok + $request->jumlah;
        $barang->save();

        $barang_masuk->harga = $barang->harga;
        $harga = $barang->harga;
        $total = $request->jumlah * $harga;

        $barang_masuk->total = $total;
        $barang_masuk->jumlah = $request->get('jumlah');
        $barang_masuk->save();


        return redirect()->route('barangMasukSup')
            ->with('success', 'Barang Masuk Berhasil Ditambahkan');
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
