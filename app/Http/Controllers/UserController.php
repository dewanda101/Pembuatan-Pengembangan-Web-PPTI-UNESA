<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Fungsi untuk registrasi
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // konfirmasi password
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data pengguna
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // hash password
            'is_admin' => true, // Set sebagai admin
        ]);

        return redirect()->route('user.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Fungsi untuk login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil
            return redirect()->intended('dashboard'); // Ganti dengan route yang sesuai
        }

        return redirect()->back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Fungsi untuk menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('admin.register'); // Ganti dengan view registrasi
    }

    // Fungsi untuk menampilkan form login
    public function showLoginForm()
    {
        return view('admin.login'); // Ganti dengan view login
    }

    // Fungsi untuk logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
}
