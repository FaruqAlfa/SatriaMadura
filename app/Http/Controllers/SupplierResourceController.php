<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\SupplierResource;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class SupplierResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.dashboardSupplier');
    }

    public function getStaff()
    {
        $supplier = SupplierResource::all(); // Mengambil semua data dari tabel menggunakan model

        return view('perbarangan.supplier', ['supplier' => $supplier]); // Mengembalikan data ke view dengan nama 'your-view'
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
