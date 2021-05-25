@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h4 class="card-title">
                Data Jabatan
            </h4>
            <div class="card-tools">
                <button type="button" data-toggle="modal" data-target="#jabatanTrashedModal" class="btn btn-danger btn-xs">
                    <span><i class="fas fa-trash"></i></span>&ensp;
                    Data Terhapus
                </button>
                <a href="{{ route('jabatan.create') }}" class="btn btn-success btn-xs">
                    <span><i class="fas fa-plus"></i></span>&ensp;
                    Tambah Data Jabatan
                </a>
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

                                            @if ($item->nama == 'Admin')
                                                <button type="button" class="btn btn-secondary btn-sm">
                                                    <span><i class="fas fa-times"></i></span>&ensp;
                                                    Tidak Ada Aksi
                                                </button>
                                            @else
                                                <a href="{{ route('jabatan.edit', $item->id) }}" class="btn btn-outline-info btn-sm">
                                                    <span><i class="far fa-edit"></i></span>
                                                </a>
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <span><i class="far fa-trash-alt"></i></span>
                                                </button>
                                            @endif
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

<!-- Trashed Modal -->
<div class="modal fade" id="jabatanTrashedModal" tabindex="-1" role="dialog" aria-labelledby="jabatanTrashedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jabatanTrashedModalLabel">Data Jabatan Terhapus</h5>
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
                                    <th>NAMA</th>
                                    <th>DESKRIPSI.</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
        
                            <tbody>
                                @forelse ($trashed as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <form action="{{ route('jabatan.restore', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-primary btn-sm mr-1">
                                                        Restore Data
                                                    </button>
                                                </form>

                                                <form action="{{ route('jabatan.force', $item->id) }}" method="POST">
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
                                        <td class="text-danger font-italic" colspan="4">Belum ada Data Jabatan Yang di-Hapus !</td>
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