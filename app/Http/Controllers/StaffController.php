<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\Barang_Keluar;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $perPage = $request->input('per_page', 2);

        $staffDash = Barang_Keluar::join('barang', 'barang.id', '=', 'barang_keluar.barang_id')
            ->join('staff', 'staff.id', '=', 'barang_keluar.staff_id')
            ->where('barang.nama_barang', 'like', "%$search%")
            ->orWhere('barang_keluar.jumlah', 'like', "%$search%")
            ->orWhere('barang_keluar.harga', 'like', "%$search%")
            ->orWhere('barang_keluar.tanggal_keluar', 'like', "%$search%")
            ->orWhere('barang_keluar.total', 'like', "%$search%")
            ->orWhere('staff.nama_staff', 'like', "%$search%")
            ->paginate($perPage);
        return view('Staff.dashboardStaff', ['Staff' => $staffDash]);
    }

    public function getStaff()
    {
        $staff = Staff::all(); // Mengambil semua data dari tabel menggunakan model

        return view('Dashboard.dashboardStaff', ['staff' => $staff]); // Mengembalikan data ke view dengan nama 'your-view'
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
        $request->validate([
            'nama_staff' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        Staff::create($request->all());

        return redirect()->route('dashboardAdmin')->with('success', 'Staff Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffResource  $staffResource
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $Staff = Staff::all();
        // $posts = Staff::orderBy('id', 'DESC')->paginate(5);
        // return view('Staff.IndexStaff', compact('staff'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaffResource  $staffResource
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Staff = Staff::find($id);
        return view('staff.editStaff', compact('Staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StaffResource  $staffResource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'nama_staff' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_telepon' => 'required',
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffResource  $staffResource
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staff::find($id)->delete();
        return redirect()->route('staff.index')->with('success', 'Berhasil dihapus');
    }


    // Menambahkan Staff Dari Admin
    public function getAll()
    {
        $Staff = Staff::all();
        $posts = Staff::orderBy('id', 'DESC')->paginate(5);
        return view('Admin.EditStaff.IndexStaff', compact('Staff'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
