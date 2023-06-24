<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

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
    
        if ($search) {
            $Staff = Staff::where('name', 'like', "%$search%")
                ->orWhere('nama_staff', 'like', "%$search%")
                ->orWhere('username', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('no_telepon', 'like', "%$search%")
                ->paginate(5);
        } else {
            $Staff = Staff::orderBy('id', 'DESC')->paginate(5);
        }
    
        return view('Admin.EditStaff.indexStaff', compact('Staff'));
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
            'nama_staff' =>'required',
            'username' =>'required',
            'password' =>'required',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request -> password);

        Staff::create($data);

        return redirect()->route('staffAll')->with('success', 'Staff Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffResource  $staffResource
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $Staff = Staff::find($request->id);
        // return view('Staff.detailStaff', compact('Staff'));
        $Staff = Staff::find($id);
        // return dd($Staff);
        return view('Staff.detailStaff', compact('Staff'));

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
        $staff = Staff::find($id); 
        $staff->username = $request->username;
        $staff->nama_staff = $request->nama_staff;
    
        $request->validate([
            'username' => 'required',
            'nama_staff' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk file gambar
            'email' => 'required',
            'password',
            'no_telepon' => 'required',
        ]);
    
        if ($request->hasFile('image')) {
            // Menghapus gambar lama jika ada dan menggantinya dengan yang baru
            if ($staff->image && file_exists(storage_path('app/public/' . $staff->image))) {
                Storage::delete('public/' . $staff->image);
            }
    
            $image_name = $request->file('image')->store('images', 'public');
            $staff->image = $image_name;
        }
    
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $staff->update($data);
    
        return redirect()->route('dashboardStaff')->with('success', 'Staff Berhasil Diubah');
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

        // return redirect()->view('Admin.EditStaff.indexStaff')->with('success', 'Berhasil dihapus');
        return redirect()->route('staffAll')->with('success', 'Berhasil dihapus');
    }


    // Menambahkan Staff Dari Admin
    // public function getAll(){
    //     $Staff = Staff::orderBy('id', 'DESC')->paginate(1);
    //     // $posts = Staff::orderBy('id', 'DESC');
    //     return view('Admin.EditStaff.IndexStaff', compact('Staff'));
    // }

}
