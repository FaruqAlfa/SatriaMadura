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
            'barang_id' => 'required',
            'jumlah' => 'required',
            'tanggal_keluar' => 'required',
            ]);
        
        $barang_keluar = new Barang_keluar;
        $barang_keluar->staff_id=$request->get('staff_id');
        $barang_keluar->barang_id=$request->get('barang_id');
        $barang_keluar->jumlah=$request->get('jumlah');
        $jumlah = $request->input('jumlah');
        
        $barang=Barang::findOrFail($request->barang_id);
        $barang_keluar->harga = $barang->harga;
        $harga = $barang->harga;
        $total = $jumlah *$harga;
        $barang->stok = $barang->stok - $request->jumlah;
        $barang->save();
        $barang_keluar->total = $total;
        $barang_keluar->tanggal_keluar=$request->get('tanggal_keluar');
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
        //
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
        //
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
