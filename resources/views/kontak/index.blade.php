@extends('layout.master')

@section('header')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
<div class="container-fluid mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Pengaduan Contact Us</h2>
        <a href="{{ route('kontak.create') }}" class="btn btn-primary btn-custom">+ Tambah Pengaduan</a>
    </div>
    <div class="table-wrapper">
        <table class="table table-hover table-bordered w-100">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Pesan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @foreach ($kontaks as $kontak)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kontak->name }}</td>
                        <td>{{ $kontak->email }}</td>
                        <td>{{ $kontak->phone }}</td>
                        <td>{{ $kontak->message }}</td>
                        <td>
                            <a href="{{ route('kontak.edit', $kontak->id) }}" class="btn btn-primary">Edit</a>
                            <!-- Menghubungkan tombol Hapus dengan konfirmasi -->
                            <button type="button" class="btn btn-danger" onclick="verifikasiHapus({{ $kontak->id }})">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script>
    function verifikasiHapus(id) {
        if (confirm('Yakin ingin menghapus?')) {
            // Jika pengguna mengkonfirmasi, kirimkan permintaan untuk menghapus
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '/kontak/' + id;
            
            var csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            
            var methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            
            form.appendChild(csrfToken);
            form.appendChild(methodField);
            
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@endsection
