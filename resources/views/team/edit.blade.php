<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Team</title>
    <style>
        /* Background and Font Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        /* Form Styling */
        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            color: #333;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            margin-top: 15px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Link Styling */
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Edit Team</h1>

    <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $team->id }}">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{ $team->nama }}" required>
        @error('nama')
        <div class="text-danger">{{ $message }}</div>
        @enderror

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

        <label for="deskripsi">Keterangan Jabatan:</label>
        <textarea name="deskripsi" rows="4" placeholder="Kosongkan jika tidak ingin mengubah">{{ $team->deskripsi }}</textarea>
        @error('deskripsi')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="images">File Upload Foto:</label>
        <input type="file" name="images" accept=".jpg,.jpeg,.png">
        @error('images')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Perbarui</button>
    </form>

    <a href="{{ route('document.indexTeams') }}">Kembali</a>
</body>
</html>
