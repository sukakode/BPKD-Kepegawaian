@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h4 class="card-title">
                    Data Pegawai
                </h4>
                <div class="card-tools">
                    <a href="{{ route('pegawai.create') }}" class="btn btn-success btn-xs">Tambah Data Pegawai</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>NIP.</th>
                                <th>NAMA</th>
                                <th>GOL</th>
                                <th>JABATAN</th>
                                <th>Pendidikan</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pegawai as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->golongan }}</td>
                                    <td>{{ $item->jabatan->nama }}</td>
                                    <td>{{ $item->pendidikan }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <form action="{{ route('pegawai.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
    
                                                <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-outline-info btn-sm">
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
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection