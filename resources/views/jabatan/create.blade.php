@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h4 class="card-title">
                    Tambah Data Jabatan
                </h4>
                <div class="card-tools">
                    <a href="{{ route('jabatan.index') }}" class="btn btn-warning btn-xs">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('jabatan.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">NAMA : </label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama..." required>
                            </div>
                            <div class="form-group">
                                <label for="">DESKRIPSI : </label>
                                <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi...">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Simpan Data</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection