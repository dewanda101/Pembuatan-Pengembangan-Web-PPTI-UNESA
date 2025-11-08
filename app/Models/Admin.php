<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
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
        $admin = Admin::findOrFail($id);  // Cari admin berdasarkan ID
        return view('admin.edit', compact('admin'));
    }

}
