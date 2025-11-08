<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();  // Ambil semua data admin
        return view('admin.index', compact('users'));  // Kirim ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');  // Tampilkan form untuk membuat admin baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Simpan admin baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),  // Enkripsi password
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Metode ini bisa diisi jika kamu ingin menampilkan detail admin
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $admin = User::findOrFail($id);  // Cari admin berdasarkan ID
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $admin = \App\Models\User::findOrFail($id);

        // Update data admin
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {            
            $id = Crypt::decrypt($id);
            $admin = User::where('id', $id)->first();
            $admin->delete();  // Hapus admin
            return $admin;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        // return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus.');
    }
}
