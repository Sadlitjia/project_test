@extends('layouts.app')

@section('content')
    <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Jawaban</h3>
                    <p class="text-subtitle text-muted">kelola Data Jawaban</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Master Jawaban</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>OPD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($opds as $opd)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('admin.answers', ['opd' => $opd]) }}" class="btn btn-primary col-md-3 text-decoration-none">
                                        {{ $opd->nama }}
                                    </a>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
