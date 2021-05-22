@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h4 class="card-title">
                    Data Pegawai
                </h4>
                <div class="card-tools">
                    <button type="button" data-toggle="modal" data-target="#pegawaiTrashedModal" class="btn btn-danger btn-xs">
                       Data Terhapus
                    </button>
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

                                                @if (auth()->user()->id == $item->id)
                                                    <button type="button" class="btn btn-secondary btn-sm">
                                                        Tidak Ada Aksi
                                                    </button>
                                                @else
                                                    <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-outline-info btn-sm">
                                                        Edit Data
                                                    </a>
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        Hapus Data
                                                    </button>
                                                @endif
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
    <!-- Trashed Modal -->
    <div class="modal fade" id="pegawaiTrashedModal" tabindex="-1" role="dialog" aria-labelledby="pegawaiTrashedModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pegawaiTrashedModalLabel">Data Pegawai Terhapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                                    @forelse ($trashed as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nip }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->golongan }}</td>
                                            <td>{{ $item->jabatan->nama }}</td>
                                            <td>{{ $item->pendidikan }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <form action="{{ route('pegawai.restore', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-outline-primary btn-sm mr-1">
                                                            Restore Data
                                                        </button>
                                                    </form>
    
                                                    <form action="{{ route('pegawai.force', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                                            Hapus Data Permanent
                                                        </button>
                                                    </form>
            
                                                        
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr class="text-center">
                                        <td class="text-danger font-italic" colspan="7">Belum ada Data Pegawai Yang di-Hapus !</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tutup Modal</button>
                </div>
            </div>
        </div>
    </div>
@endsection