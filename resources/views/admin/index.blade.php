{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-wrapper {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .btn-custom {
            font-size: 1rem;
            padding: 8px 12px;
        }
    </style>
</head>

<body> --}}
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
                <h2>User</h2>
                <a href="{{ route('admin.create') }}" class="btn btn-primary btn-custom">+ Tambah Data</a>
            </div>

            <div class="table-wrapper">
                <table class="table table-hover table-bordered w-100">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $admin)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <a href="{{ route('admin.edit', Crypt::encrypt($admin->id)) }}"
                                        class="btn btn-primary btn-custom">Edit</a>
                                    {{-- <form action="{{ route('admin.destroy', Crypt::encrypt($admin->id)) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                            </form> --}}
                                    <button type="button" class="btn btn-danger btn-custom"
                                        onclick="verifikasiHapus(' {{ Crypt::encrypt($admin->id) }}')">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- <footer class="mt-4 text-center text-muted">
            <p>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>. All rights reserved.</p>
            <p>Version 3.2.0</p>
        </footer> --}}
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {

            });
        </script>
        <script>
            function verifikasiHapus(id) {
                console.log(id);

                Swal.fire({
                    title: "Apakah anda yakin?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: "DELETE",
                            url: "{{ URL::to('/') }}/admin/" + id,
                            data: {
                                _token: "{{ csrf_token() }}",
                            },
                            dataType: "JSON",
                            success: function(response) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
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
    {{-- </body>

</html> --}}
