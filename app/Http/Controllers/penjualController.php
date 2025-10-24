<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class penjualController extends Controller
{
    public function dashboard()
    {
        // Ambil data user dari session (atau pakai default)
        $defaultUser = [
            'name' => 'Arif Rahman',
            'email' => 'arif@example.com',
            'bio' => 'Dosen IT dan pengembang EduVista',
            'nomor_telepon' => '081234567890',
            'photo' => 'avatar.jpeg'
        ];

        $user = session('user', $defaultUser);

        // Kirim ke view
        return view('dashboardPenjual', compact('user'));
    }
}
