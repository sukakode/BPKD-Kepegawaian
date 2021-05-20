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
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('jabatan.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('jabatan.edit', $item->id) }}" class="btn btn-outline-info btn-sm">
                                                Edit Data
                                            </a>

                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                Hapus Data
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td class="text-danger font-italic" colspan="4">Belum ada Data jabatan !</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection