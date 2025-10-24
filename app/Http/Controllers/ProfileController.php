<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Default user data
    private $defaultUser = [
        'name' => 'Arif Billah',
        'email' => 'arif@gmail.com',
        'bio' => 'Pengembang Campify dan Eduvista',
        'photo' => 'farrel.jpeg'
    ];

    // metdhod untuk menyimpan data 
    public function index()
    {
        $user = session('user', $this->defaultUser);
        return view('profile', compact('user'));
    }

    // method untuk mengupdate data
    public function update(Request $request)
    {
        //request validasi
        $request->validate([
            'name' => 'required|string|max:100',
            'bio' => 'nullable|string|max:500',
            'email' => 'nullable|string|max:100',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = session('user', $this->defaultUser);
        
        if ($request->hasFile('photo')) {
            $filename = time() . '_' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('profile'), $filename);
            $user['photo'] = $filename;
        }

        $user['name'] = $request->name;
        $user['bio'] = $request->bio;
        $user['email'] = $request->email;

        session(['user' => $user]);

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
