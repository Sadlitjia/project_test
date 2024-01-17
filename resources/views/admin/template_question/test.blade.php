@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                List Data Template
            </div>
            <div class="form-group ms-4">
                <!-- Button trigger for login form modal -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
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
                            <form action="{{ route('admin.template.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <label class="mb-2" for="nama">Nama Template</label>
                                    <div class="form-group">
                                        <input type="text" id="nama" name="nama" class="form-control">
                                    </div>

                                    <label for="opd_id" class="mb-2">OPD</label>
                                    <div class="form-group">
                                        <div class="position-relative">
                                            <select class="form-select" name="opd_id">
                                                <option selected>Choose...</option>
                                                @foreach ($opds as $opd)
                                                    <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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
                            <th>Nama Template</th>
                            <th>OPD</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($template_questions as $template_question)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $template_question->id }}</td> --}}
                                <td>{{ $template_question->nama }}</td>
                                <td>{{ $template_question->opd->nama }}</td>

                                <td>
                                    <!-- Button trigger for edit form modal -->
                                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $template_question->id }}">
                                        Edit
                                    </button>

                                    <button type="button" class="btn btn-danger"
                                        onclick="openDeleteModal({{ $template_question->id }})">
                                        Delete
                                    </button>



                                    <!-- Edit Modal -->
                                    <div class="modal fade text-left" id="editModal{{ $template_question->id }}"
                                        tabindex="-1" role="dialog"
                                        aria-labelledby="editModal{{ $template_question->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"
                                                        id="editModal{{ $template_question->id }}Label">Edit Data
                                                        Template</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form
                                                    action="{{ route('admin.template.update', ['template_question' => $template_question->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <label for="nama">Nama Template</label>
                                                        <div class="form-group">
                                                            <input type="text" id="nama" name="nama"
                                                                class="form-control"
                                                                value="{{ $template_question->nama }}">
                                                        </div>
                                                        <div class="">
                                                            <label>OPD</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <div class="position-relative">
                                                                    <select class="form-select" name="opd_id">
                                                                        <option selected>Choose...</option>
                                                                        @foreach ($opds as $opd)
                                                                            <option value="{{ $opd->id }}"
                                                                                {{ $template_question->opd_id == $opd->id ? 'selected' : '' }}>
                                                                                {{ $opd->nama }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary ml-1"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Submit</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->

                                    <div class="modal fade" id="deleteModal{{ $template_question->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteModal{{ $template_question->id }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="deleteModal{{ $template_question->id }}Label">Hapus Pertanyaan
                                                    </h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form
                                                    action="{{ route('admin.template.destroy', ['template_question' => $template_question->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>Anda yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- <script>
        function openDeleteModal(templateQuestionId) {
            $('#deleteModal' + templateQuestionId).modal('show');
        }
    </script> --}}
@endsection
