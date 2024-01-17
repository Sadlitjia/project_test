@extends('layouts.app')

@section('content')
    
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Pertanyaan</h3>
                    <p class="text-subtitle text-muted">kelola Data Form Pertanyaan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Master Pertanyaan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    List Data Pertanyaan
                </div>

                <div class="form-group ms-4">
                    <!-- Button trigger for login form modal -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
                        Tambah
                    </button>
                    <!-- login form Modal -->
                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel33">Tambah Pertanyaan </h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <form action="{{ route('admin.item_question.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <label class="mb-2" for="pertanyaan">Pertanyaan</label>
                                        <div class="form-group">
                                            <input type="text" id="pertanyaan" name="pertanyaan" class="form-control">
                                        </div>

                                        <label for="template_question_id" class="mb-2">Template Form</label>
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <select class="form-select" name="template_question_id">
                                                    <option selected>Choose...</option>
                                                    @foreach ($template_questions as $template_question)
                                                        <option value="{{ $template_question->id }}">
                                                            {{ $template_question->nama }}
                                                        </option>
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

                                <th>Pertanyaan</th>
                                <th>Template Form</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($item_questions as $item_question)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $item_question->pertanyaan }}</td>
                                    <td>{{ $item_question->template_question->nama }}</td>

                                    <td>
                                        <!-- Button trigger for edit form modal -->
                                        <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $item_question->id }}">
                                            Edit
                                        </button>

                                        <button type="button" class="btn btn-danger"
                                            onclick="openDeleteModal({{ $item_question->id }})">
                                            Delete
                                        </button>


                                        <!-- Edit Modal -->
                                        <div class="modal fade text-left" id="editModal{{ $item_question->id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="editModal{{ $item_question->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"
                                                            id="editModal{{ $item_question->id }}Label">Edit Data Template
                                                        </h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="{{ route('admin.item_question.update', ['item_question' => $item_question->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <label for="pertanyaan">Pertanyaan</label>
                                                            <div class="form-group">
                                                                <input type="text" id="pertanyaan" name="pertanyaan"
                                                                    class="form-control"
                                                                    value="{{ $item_question->pertanyaan }}">
                                                            </div>
                                                            <div class="">
                                                                <label>Template Form</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <div class="position-relative">
                                                                        <select class="form-select"
                                                                            name="template_question_id">
                                                                            <option selected>Choose...</option>
                                                                            @foreach ($template_questions as $template)
                                                                                <option value="{{ $template->id }}"
                                                                                    {{ $item_question->template_question_id == $template->id ? 'selected' : '' }}>
                                                                                    {{ $template->nama }}
                                                                                </option>
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
                                                    <!-- Periksa jika terdapat pesan kesalahan di sini -->
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <!-- Kode modal delete -->
                                        <div class="modal fade" id="deleteModal{{ $item_question->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModal{{ $item_question->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="deleteModal{{ $item_question->id }}Label">Hapus Data
                                                            Template</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="{{ route('admin.item_question.destroy', ['item_question' => $item_question->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-body">
                                                            <p>Anda yakin ingin menghapus data ini?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close
                                                            </button>
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

    <script>
        function openDeleteModal(itemQuestionId) {
            $('#deleteModal' + itemQuestionId).modal('show');
        }
    </script>
@endsection
