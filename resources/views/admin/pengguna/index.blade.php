@extends('layouts.app')

@section('content')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Pengguna</h3>
            <p class="text-subtitle text-muted">Kelola Data Pengguna</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Master Pengguna</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            Datatable User
        </div>
        <div class="card-body">
            <a href="{{ route('pengguna.create') }}">
                <button type="button" class="btn btn-primary">
                    Tambah
                </button>
            </a>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>OPD</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penggunas as $pengguna)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- <td>{{ $pengguna->id }}</td> --}}
                            <td>{{ $pengguna->nama }}</td>
                            <td>{{ $pengguna->user->email }}</td>
                            <td>{{ $pengguna->opd->nama }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('pengguna.edit', ['pengguna' => $pengguna->id]) }}"
                                        class="btn btn-warning me-3">
                                        Edit
                                    </a>
                                    <form method="post"
                                        action="{{ route('pengguna.destroy', ['pengguna' => $pengguna->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            responsive: true
        });
    });
</script>

@endsection
