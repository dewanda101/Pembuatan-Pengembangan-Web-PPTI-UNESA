<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index'); // Halaman profil pengguna
    }

    public function edit()
    {
        return view('profile.edit'); // Halaman edit profil
    }

    public function update(Request $request)
    {
        // Validasi dan logika untuk memperbarui profil pengguna
        // Implementasi penyimpanan data pengguna di sini
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('profile.index'); // Arahkan ke halaman profil setelah login berhasil
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}

