<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemInformasi;
use Illuminate\Support\Facades\Storage;

class SistemInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SistemInformasi::all();
        return view('sistem-informasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sistem-informasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_dokumen' => 'required|string|max:255',
            'url_sistem_informasi' => 'required|url',
            'file_upload' => 'nullable|file|mimes:pdf,jpg,jpeg,png,xlsx,docx|max:50000', // Validasi untuk file
        ]);

        // Proses upload file
        $filePath = null;
        if ($request->hasFile('file_upload')) {
            $filePath = $request->file('file_upload')->store('uploads', 'public');
        }

        SistemInformasi::create([
            'kategori_dokumen' => $validated['kategori_dokumen'],
            'url_sistem_informasi' => $validated['url_sistem_informasi'],
            'link_sistem_informasi' => $filePath, // Simpan path file ke database
        ]);

        return redirect()->route('sistem-informasi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = SistemInformasi::findOrFail($id);
        return view('sistem-informasi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori_dokumen' => 'required|string|max:255',
            'url_sistem_informasi' => 'required|url',
            'file_upload' => 'nullable|file|mimes:pdf,jpg,jpeg,png,xlsx,docx|max:50000', // Validasi untuk file
        ]);

        $data = SistemInformasi::findOrFail($id);

        // Proses upload file jika ada
        if ($request->hasFile('file_upload')) {
            // Hapus file lama jika ada
            if ($data->link_sistem_informasi) {
                Storage::disk('public')->delete($data->link_sistem_informasi);
            }

            $filePath = $request->file('file_upload')->store('uploads', 'public');
            $data->link_sistem_informasi = $filePath;
        }

        $data->kategori_dokumen = $validated['kategori_dokumen'];
        $data->url_sistem_informasi = $validated['url_sistem_informasi'];
        $data->save();

        return redirect()->route('sistem-informasi.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = SistemInformasi::findOrFail($id);

        // Hapus file jika ada
        if ($data->link_sistem_informasi) {
            Storage::disk('public')->delete($data->link_sistem_informasi);
        }

        $data->delete();

        return redirect()->route('sistem-informasi.index')->with('success', 'Data berhasil dihapus.');
    }
}
