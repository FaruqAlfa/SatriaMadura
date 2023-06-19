<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::all();

        return view('Admin.dashboardAdmin', ['Admin' => $admin]);
    }

    
}
