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
        <h2>Teams</h2>
        <a href="{{ route('document.create') }}" class="btn btn-primary btn-custom">+ Tambah Teams</a>
    </div>
    
    <div class="table-wrapper">
        <table class="table table-hover table-bordered w-100">
            <thead class="table-light">
            <tr>
            <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Keterangan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>     
                <tbody>
                    @foreach ($teams as $index => $team)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $team->nama }}</td>
                            <td>{{ $team->jabatan->jabatan ?? '-' }}</td> 
                            <td>{{ $team->deskripsi }}</td>
                            <td>
                                 <img src="{{ asset('storage/image/'. $team->images) }}" alt="{{ $team->images}}"alt="Images" width="50">
                            </td>
                            <td>
                                <a href="{{ route('document.edit', Crypt::encrypt($team->id)) }}"
                                    class="btn btn-primary btn-custom">Edit</a>
                                {{-- @csrf --}}
                                {{-- @method('DELETE') --}}
                                <button type="button" class="btn btn-danger btn-custom"
                                    onclick="verifikasiHapus('{{ $team->id }}')">Hapus</button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script>
            function verifikasiHapus(id) {
                Swal.fire({
                    title: "Apakah anda yakin?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ URL::to('/') }}/document/" + id, // Pastikan URL sesuai dengan route Anda
                            data: {
                                _token: "{{ csrf_token() }}",
                            },
                            dataType: "JSON",
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: "Berhasil!",
                                        text: response.message,
                                        icon: "success"
                                    }).then(() => location.reload());
                                } else {
                                    Swal.fire("Gagal!", response.message, "error");
                                }
                            },
                            error: function() {
                                Swal.fire("Gagal!", "Terjadi kesalahan saat menghapus data.", "error");
                            }
                        });
                    }
                });
            }
        </script>
    @endsection
