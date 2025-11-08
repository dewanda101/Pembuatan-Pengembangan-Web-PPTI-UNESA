<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::all(); // Atau gunakan select untuk mengambil kolom tertentu saja
        return view('jabatan.index', compact('jabatans'));
    }
    

    public function create()
    {
        return view('jabatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
        ]);

        Jabatan::create([
            'id' => Str::uuid(), // UUID sebagai id
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update([
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}
