<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Ganti dengan nama view Anda
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika berhasil login
            return redirect()->intended('account.index'); // Ganti dengan route yang sesuai
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
