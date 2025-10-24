<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $defaultUser = [
        'name' => 'Arif Rahman',
        'email' => 'arif@example.com',
        'bio' => 'Dosen IT dan pengembang EduVista',
        'photo' => 'farrel.jpeg'
    ];

    public function index()
    {
        $user = session('user', $this->defaultUser);
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'bio' => 'nullable|string|max:500',
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

        session(['user' => $user]);

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
