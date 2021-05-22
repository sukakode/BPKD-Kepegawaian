@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h4 class="card-title">
                    Data User
                </h4>
                <div class="card-tools">
                    <button type="button" data-toggle="modal" data-target="#userTrashedModal" class="btn btn-danger btn-xs">
                       Data Terhapus
                    </button>
                    {{-- <a href="{{ route('user.create') }}" class="btn btn-success btn-xs">Tambah Data User</a> --}}
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>NAMA</th>
                                <th>EMAIL</th>
                                <th>JABATAN USER</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($user as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->pegawai->jabatan_id }}</td>
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
                            <tr>
                                <td class="text-italic text-danger" colspan="5">Belum Ada Data User</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Trashed Modal -->
    <div class="modal fade" id="userTrashedModal" tabindex="-1" role="dialog" aria-labelledby="userTrashedModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userTrashedModalLabel">Data User Terhapus</h5>
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