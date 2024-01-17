@extends('layouts.app')

@section('content')

        <div class="page-heading">
            <h3>Selamat Datang Admin</h3>
        </div>
        <div class="page-content">
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-6 col-10">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Data Pengguna</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal"
                                        action="{{ route('pengguna.update', ['id' => $pengguna->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Name</label>
                                                </div>
                                                
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="nama" class="form-control"
                                                                 value="{{ $pengguna->nama }}"> 
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-person"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="email" name="email" class="form-control" value="{{ $pengguna->user->email }}"> 
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-envelope"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Password</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="password" name="password" class="form-control"
                                                                placeholder="Password">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>OPD</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <select class="form-select" name="opd_id">
                                                                <option selected value="{{ $pengguna->opd->id }}">{{ $pengguna->opd->nama }}</option>
                                                                @foreach ($opds as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->nama }}
                                                                    </option>
                                                                @endforeach
                                                                

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                                    
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

            
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy;</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by Me</p>
                    </div>
                </div>
        </footer>
 
@endsection
