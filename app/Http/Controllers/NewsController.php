<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category; // Import model Category
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    // Fungsi untuk menampilkan semua berita
    public function index()
    {
        $data['news'] = News::all(); // Ambil semua berita
        return view('pages.index-news', $data); // Tampilkan di view
    }

    // Fungsi untuk menampilkan form tambah berita
    public function createNews()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('pages.news-create', compact('categories')); // Kirim data kategori ke view
    }

    // Fungsi untuk menyimpan berita baru
    public function store(Request $request)
    {
        // Validasi data
        try {
            DB::beginTransaction();
            $request->validate([
                'id' => 'nullable|uuid', // Validasi id sebagai uuid
                'title' => 'required|string|max:255',
                'content' => 'nullable|string',
                'image' => 'nullable|mimes:jpg,jpeg,png|max:1024', // Hanya jpg, jpeg, png, maksimal 1MB
                'file_upload' => 'nullable|mimes:pdf,jpg,jpeg,png,xlsx,docx|max:5120', // File upload maksimal 5MB
            ]);

            // Inisialisasi data
            $data = $request->only('title', 'content', 'category_id'); // Ambil data title, content, dan category_id
            $data['id'] = $request->id ?? Str::uuid(); // Gunakan id jika ada, jika tidak buat UUID baru

            // Proses gambar
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/image', $imageName);
                $data['image'] = $imageName;
            } else {
                $data['image'] = null; // Jika tidak ada image
            }

            // Proses file upload
            if ($request->hasFile('file_upload')) {
                $fileName = time() . '.' . $request->file_upload->extension();
                $request->file_upload->storeAs('public/file_upload', $fileName);
                $data['file_upload'] = $fileName;
            } else {
                $data['file_upload'] = null; // Jika tidak ada file upload
            }

            // Menyimpan berita baru
            News::create($data);

            DB::commit();
            return redirect()->back()->with('success', 'Berita berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Berita gagal disimpan. Error: ' . $e->getMessage());
        }
    }

    // App/Http/Controllers/NewsController.php

    public function show($id)
    {
        // Mencari berita berdasarkan ID
        $news = News::findOrFail($id);
        if ($news) {
            $news->update([
                'views' => $news->views + 1,
            ]);
        }
        // Menampilkan ke view
        return view('pages.blog', compact('news'));
    }


    // Fungsi untuk menampilkan form edit berita
    public function edit($id)
    {
        $data['news'] = News::findOrFail(decrypt($id)); // Ambil berita berdasarkan ID
        $data['category'] = Category::all(); // Ambil semua kategori
        return view('pages.edit-news', $data); // Tampilkan di view
    }

    // Fungsi untuk mengupdate berita
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Validasi input
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'nullable|string',
                'image' => 'nullable|mimes:jpg,jpeg,png|max:1024',
                'file_upload' => 'nullable|mimes:pdf,jpg,jpeg,png,xlsx,docx|max:5120',
            ]);

            // Ambil data berita berdasarkan ID
            $news = News::findOrFail($id);

            // Update data berita
            $news->update([
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'image' => $this->handleImageUpload($request, $news->image),
                'file_upload' => $this->handleFileUpload($request, $news->file_upload)
            ]);

            DB::commit();
            return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal memperbarui berita: ' . $e->getMessage());
        }
    }

    // Fungsi untuk menangani upload gambar
    private function handleImageUpload(Request $request, $oldImage)
    {
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($oldImage && Storage::exists('public/image/' . $oldImage)) {
                Storage::delete('public/image/' . $oldImage);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/image', $imageName);
            return $imageName;
        }

        return $oldImage; // Kembalikan gambar lama jika tidak ada gambar baru
    }

    // Fungsi untuk menangani upload file
    private function handleFileUpload(Request $request, $oldFile)
    {
        if ($request->hasFile('file_upload')) {
            // Hapus file lama
            if ($oldFile && Storage::exists('public/file_upload/' . $oldFile)) {
                Storage::delete('public/file_upload/' . $oldFile);
            }

            $fileName = time() . '.' . $request->file_upload->extension();
            $request->file_upload->storeAs('public/file_upload', $fileName);
            return $fileName;
        }

        return $oldFile; // Kembalikan file lama jika tidak ada file baru
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $data = News::where('id', $id)->first();
            $data->delete();  // Hapus admin
            return $data;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        // return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus.');
    }
}
