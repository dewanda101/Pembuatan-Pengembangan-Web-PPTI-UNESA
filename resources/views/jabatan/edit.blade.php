<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jabatan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1>Edit Jabatan</h1>
    <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $jabatan->jabatan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('jabatan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
