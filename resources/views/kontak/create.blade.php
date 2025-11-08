<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengaduan Contact Us</title>
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
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Tambah Pengaduan Contact Us</h2>
        </div>

        <div class="table-wrapper">
            <form action="{{ route('kontak.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon:</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Pesan:</label>
                    <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                    @error('message')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-custom">Simpan</button>
                <a href="{{ route('kontak.index') }}" class="btn btn-secondary btn-custom">Kembali</a>
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
