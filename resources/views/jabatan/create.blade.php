@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h4 class="card-title">
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Optional">
                        <button type="button" id="popover-important" class="btn btn-danger" data-container="body" data-triger="hover" data-toggle="popover" data-placement="right" title="Perhatian !" data-content="Data Jabatan Wajib di-Isi Dengan Sah & Valid !" readonly>
                            <i class="fas fa-info-circle" style="pointer-events: none;" type="button" disabled></i>
                        </button>&ensp;
                    </span>
                    Tambah Data Jabatan : &ensp;
                </h4>
                <div class="card-tools">
                    <a href="{{ route('jabatan.index') }}" class="btn btn-warning btn-xs">
                        <span>
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </span>&ensp;
                        Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('jabatan.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama" class="font-weight-normal">NAMA : </label>
                                <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" placeholder="Masukkan Nama..." required>
                                <span class="invalid-feedback">
                                    {{ $errors->first('nama') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="deskripsi" class="font-weight-normal">DESKRIPSI : </label>
                                <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}" name="deskripsi" id="deskripsi" rows="1" placeholder="Masukkan Deskripsi..."></textarea>
                                <span class="invalid-feedback">
                                    {{ $errors->first('deskripsi') }}
                                </span>
                            </div>
                            
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">
                                    <span>
                                        <i class="fas fa-plus"></i>
                                    </span>&ensp;
                                    Simpan Data                                    
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-block">
                                    <span>
                                        <i class="fas fa-undo"></i>
                                    </span>&ensp;
                                    Reset Input                                    
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="popover"]').popover()
        });

        $("#popover-important").popover({ trigger: "hover" });
    </script>
@endsection