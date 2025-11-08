<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Team</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-wrapper {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .btn-custom {
            font-size: 1rem;
            padding: 8px 12px;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-5">
        <h2>Tambah Team</h2>

        <div class="table-wrapper">
        <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" id="name" name="nama" class="form-control" required>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jabatan_id" class="form-label">Jabatan:</label>
                    <select class="form-control" id="jabatan_id" name="jabatan_id" required>
                        <option value="" disabled selected>Pilih Jabatan</option>
                        @foreach ($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}" 
                                {{ isset($team) && $team->jabatan_id == $jabatan->id ? 'selected' : '' }}>
                                {{ $jabatan->jabatan }}
                            </option>
                        @endforeach
                    </select>
                    @error('jabatan_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Jabatan:</label>
                    <textarea id="description" name="deskripsi" class="form-control" rows="4" required></textarea>   <!-- atribut name sama dengan di controller $request->deskripsi -->
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror     
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Upload Foto:</label>
                    <input type="file" id="photo" name="images" class="form-control" accept=".jpg,.jpeg,.png" required>
                    @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/document/teams" class="btn btn-secondary">Kembali</a>
            </form>
        </div>

        <footer class="mt-4 text-center text-muted">
            <p>Copyright © 2014-2024 Universitas Negeri Surabaya. All rights reserved.</p>
            <p>Version 1.0.0</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
