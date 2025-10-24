<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class penjualController extends Controller
{
    public function dashboard()
    {
        // Ambil data user dari session (atau pakai default)
        $defaultUser = [];

        $user = session('user', $defaultUser);

        // Kirim ke view
        return view('dashboardPenjual', compact('user'));
    }
}
