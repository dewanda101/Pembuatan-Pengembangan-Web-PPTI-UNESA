<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    // Menampilkan daftar kontak
    public function index()
    {
        $kontaks = Kontak::all();
        return view('kontak.index', compact('kontaks'));
    }

    // Menampilkan form untuk menambah kontak
    public function create()
    {
        return view('kontak.create');
    }

    // Menyimpan kontak baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        Kontak::create($request->all());
        return redirect()->route('kontak.index')->with('success', 'Kontak berhasil disimpan.');
    }

    // Menampilkan form untuk mengedit kontak
    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('kontak.edit', compact('kontak'));
    }

    // Mengupdate data kontak
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        $kontak = Kontak::findOrFail($id);
        $kontak->update($request->all());
        return redirect()->route('kontak.index')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    // Menghapus kontak
    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();
        return redirect()->route('kontak.index')->with('success', 'Pengaduan berhasil dihapus.');
    }

    public function showContactForm()
{
    // Ambil data kontak dari database
    $kontaks = Kontak::all();

    // Kirim data ke view "contact"
    return view('pages.contact', compact('kontaks'));


}


}
