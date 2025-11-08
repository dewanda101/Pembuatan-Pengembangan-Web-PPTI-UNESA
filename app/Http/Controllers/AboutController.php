<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi; // Import model VisiMisi
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Ambil semua data Visi Misi
        $visiMisi = VisiMisi::all(); // Pastikan Anda sudah membuat model VisiMisi

        // Kirim data Visi Misi ke view 'about'
        return view('pages.about', compact('visiMisi'));
    }
}
