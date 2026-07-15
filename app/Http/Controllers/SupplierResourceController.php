<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Barang_Masuk;
use App\Models\SupplierResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class SupplierResourceController extends Controller
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

        $dashboard_sup = Barang_Masuk::join('barang', 'barang.id', '=', 'barang_masuk.barang_id')
            ->join('supplier', 'supplier.id', '=', 'barang_masuk.supplier_id')
            ->where('barang.nama_barang', 'like', "%$search%")
            ->orWhere('barang_masuk.jumlah', 'like', "%$search%")
            ->orWhere('barang_masuk.harga', 'like', "%$search%")
            ->orWhere('barang_masuk.tanggal_masuk', 'like', "%$search%")
            ->orWhere('barang_masuk.total', 'like', "%$search%")
            ->orWhere('supplier.nama_supplier', 'like', "%$search%")
            ->paginate($perPage);
        return view('Dashboard.dashboardSupplier', ['Dashboard_Sup' => $dashboard_sup]);
    }

    public function getSupplier(Request $request)
    {
        $search = $request->search;
        $perPage = $request->input('per_page', 5);

        $supplier1 = SupplierResource::where('supplier.id', 'like', "%$search%")
            ->orWhere('supplier.name', 'like', "%$search%")
            ->orWhere('supplier.nama_supplier', 'like', "%$search%")
            ->orWhere('supplier.username', 'like', "%$search%")
            ->orWhere('supplier.email', 'like', "%$search%")
            ->orWhere('supplier.no_telepon', 'like', "%$search%")
            ->paginate($perPage);
        return view('perbarangan.supplier', compact('supplier1')); // Mengembalikan data ke view dengan nama 'your-view'
    }

    public function getSupplier2(Request $request)
    {
        $search = $request->search;
        $perPage = $request->input('per_page', 5);

        $barang_masuk_sup = Barang_Masuk::join('barang', 'barang.id', '=', 'barang_masuk.barang_id')
            ->join('supplier', 'supplier.id', '=', 'barang_masuk.supplier_id')
            ->where('barang.nama_barang', 'like', "%$search%")
            ->orWhere('barang_masuk.jumlah', 'like', "%$search%")
            ->orWhere('barang_masuk.harga', 'like', "%$search%")
            ->orWhere('barang_masuk.tanggal_masuk', 'like', "%$search%")
            ->orWhere('barang_masuk.total', 'like', "%$search%")
            ->orWhere('supplier.nama_supplier', 'like', "%$search%")
            ->paginate($perPage);
        return view('layoutsSuplier.supplierWeb', ['Barang_Masuk_Sup' => $barang_masuk_sup]); // Mengembalikan data ke view dengan nama 'your-view'
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.EditStaff.createStaff');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupplierResource  $supplierResource
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = SupplierResource::find($id);
        return view('layoutsSuplier.detailSupplier', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupplierResource  $supplierResource
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = SupplierResource::find($id);
        return view('layoutsSuplier.editSupplier', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupplierResource  $supplierResource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplier = SupplierResource::find($id);
        $supplier->username = $request->username;
        $supplier->nama_supplier = $request->nama_supplier;

        $request->validate([
            'username' => 'required',
            'nama_supplier' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk file gambar
            'email' => 'required',
            'password',
            'no_telepon' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // Menghapus gambar lama jika ada dan menggantinya dengan yang baru
            if ($supplier->image && file_exists(storage_path('app/public/' . $supplier->image))) {
                Storage::delete('public/' . $supplier->image);
            }

            $image_name = $request->file('image')->store('images', 'public');
            $supplier->image = $image_name;
        }

        if ($request->password == null) {
            $request['password'] = $supplier->password;
        } else {
            $data['password'] = Hash::make($request->password);
        }

        $data = $request->all();
        $supplier->update($data);

        return redirect()->route('dashboardSupplier')->with('success', 'supplier Berhasil Diubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupplierResource  $supplierResource
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplierResource $supplierResource)
    {
        //
    }
}
