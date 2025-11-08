<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Division Center</title>
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
        <h2>Tambah Division Center</h2>

        <div class="table-wrapper">
            <form action="{{ route('division-center.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="judul_id" class="form-label">Judul:</label>
                    <input type="text" id="judul_id" name="nama" class="form-control" required>
                    @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" required></textarea>
                    @error('deskripsi')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('division-center.index') }}" class="btn btn-secondary">Kembali</a>
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
