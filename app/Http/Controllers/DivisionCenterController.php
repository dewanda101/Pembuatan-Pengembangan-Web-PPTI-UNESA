<?php

namespace App\Http\Controllers;

use App\Models\DivisionCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class DivisionCenterController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel division_centers
        $division = DivisionCenter::all();
        return view('division-center.index', compact('division'));
    }

    public function create()
    {
        return view('division-center.created');
    }

    public function store(Request $request)
    { 
       
        // Simpan data ke database
        $divisi = DivisionCenter::create([
            'id' => Str::uuid(),
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('division-center.index')->with('success', 'Division Center berhasil ditambahkan');
    }
    

    public function edit($id)
    {
        $data['divisionCenter'] = DivisionCenter::findOrFail(decrypt($id)); // Ambil berita berdasarkan ID
        return view('division-center.edit', $data);
    }

    public function update(Request $request, DivisionCenter $divisionCenter)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        // Update data
        $divisionCenter->update($validated);
        return redirect()->route('division-center.index')->with('success', 'Division Center berhasil diperbarui');
    }

    public function destroy(DivisionCenter $divisionCenter)
    {
        $divisionCenter->delete();
        return redirect()->route('division-center.index')->with('success', 'Division Center berhasil dihapus');
    }
}
