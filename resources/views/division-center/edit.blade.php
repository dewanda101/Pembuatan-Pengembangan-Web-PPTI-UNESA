<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Division Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Division Center</h2>
        
        <form action="{{ route('division-center.update', $divisionCenter->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul_id" class="form-label">Nama Division:</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $divisionCenter->nama) }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ old('deskripsi', $divisionCenter->deskripsi) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('division-center.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
