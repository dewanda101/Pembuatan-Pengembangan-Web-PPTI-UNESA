<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center">Registrasi Admin</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('user.register.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" required>
                    </div>
                    <!DOCTYPE html>
{{-- <html lang="id"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi dengan reCAPTCHA</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function enableButton() {
            document.getElementById("registerBtn").disabled = false;
        }
    </script>
</head>
<body>

    <form action="proses.php" method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <!-- Google reCAPTCHA -->
        <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY" data-callback="enableButton"></div>

        <br>
        <button type="submit" id="registerBtn" disabled>Daftar</button>
    </form>

</body>
</html> --}}

                    <button type="submit" class="btn btn-primary w-100">Registrasi</button>
                </form>
                <p class="mt-3 text-center">Sudah punya akun? <a href="{{ route('user.login') }}">Login</a></p>

                <!-- Tambahkan JavaScript SweetAlert2 di sini -->
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.querySelector('form').addEventListener('submit', function(e) {
                        e.preventDefault(); // Mencegah form terkirim langsung

                        const form = this; // Referensi ke form

                        // Kirim data menggunakan AJAX
                        fetch(form.action, {                                                                                                                             
                                method: 'POST',
                                body: new FormData(form),
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Register Berhasil!',
                                        text: 'Silahkan login!',
                                        confirmButtonText: 'OK',
                                        confirmButtonColor: '#3085d6'
                                    }).then(() => {
                                        // Arahkan ke halaman login setelah konfirmasi
                                        window.location.href = "{{ route('user.login') }}";
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: data.message, // Hanya menampilkan pesan singkat
                                    });
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Terjadi kesalahan, silakan coba lagi!'
                                });
                            });
                    });
                   </script>      
