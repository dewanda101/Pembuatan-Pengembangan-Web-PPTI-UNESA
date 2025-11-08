<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiMisi;
use Illuminate\Support\Str;

class VisiMisiController extends Controller
{
    public function index()
    {
        $items = VisiMisi::all();
        return view('visi_misi.index', compact('items'));
    }

    public function create()
    {
        return view('visi_misi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable',
        ]);

        VisiMisi::create([
            'id' => Str::uuid(), // Membuat UUID otomatis
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $item = VisiMisi::findOrFail($id);
        return view('visi_misi.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable',
        ]);

        $item = VisiMisi::findOrFail($id);
        $item->update($request->only(['nama', 'deskripsi']));

        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = VisiMisi::findOrFail($id);
        $item->delete();

        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil dihapus!');
    }
}
