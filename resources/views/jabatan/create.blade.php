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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama" class="font-weight-normal">NAMA : </label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama..." required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="deskripsi" class="font-weight-normal">DESKRIPSI : </label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="1" placeholder="Masukkan Deskripsi..."></textarea>
                            </div>
                            
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Simpan Data</button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-block">Reset Input</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection