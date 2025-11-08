 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
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
        <h2>Tambah User</h2>

        <div class="table-wrapper">
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="is_admin" class="form-check-input" value="1">
                    <label class="form-check-label" for="is_admin">Sebagai User?</label>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/dashboard" class="btn btn-secondary">Kembali</a>

            </form>
        </div>

        <footer class="mt-4 text-center text-muted">
            <p>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>. All rights reserved.</p>
            <p>Version 3.2.0</p>
        </footer>  
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 </body>
</html>
