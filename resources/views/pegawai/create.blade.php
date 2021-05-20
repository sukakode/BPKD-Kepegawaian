@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h4 class="card-title">
                    Data Diri Pegawai : 
                </h4>
                <div class="card-tools">
                    <a href="{{ route('pegawai.index') }}" class="btn btn-warning btn-xs">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('pegawai.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip" class="font-weight-normal">NIP : </label>
                                <input type="number" name="nip" class="form-control {{ $errors->has('nip') ? 'is-invalid':'' }}" placeholder="Masukkan NIP..." required>
                                <span class="invalid-feedback">
                                    {{ $errors->first('nip') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik" class="font-weight-normal">NIK : </label>
                                <input type="number" name="nik" class="form-control {{ $errors->has('nik') ? 'is-invalid':'' }}" placeholder="Masukkan NIK..." required>
                                <span class="invalid-feedback">
                                    {{ $errors->first('nik') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nama" class="font-weight-normal">Nama : </label>
                                <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" placeholder="Masukkan Nama..." required>
                                <span class="invalid-feedback">
                                    {{ $errors->first('nama') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="golongan" class="font-weight-normal">Golongan : </label>
                                <input type="text" name="golongan" class="form-control {{ $errors->has('golongan') ? 'is-invalid':'' }}" placeholder="Masukkan Golongan..." required>
                                <span class="invalid-feedback">
                                    {{ $errors->first('golongan') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jabatan" class="font-weight-normal">Jabatan : </label>
                                <select class="form-control {{ $errors->has('jabatan_id') ? 'is-invalid':'' }}" name="jabatan_id" id="jabatan_id">
                                    <option value="">- Pilih Jabatan -</option>
                                    @foreach ($jabatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback">
                                    {{ $errors->first('jabatan_id') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pendidikan" class="font-weight-normal">Pendidikan : </label>
                                <input type="text" name="pendidikan" class="form-control {{ $errors->has('pendidikan') ? 'is-invalid':'' }}" placeholder="Masukkan Pendidikan..." required>
                                <span class="invalid-feedback">
                                    {{ $errors->first('pendidikan') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="pendidikan" class="font-weight-normal">Alamat : </label>
                                <textarea name="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid':'' }}" id="alamat" rows="1" placeholder="Masukan Alamat..." required></textarea>
                                <span class="invalid-feedback">
                                    {{ $errors->first('alamat') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_hp" class="font-weight-normal">Nomor Telepon : </label>
                                <input type="number" name="no_hp" class="form-control {{ $errors->has('no_hp') ? 'is-invalid':'' }}" id="no_hp" placeholder="Masukan Nomor Telepon..." required>
                                <span class="invalid-feedback">
                                    {{ $errors->first('no_hp') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun_diangkat" class="font-weight-normal">Tahun Diangkat : </label>
                                <input type="date" name="tahun_diangkat" class="form-control {{ $errors->has('tahun_diangkat') ? 'is-invalid':'' }}" id="tahun_diangkat" required>
                                <span class="invalid-feedback">
                                    {{ $errors->first('tahun_diangkat') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun_menjabat" class="font-weight-normal">Tahun Menjabat : </label>
                                <input type="date" name="tahun_menjabat" class="form-control {{ $errors->has('tahun_menjabat') ? 'is-invalid':'' }}" id="tahun_menjabat" required>
                                <span class="invalid-feedback">
                                    {{ $errors->first('tahun_menjabat') }}
                                </span>
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
                                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" name="email" id="email" placeholder="Masukan E-Mail Pegawai">
                                        <span class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_confirmation" class="font-weight-normal">Tuliskan Ulang E-mail Pegawai: </label>
                                        <input type="email_confirmation" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" name="email_confirmation" id="email_confirmation" placeholder="Masukan E-Mail Pegawai">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="font-weight-normal">Password Pegawai : </label>
                                        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" name="password" id="password" placeholder="Masukan Password Pegawai">
                                        <span class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation" class="font-weight-normal">Tuliskan Ulang Password Pegawai : </label>
                                        <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid':'' }}" name="password_confirmation" id="password_confirmation" placeholder="Masukan Ulang Password Pegawai">
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