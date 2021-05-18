@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h4 class="card-title">
                    Data Pengguna
                </h4>
                <div class="card-tools">
                    <a href="{{ route('data-pengguna.create') }}" class="btn btn-success btn-xs">Tambah Data Pengguna</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>NAMA</th>
                                <th>NIP.</th>
                                <th>GOL</th>
                                <th>JABATAN</th>
                                <th>Pendidikan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection