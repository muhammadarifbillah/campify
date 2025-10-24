<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $users = [
        ['username' => 'admin', 'password' => '123456'],
        ['username' => 'farrel', 'password' => 'campify'],
    ];

    public function showLogin()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        foreach ($this->users as $user) {
            if ($user['username'] === $request->username && $user['password'] === $request->password) {
                session(['username' => $user['username']]);
                // arahkan ke halaman produk (search)
                return redirect()->route('dashboardPenjual');
            }
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:5'
        ]);

        // karena hanya simulasi (tanpa database)
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function dashboard()
    {
        if (!session('username')) {
            return redirect()->route('login');
        }

        return view('dashboard', ['username' => session('username')]);
    }
}
