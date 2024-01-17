@extends('layouts.pengguna.app_pengguna')

@section('contents')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Pengisian Data</h3>
                <p class="text-subtitle text-muted">Silahkan mengisi pertanyaan pada form berikut</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success w-50">
            {{ session('success') }}
        </div>
    @endif
    {{-- <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <form class="form form-horizontal" action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <div class="form-body">

                                    @foreach ($pertanyaan as $index => $question)
                                        <div class="col-md-8">
                                            <label
                                                for="question_{{ $question['id'] }}">{{ $question['pertanyaan'] }}</label>
                                        </div>
                                        <div class="col-md-2 form-group ">
                                            <input type="hidden" class="form-control m-auto"
                                                name="item_question_id[{{ $index }}]" value="{{ $question['id'] }}">
                                            <input type="text" class="form-control" name="jawaban[{{ $index }}]"
                                                id="question_{{ $question['id'] }}" required>
                                        </div>
                                    @endforeach

                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>

                                    </div>
                                    >
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
    </section> --}}

    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <form class="form form-horizontal" action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <div class="form-body">

                                    @foreach ($pertanyaan as $index => $question)
                                        <div class="col-sm-12 d-flex justify-content-between align-items-center">
                                            <div class="col-md-10">
                                                <label
                                                    for="question_{{ $question['id'] }}">{{ $question['pertanyaan'] }}</label>
                                            </div>
                                            <div class="col-md-2 form-group ">
                                                <input type="hidden" class="form-control"
                                                    name="item_question_id[{{ $index }}]"
                                                    value="{{ $question['id'] }}">
                                                <input type="text" class="form-control"
                                                    name="jawaban[{{ $index }}]" id="question_{{ $question['id'] }}"
                                                    required>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="row">
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="col-md-2 btn btn-primary">Kirim</button>
                                        </div>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
