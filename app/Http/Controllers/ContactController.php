<?php

namespace App\Http\Controllers;

use App\Models\Kontak; // Pastikan model Kontak diimpor
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Menampilkan form Contact Us
    public function index()
    {
        return view('pages.contact');
    }

    // Menyimpan data ke database
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'message' => 'required|string',
    ]);

    // Simpan data ke database
    Kontak::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'message' => $request->message,
    ]);

    // Kembali ke halaman sebelumnya dengan pesan sukses
    return redirect()->back()->with('success', 'Pengaduan berhasil dikirim. Respon akan segera kami kirimkan melalui email anda.✔️');
}


    
}
