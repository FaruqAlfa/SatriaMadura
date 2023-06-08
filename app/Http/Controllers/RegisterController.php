<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\Users;
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
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        //Buat user baru
        Users::create([
            'username' => $request->get('username'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        // $user = new User; 
        // $user->username = $request->get('username');
        // $user->name = $request->get('name');
        // $user->email = $request->get('email');
        // $user->password = Hash::make($request->get('password'));
        // $user->save();

        return view('auth.login');
    }
}
