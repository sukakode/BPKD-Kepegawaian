@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h4 class="card-title">
                    Data Diri Pegawai : 
                </h4>
                <div class="card-tools">
                    <a href="{{ route('data-pegawai.index') }}" class="btn btn-warning btn-xs">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('data-pegawai.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip" class="font-weight-normal">NIP : </label>
                                <input type="number" name="nip" class="form-control" placeholder="Masukkan NIP..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik" class="font-weight-normal">NIK : </label>
                                <input type="number" name="nik" class="form-control" placeholder="Masukkan NIK..." required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nama" class="font-weight-normal">Nama : </label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama..." required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="golongan" class="font-weight-normal">Golongan : </label>
                                <input type="text" name="golongan" class="form-control" placeholder="Masukkan Golongan..." required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jabatan" class="font-weight-normal">Jabatan : </label>
                                <select class="form-control" name="jabatan" id="jabatan">
                                    <option value="">- Pilih Jabatan -</option>
                                    @foreach ($jabatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pendidikan" class="font-weight-normal">Pendidikan : </label>
                                <input type="text" name="pendidikan" class="form-control" placeholder="Masukkan Pendidikan..." required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="pendidikan" class="font-weight-normal">Alamat : </label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="1" placeholder="Masukan Alamat..." required></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_hp" class="font-weight-normal">Nomor Telepon : </label>
                                <input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="Masukan Nomor Telepon..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun_diangkat" class="font-weight-normal">Tahun Diangkat : </label>
                                <input type="date" name="tahun_diangkat" class="form-control" id="tahun_diangkat" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun_menjabat" class="font-weight-normal">Tahun Menjabat : </label>
                                <input type="date" name="tahun_menjabat" class="form-control" id="tahun_menjabat" required>
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                            <h5 style="font-size: 18px;">Data Login Pegawai : </h5>
                            <hr>
                        </div>
                        <div class="col-12 pl-4 pr-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="font-weight-normal">E-mail Pegawai : </label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukan E-Mail Pegawai">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="font-weight-normal">Tuliskan Ulang E-mail Pegawai: </label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukan E-Mail Pegawai">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="font-weight-normal">Password Pegawai : </label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password Pegawai">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="font-weight-normal">Tuliskan Ulang Password Pegawai : </label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Masukan Ulang Password Pegawai">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success btn-sm">Buat Data Pegawai</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-danger btn-sm">Reset Input</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection