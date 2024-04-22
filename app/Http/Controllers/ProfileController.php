<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfile()
    {
        // Periksa apakah pengguna telah masuk atau terotentikasi
        if(auth()->check()) {
            // Jika iya, tampilkan halaman profil
            return view('profile');
        } else {
            // Jika tidak, redirect ke halaman login
            return redirect()->route('login')->with('error', 'Anda harus masuk untuk mengakses halaman ini.');
        }
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'emergency_contact' => 'nullable|string|max:255',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Tambahkan validasi untuk gambar
        ]);

        // if ($request->hasFile('profile_picture')) {
        //     $profilePictureUrl = $request->file('profile_picture')->store('profile_pictures');

           
        //     $user->profile_picture = $profilePictureUrl;
        // }

        // Simpan perubahan profil
        $user->name = $request->name;
        $user->email = $request->email;
        $user->emergency_contact = $request->emergency_contact;
        $user->save();

        
        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
        public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}

