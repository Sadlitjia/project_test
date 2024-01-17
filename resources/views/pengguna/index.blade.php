@extends('layouts.pengguna.app_pengguna')

@section('contents')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-first">
                    <h4>Selamat Datang {{ $user }}</h4>
                    <p class="text-subtitle text-muted">Dashboard</p>
                </div>
                <div class="col-4 col-md-6 order-md-2 order-last">
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
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg hidden" aria-labelledby="topbarUserDropdown">
                                <li><a class="dropdown-item" href="#">My Account</a></li>
                                
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
                    Sistem Informasi Pengumpulan Data - OPD (SIPANDA-OPD) Aplikasi ini bertujuan untuk mempermudah proses pengumpulan data dan jawaban dari pengguna berbasis Organisasi Perangkat Daerah (OPD). Aplikasi ini dirancang untuk memberikan manfaat bagi dua pengguna utama: Administrator (Admin Kominfo) dan Pengguna dari OPD tertentu.
                </div>
            </div>
        </section>
    </div>
@endsection
