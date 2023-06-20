<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\SupplierResource;
use Illuminate\Http\Request;

class SupplierResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supplier = SupplierResource::all();
        $search = $request->search;
        $perPage = $request->input('per_page', 5);

        $supplier = SupplierResource::where('supplier.id', 'like', "%$search%")
            ->orWhere('supplier.nama_supplier', 'like', "%$search%")
            ->orWhere('supplier.username', 'like', "%$search%")
            ->orWhere('supplier.email', 'like', "%$search%")
            ->orWhere('supplier.no_telepon', 'like', "%$search%")
            ->paginate($perPage);
        return view('perbarangan.supplier', ['Supplier' => $supplier]);
    }

    public function getSupplier()
    {
        $supplier = SupplierResource::all(); // Mengambil semua data dari tabel menggunakan model
        return view('perbarangan.supplier', compact('supplier')); // Mengembalikan data ke view dengan nama 'your-view'
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(SupplierResource $supplierResource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupplierResource  $supplierResource
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierResource $supplierResource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupplierResource  $supplierResource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupplierResource $supplierResource)
    {
        //
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
