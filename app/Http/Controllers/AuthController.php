<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('Auth.login');
    }

    public function prosesLogin(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('dashboardSupplier');
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('dashboardAdmin');
        }

        if (Auth::guard('staff')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('dashboardStaff');
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function username(){
        return 'username';
    }

    // public function logout(Request $request){
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/login');
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        
    }
    
    public function logoutAdmin(Request $request)
    {
        Auth::logout();
        Auth::guard('admin')->logout();
        return redirect('/login');
    }
    
    public function logoutStaff(Request $request)
    {
        Auth::logout();
        Auth::guard('staff')->logout();
        return redirect('/login');
    }
    
    public function logoutSupplier(Request $request)
    {
        Auth::logout();
        Auth::guard('staff')->logout();
        return redirect('/login');

    }
}
