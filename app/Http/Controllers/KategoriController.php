<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Category::all(); // Ambil semua data kategori dari database
        return view('kategori.index', compact('data')); // Tampilkan view dengan data kategori
    }

    public function create()
    {
        return view('kategori.create'); // Tampilkan form untuk tambah kategori
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        Category::insert([
            'id' => Str::uuid(),
            'category' => $request->category
        ]); // Simpan kategori ke database
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function destroy($id)
    {
       
        $id = Crypt::decrypt($id);
        Category::findOrFail($id)->delete(); // Hapus kategori
        return true;
    }
    
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $category = Category::findOrFail($id);  // Cari admin berdasarkan ID
        return view('kategori.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // Update data admin
        $category->update([
            'category' => $request->category,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Admin berhasil diperbarui.');
    }
}
