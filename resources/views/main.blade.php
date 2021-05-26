@extends('layouts.master')  

@section('content')
<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <div class="card-title">Data Pegawai</div>
    </div>
    <div class="card-body">
      <div class="table table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>NO.</th>
              <th>NAMA</th>
              <th>E-MAIL</th>
              <th>GOLONGAN</th>
              <th>JABATAN</th>
              <th>TAHUN DIANGKAT</th>
              <th>TAHUN MENJABAT</th>
              <th>STATUS</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($pegawai as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ empty($item->user->email) ? 'User Tidak Memiliki Hak Login':$item->user->email }}</td>
                  <td>{{ $item->golongan }}</td>
                  <td>{{ $item->jabatan->nama }}</td>
                  <td>{{ $item->tahun_diangkat }}</td>
                  <td>{{ $item->tahun_menjabat }}</td>
                  <td>{{ $item->deleted_at == null ? 'Aktif':'Tidak Aktif' }}</td>
                </tr>
            @empty
                <tr>
                  <td colspan="4" class="text-danger text-italic">Belum ada data pegawai !</td>
                </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
{{-- <div class="col-md-5">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <div class="card-title">Data Jabatan</div>
    </div>
    <div class="card-body">
      <div class="table table-responsive">
        <table class="table-bordered">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama Jabatan</th>
              <th>Deskripsi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($jabatan as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->deskripsi ? '':'Tidak Ada Deskripsi !'}}</td>
              </tr>
            @empty
                
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div> --}}
@endsection