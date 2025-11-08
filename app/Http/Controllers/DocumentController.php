<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class DocumentController extends Controller
{
    public function index()
    {

        $direktur = Team::with('jabatan')->where('jabatan_id', '9c4fed86-a61c-11ef-b4ca-b05cdaee806e')->get();
        $KepalaSub = Team::with('jabatan')->where('jabatan_id', 'c8777c91-a6e7-11ef-b0f9-b05cdaee806e')->get();
        $Kepaladivisi = Team::with('jabatan')->where('jabatan_id', 'a0b8e3c2-a61e-11ef-b4ca-b05cdaee806e')->get();
        $staff = Team::with('jabatan')->where('jabatan_id', '70f003b0-0e99-4e11-82ed-21ed60a1aa0a')->get();
        // return $KepalaSub;
        return view('team.document', compact('direktur', 'KepalaSub', 'Kepaladivisi', 'staff'));
    }

    public function indexTeams()
    {
        $teams = Team::with('jabatan')->get(); // Memuat relasi dengan jabatan
        return view('team.index', compact('teams'));
    }

    public function create()
    {
        $jabatans = Jabatan::all(); // Mengambil semua data jabatan
        return view('team.create', compact('jabatans'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            // Validasi data
            $request->validate([
                'nama' => 'required|string|max:255',
                'jabatan_id' => 'required|exists:jabatan,id',
                'deskripsi' => 'nullable|string',
                'images' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // dd($request->all());

            // Menyimpan data tim
            if ($request->id) {
                $getTeams = Team::findOrFail($request->id);
                $isTeams = false;
            } else {
                $getTeams = null;
                $isTeams = true;
            }

            if ($request->hasFile('images')) {
                $imageName = $request->images->getClientOriginalName();
                $request->images->storeAs('public/image', $imageName);
                $images = $imageName;
            } else {
                $images = $isTeams ? null : $getTeams->images; // Jika tidak ada image
            }

            $team = Team::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'id' => Str::uuid(),
                    'nama' => $request->nama,
                    'jabatan_id' => $request->jabatan_id, // Menyimpan jabatan_id
                    'deskripsi' => $request->deskripsi,
                    'images' => $images,
                    'status' => 1,
                ]
            );

            DB::commit();
            return redirect()->route('document.indexTeams')->with('success', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Data gagal ditambahkan. ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $id = decrypt($id);
        $team = Team::findOrFail($id);
        $jabatans = Jabatan::all(); // Mengambil semua data jabatan
        return view('team.edit', compact('team', 'jabatans'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatan,id',
            'deskripsi' => 'nullable|string',
            'images' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Memperbarui data tim
        $team = Team::findOrFail($id);
        $team->nama = $request->nama;
        $team->jabatan_id = $request->jabatan_id; // Menyimpan jabatan_id
        $team->deskripsi = $request->deskripsi;

        if ($request->hasFile('images')) {
            $team->photo = $request->file('images')->store('images', 'public');
        }

        $team->save();

        return redirect()->route('document.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            $team = Team::findOrFail($id);
            $team->delete();

            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data gagal dihapus.']);
        }
    }
}
