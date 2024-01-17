@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h4>Sistem Informasi Pengumpulan Data</h4>
                    <p class="text-subtitle text-muted">Dashboard</p>
                </div>
                <div class="col-4 col-md-6 order-md-2 order-first mb-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <div class="dropdown">
                            <a href="#" id="topbarUserDropdown"
                                class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ asset('assets/images/faces/2.jpg') }}" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{ $user }}</h5>
                                        <h6 class="text-muted mb-0">Logout</h6>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg hidden"
                                aria-labelledby="topbarUserDropdown">
                                <li><a class="dropdown-item" href="#">My Account</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">About the Application</h4>
                </div>
                <div class="card-body">
                    Sistem Informasi Pengumpulan Data - OPD (SIPANDA-OPD) Aplikasi ini bertujuan untuk mempermudah proses
                    pengumpulan data dan jawaban dari pengguna berbasis Organisasi Perangkat Daerah (OPD). Aplikasi ini
                    dirancang untuk memberikan manfaat bagi dua pengguna utama: Administrator (Admin Kominfo) dan Pengguna
                    dari OPD tertentu.
                </div>
            </div>
        </section>
    </div>
    <div class="page-content">
        <section class="row ">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="questionAnswerChart" width="300" height="600"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Jumlah OPD</h6>
                                        <h6 class="font-extrabold mb-0">{{ $jumlahOpd }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Pengguna</h6>
                                        <h6 class="font-extrabold mb-0">{{ $jumlahPengguna }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </section>
    </div>
    <script>
        var ctx = document.getElementById('questionAnswerChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jumlah Pertanyaan', 'Jumlah Jawaban'],
                datasets: [{
                    label: 'Statistik Pertanyaan dan Jawaban',
                    data: [{{ $jumlahPertanyaan }}, {{ $jumlahJawaban }}],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
