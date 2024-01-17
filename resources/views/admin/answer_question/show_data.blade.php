@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <h3>Data Jawaban - {{ $opd->nama }}</h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
        
                <div class="row mb-3 justify-content-end">
                    <div class="col-md-1 col-12 ">
                        <a href="{{ route('admin.export.pdf', ['opd' => $opd->id]) }}" class="btn btn-danger"><i class="bi bi-file-earmark-pdf-fill"></i></a>
                    </div>
                    <div class="col-md-1 col-12 align-content-end">
                        <a href="{{ route('export.excel', ['opd' => $opd->id]) }}" class="btn btn-success"><i class="bi bi-file-earmark-spreadsheet-fill"></i></a>
                    </div>
                    <div class="col-md-1 col-12">
                        <a href="{{ route('export.print', $opd) }}" target="_blank" class="btn btn-primary"><i class="bi bi-printer-fill"></i></a>
                    </div>
                    
                </div>
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pengguna</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($answers as $answer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $answer->pengguna->nama }}</td>
                                <td>{{ $answer->item_question->pertanyaan }}</td>
                                <td>{{ $answer->jawaban }}</td>
                                <td>{{ $answer->tanggal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
