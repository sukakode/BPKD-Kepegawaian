@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h4 class="card-title">
                    Tambah Data Pengguna
                </h4>
                <div class="card-tools">
                    <a href="{{ route('data-pengguna.create') }}" class="btn btn-warning btn-xs">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email : </label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email..." required>
                        </div>
                        <div class="form-group">
                            <label for="">Password : </label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password..." required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama : </label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama..." required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama : </label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama..." required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection