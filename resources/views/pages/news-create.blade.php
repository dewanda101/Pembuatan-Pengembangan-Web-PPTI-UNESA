<!-- resources/views/pages/news-create.blade.php -->
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .form-label {
            font-weight: bold;
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body> --}}
{{-- @extends('layout.master')
@section('header')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            </div><!-- /.container-fluid -->
        </div>
    @endsection

    @section('content')
        <div class="container">
            <h1 class="mb-4 text-center">Tambah Berita</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Konten (Opsional)</label>
                    <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Judul</label>
                    <input type="file" class="form-control" id="image" name="image" accept=".jpg,.jpeg,.png">
                </div>

                <div class="mb-3">
                    <label for="file_upload" class="form-label">File Upload Berita</label>
                    <input type="file" class="form-control" id="file_upload" name="file_upload"
                        accept=".pdf,.jpg,.jpeg,.png">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Berita</button>
                <a href="/news" class="btn btn-secondary">Kembali</a>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @endsection --}}
    {{-- </body>
</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Master Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
  </head>
  <body class="bg-white text-black font-sans">
    <header class="flex items-center justify-between px-6 py-3 border-b border-gray-300 text-sm">
      <div class="flex items-center space-x-4">
        <span class="font-normal">Laravel</span>
        <span class="font-semibold">Master Category</span>
        <span class="font-normal">Master Item</span>
        <span class="font-normal">Cashier</span>
      </div>
      <div class="text-xs text-gray-600">mukhamad syaifullah <span>▾</span></div>
    </header>
  
    <main class="flex flex-col md:flex-row gap-6 p-6">
      <section class="flex-1 border border-gray-300 rounded-md">
        <h2 class="px-4 py-2 border-b border-gray-300 font-normal text-sm">Master Category</h2>
        <table class="w-full text-sm border-collapse">
          <thead class="bg-gray-100">
            <tr>
              <th class="border border-gray-300 px-3 py-2 text-left font-normal">#</th>
              <th class="border border-gray-300 px-3 py-2 text-left font-normal">Nama Kategori</th>
              <th class="border border-gray-300 px-3 py-2 text-left font-normal">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-gray-50">
              <td class="border border-gray-300 px-3 py-2">1</td>
              <td class="border border-gray-300 px-3 py-2">Foods</td>
              <td class="border border-gray-300 px-3 py-2 space-x-2">
                <button class="bg-yellow-400 text-white text-xs px-2 py-1 rounded">Edit</button>
                <button class="bg-red-600 text-white text-xs px-2 py-1 rounded">Hapus</button>
              </td>
            </tr>
            <tr>
              <td class="border border-gray-300 px-3 py-2">2</td>
              <td class="border border-gray-300 px-3 py-2">Drinks</td>
              <td class="border border-gray-300 px-3 py-2 space-x-2">
                <button class="bg-yellow-400 text-white text-xs px-2 py-1 rounded">Edit</button>
                <button class="bg-red-600 text-white text-xs px-2 py-1 rounded">Hapus</button>
              </td>
            </tr>
            <tr class="bg-gray-50">
              <td class="border border-gray-300 px-3 py-2">3</td>
              <td class="border border-gray-300 px-3 py-2">Service</td>
              <td class="border border-gray-300 px-3 py-2 space-x-2">
                <button class="bg-yellow-400 text-white text-xs px-2 py-1 rounded">Edit</button>
                <button class="bg-red-600 text-white text-xs px-2 py-1 rounded">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>
  
      <section class="w-full max-w-xs border border-gray-300 rounded-md p-4">
        <h3 class="text-sm font-normal mb-2">Add Category</h3>
        <label for="namaKategori" class="block text-xs mb-1">Nama Kategori</label>
        <input
          id="namaKategori"
          type="text"
          class="w-full border border-gray-300 rounded px-2 py-1 mb-3 text-sm"
        />
        <div class="flex space-x-2">
          <button class="bg-green-700 text-white text-xs px-3 py-1 rounded">Tambah</button>
          <button class="bg-red-600 text-white text-xs px-3 py-1 rounded">Reset</button>
        </div>
      </section>
    </main>
  </body>
</html>