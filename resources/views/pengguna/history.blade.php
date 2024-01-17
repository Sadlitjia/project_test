@extends('layouts.pengguna.app_pengguna')


@section('contents')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>History Pengisian Data</h3>
                <p class="text-subtitle text-muted">Lihat history jawaban berdasarkan tanggal pengisian</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">History</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card col-md-6">
            <div class="card-body">
                <ul>
                    @foreach ($historyDates as $tanggal)
                        <li>
                            <a href="{{ route('user.history.date', ['tanggal' => $tanggal]) }}">{{ $tanggal }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
