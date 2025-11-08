<?php

namespace App\Http\Controllers;

use App\Models\SistemInformasi;
use App\Models\UserManual;

class UserManualController extends Controller
{
    public function index()
    {
        // Ambil data dari model
        $userManuals = SistemInformasi::all();

        // Kirim data ke view
        return view('user-manual', compact('userManuals'));
    }
}
