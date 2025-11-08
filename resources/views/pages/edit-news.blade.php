<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

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
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
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
    <h1>Edit Berita</h1>

    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $news->title }}" required>

        <label for="content">Content:</label>
        <textarea name="content" rows="4">{{ $news->content }}</textarea>

        <label for="category">Category:</label>
        <select name="category_id">
            @foreach ($category as $item)
            <option value="{{ $item->id }}" {{ $news->category_id == $item->id ? 'selected' : '' }}>
                {{ $item->category }}
            </option>
        @endforeach
        </select>

        <label for="image">Gambar Judul (optional):</label>
        <input type="file" name="image">

        <label for="file_upload">File Upload (optional):</label>
        <input type="file" name="file_upload">

        <button type="submit">Perbarui</button>
    </form>

    <a href="{{ route('news.index') }}">Kembali</a>
</body>
</html>
