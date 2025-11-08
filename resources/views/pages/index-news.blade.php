{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-wrapper {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .btn-custom {
            font-size: 1rem;
            padding: 8px 12px;
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
        <div class="container-fluid mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Berita</h2>
                    <a href="{{ route('news.create-news') }}" class="btn btn-primary btn-custom">+ Tambah Berita</a>
                </div>
    
                <div class="table-wrapper">
                    <table class="table table-hover table-bordered w-100">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Content</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->category->category ?? '-' }}</td> <!-- Menampilkan nama kategori -->
                                    <td>{{ \Illuminate\Support\Str::limit($data->content, 50) }}</td> <!-- Membatasi konten -->
                                    <td>
                                        @if($data->image)
                                            <img src="{{ asset('storage/image/' . $data->image) }}" alt="Image" width="50">
                                        @else
                                            Tidak ada gambar
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('news.edit', Crypt::encrypt($data->id)) }}" class="btn btn-primary btn-custom mr-2">Edit</a>
                                        <button type="button" class="btn btn-danger btn-custom" onclick="verifikasiHapus('{{ Crypt::encrypt($data->id) }}')">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
     --}}
                {{--  <footer class="mt-4 text-center text-muted">
                <p>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>. All rights reserved.</p>
                <p>Version 3.2.0</p>
            </footer>  --}}
            {{-- </div>
    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                crossorigin="anonymous"></script>
            <script>
                function verifikasiHapus(id) {
                    console.log(id);


                    Swal.fire({
                        title: "Apakah anda yakin?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
    
                            $.ajax({ 
                                type: "DELETE",
                                url: "{{ URL::to('/') }}/news/" + id,
                                data: {
                                    _token: "{{ csrf_token() }}",
                                },
                                dataType: "JSON",
                                success: function(response) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                    location.reload();
                                }
                            }); 
    
                        }
                    });
                }
            </script>
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



    