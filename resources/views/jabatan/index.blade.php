@extends('layout.master')

@section('header')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            </div>
        </div>
    @endsection

@section('content')
    <div class="container-fluid mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Jabatan</h2>
            <a href="{{ route('jabatan.create') }}" class="btn btn-primary btn-custom">+ Tambah Jabatan</a>
        </div>

        <div class="table-wrapper">
            <table class="table table-hover table-bordered w-100">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jabatans as $index => $jabatan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jabatan->jabatan }}</td>

                            <td>
                                <a href="{{ route('jabatan.edit', $jabatan->id) }}" class="btn btn-primary btn-custom">Edit</a>
                                <form action="{{ route('jabatan.destroy', $jabatan->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-custom"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        function verifikasiHapus(id) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data ini tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ URL::to('/') }}/jabatan/" + id,
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        dataType: "JSON",
                        success: function(response) {
                            Swal.fire({
                                title: "Dihapus!",
                                text: "Data berhasil dihapus.",
                                icon: "success"
                            });
                            location.reload();
                        }
                    });
                }
            });
        }
    </script>
@endsection
