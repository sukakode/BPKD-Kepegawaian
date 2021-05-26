@extends('layouts.master')  

@section('content')
<div class="col-md-6">
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
              <th>JABATAN USER</th>
              <th>STATUS</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($pegawai as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->jabatan->nama }}</td>
                  @if ($item->deleted_at ? '':'Aktif')
                    <td>Aktif</td>
                  @endif
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
<div class="col-md-6">
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
                <td>{{ $item->deskripsi }}</td>
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