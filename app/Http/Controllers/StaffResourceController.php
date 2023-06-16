<?php

namespace App\Http\Controllers;

use App\Models\StaffResource;
use Illuminate\Http\Request;

class StaffResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perbarangan.staff');
    }

    public function getStaff()
    {
        $staff = StaffResource::all(); // Mengambil semua data dari tabel menggunakan model

        return view('perbarangan.staff', ['staff' => $staff]); // Mengembalikan data ke view dengan nama 'your-view'
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
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
            'id' => 'required',
            'name' =>'required',
            'nama_staff' =>'required',
            'username' =>'required',
            'email' =>'required',
            'password' =>'required',
            'no_telepon' =>'required',
        ]);

        StaffResource::create($request->all());

        return redirect()->route('Staff.index')->with('success', 'Staff Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffResource  $staffResource
     * @return \Illuminate\Http\Response
     */
    public function show(StaffResource $staffResource)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaffResource  $staffResource
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffResource $staffResource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StaffResource  $staffResource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffResource $staffResource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffResource  $staffResource
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffResource $staffResource)
    {
        //
    }
}
