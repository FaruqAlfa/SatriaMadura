<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $request->validate([
        //Buat user baru
        Supplier::create([
            'name' => $request->get('name'),
            'nama_supplier' => $request->get('nama_supplier'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'no_telepon' => $request->get('no_telepon'),
        ]);

        // $user = new User; 
        // $user->username = $request->get('username');
        // $user->name = $request->get('name');
        // $user->email = $request->get('email');
        // $user->password = Hash::make($request->get('password'));
        // $user->save();

        return redirect()->route('login');
    }
}
