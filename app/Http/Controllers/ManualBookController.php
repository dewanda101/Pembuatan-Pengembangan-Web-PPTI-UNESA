<?php

namespace App\Http\Controllers;

use App\Models\Manualbook;
use Illuminate\Http\Request;

class ManualbookController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $manualbooks = Manualbook::all();
        return view('manualbook.manualbook', compact('manualbooks'));
    }

    // Membuat data baru
    public function create()
    {
        return view('manualbook.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori_dokumen' => 'required|string|max:255',
            'url_sistem_informasi' => 'required|url',
            'link_sistem_informasi' => 'required|url',
        ]);

        Manualbook::create($request->all());

        return redirect()->route('manualbook.index')->with('success', 'Manualbook berhasil ditambahkan.');
    }

    // Menampilkan data tertentu
    public function show(Manualbook $manualbook)
    {
        return view('manualbook.show', compact('manualbook'));
    }

    // Mengedit data
    public function edit(Manualbook $manualbook)
    {
        return view('manualbook.edit', compact('manualbook'));
    }

    // Memperbarui data
    public function update(Request $request, Manualbook $manualbook)
    {
        $request->validate([
            'kategori_dokumen' => 'required|string|max:255',
            'url_sistem_informasi' => 'required|url',
            'link_sistem_informasi' => 'required|url',
        ]);

        $manualbook->update($request->all());

        return redirect()->route('manualbook.index')->with('success', 'Manualbook berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy(Manualbook $manualbook)
    {
        $manualbook->delete();

        return redirect()->route('manualbook.index')->with('success', 'Manualbook berhasil dihapus.');
    }
}
