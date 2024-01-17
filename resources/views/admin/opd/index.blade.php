@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Organisasi Perangkat Daerah</h3>
                <p class="text-subtitle text-muted">kelola Data OPD</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Master OPD</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <section class="section">
        <div class="card">
            <div class="card-header">
                List Data OPD
            </div>
            <div class="form-group ms-4">
                <!-- Button trigger for login form modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
                    Tambah
                </button>
                <!--login form Modal -->
                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Tambah Data OPD </h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ route('admin.opd.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <label for="nama">Nama OPD</label>
                                    <div class="form-group">
                                        <input type="text" id="nama" name="nama" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama OPD</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($opds as $opd)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $opd->id }}</td> --}}
                                <td>{{ $opd->nama }}</td>
                                <td>
                                    <!-- Button trigger for edit form modal -->
                                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $opd->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>


                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#danger{{ $opd->id }}"><i class="bi bi-trash-fill"></i>
                                    </button>

                                    <!--Danger theme Modal -->
                                    <div class="modal fade text-left" id="danger{{ $opd->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel120{{ $opd->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title white" id="myModalLabel120{{ $opd->id }}">
                                                        Hapus Data OPD
                                                    </h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form method="post"
                                                    action="{{ route('admin.opd.destroy', ['opd' => $opd->id]) }}">
                                                    <div class="modal-body">

                                                        @csrf
                                                        @method('DELETE')

                                                        <p>Anda yakin ingin menghapus data OPD "{{ $opd->nama }}"?</p>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Close</span>
                                                            </button>

                                                            <button type="submit" class="btn btn-danger ml-1"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Hapus</span>
                                                            </button>

                                                        </div>

                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade text-left" id="editModal{{ $opd->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="editModal{{ $opd->id }}Label"
                                        aria-hidden="true">
                                        @include('admin.opd.edit_modal', ['opd' => $opd])
                                    </div>

                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
