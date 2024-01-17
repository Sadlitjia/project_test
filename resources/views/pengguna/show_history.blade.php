
@extends('layouts.pengguna.app_pengguna')

@section('contents')
    <div class="page-heading">
        <h3>Jawaban Tanggal {{ $tanggal }}</h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>ID Pengguna</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <!-- tambahkan kolom lain yang diinginkan -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($answers as $answer)
                            <tr>
                                <td>{{ $answer->id }}</td>
                                <td>{{ $answer->pengguna->nama }}</td>
                                <td>{{ $answer->pengguna->id }}</td>
                                <td>{{ $answer->item_question->pertanyaan }}</td>
                                <td>{{ $answer->jawaban }}</td>
                                <!-- tambahkan kolom lain yang diinginkan -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
