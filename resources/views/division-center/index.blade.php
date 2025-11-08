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
        <h2>Devisi Center</h2>
        <a href="{{ route('division-center.create') }}" class="btn btn-primary btn-custom">+ Tambah Devisi</a>
    </div>
    
    <div class="table-wrapper">
        <table class="table table-hover table-bordered w-100">
            <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($division as $divisionCenter)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $divisionCenter->nama}}</td>
                <td>{{ \Illuminate\Support\Str::limit($divisionCenter->deskripsi, 300) }}</td>
              
                <td>
                    <a href="{{ route('division-center.edit', Crypt::encrypt($divisionCenter->id)) }}" class="btn btn-primary btn-custom">Edit</a>
                    <button type="button" class="btn btn-danger btn-custom" onclick="verifikasiHapus('{{ $divisionCenter->id }}')">Hapus</button>
                    
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    function verifikasiHapus(id) {
        if (confirm('Yakin ingin menghapus?')) {
            // Jika pengguna mengkonfirmasi, kirimkan permintaan untuk menghapus
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '/division-center/' + id;
            
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
