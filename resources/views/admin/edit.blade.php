<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
    <style>
        /* Background and Font Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9; /* Warna latar yang serupa dengan sebelumnya */
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
        input[type="email"],
        input[type="password"] {
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
            background-color: #4CAF50; /* Ganti warna sesuai preferensi sebelumnya */
            color: #fff;
            border: none;
            border-radius: 4px;
            margin-top: 15px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049; /* Sedikit lebih gelap saat hover */
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
    <h1>Edit Admin</h1>

    <form action="{{ route('admin.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nama:</label>
        <input type="text" name="name" value="{{ $admin->name }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $admin->email }}" required>

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah">

        <button type="submit">Perbarui</button>
    </form>

    <a href="{{ route('admin.index') }}">Kembali</a>
</body>
</html>
