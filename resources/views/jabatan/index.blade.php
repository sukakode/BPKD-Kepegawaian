@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h4 class="card-title">
                Data Jabatan
            </h4>
            <div class="card-tools">
                <a href="{{ route('jabatan.create') }}" class="btn btn-success btn-xs">Tambah Data Jabatan</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>NAMA</th>
                            <th>DESKRIPSI.</th>
                            <th>AKSI.</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning">
                                        Edit Data
                                    </button>

                                    <button type="submit" class="btn btn-sm btn-danger">Hapus Data</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection