<div>
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table>
                                    <tr>
                                        <td>NIP</td>
                                        <td class="px-5">:</td>
                                        <td>{{ empty($data) ? '':$data['nip'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>NIK</td>
                                        <td class="px-5">:</td>
                                        <td>{{ empty($data) ? '':$data['nik'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pegawai</td>
                                        <td class="px-5">:</td>
                                        <td>{{ empty($data) ? '':$data['nama'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>E-Mail</td>
                                        <td class="px-5">:</td>
                                        @if (empty($data->user->email))
                                            <td class="text-danger">Pegawai Tidak Memiliki Data Login</td>
                                        @else
                                            <td>{{ empty($data) ? '':$data->user->email }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Golongan</td>
                                        <td class="px-5">:</td>
                                        <td>{{ empty($data) ? '':$data['golongan'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan </td>
                                        <td class="px-5">:</td>
                                        <td>{{ empty($data) ? '':$data->jabatan->nama }}</td>
                                    </tr>
                                    </table>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table>
                                    <tr>
                                        <td>Pendidikan </td>
                                        <td class="px-4">:</td>
                                        <td>{{ empty($data) ? '':$data['pendidikan'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td class="px-4">:</td>
                                        <td>{{ empty($data) ? '':$data['alamat'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telepon</td>
                                        <td class="px-4">:</td>
                                        <td>{{ empty($data) ? '':$data['no_hp'] }}</td>

                                    </tr>
                                    <tr>
                                        <td>Tahun Diangkat</td>
                                        <td class="px-4">:</td>
                                        <td>{{ empty($data) ? '':$data['tahun_diangkat'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tahun Menjabat</td>
                                        <td class="px-4">:</td>
                                        <td>{{ empty($data) ? '':$data['tahun_menjabat'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status Pegawai</td>
                                        <td class="px-4">:</td>
                                        @if (empty($data['deleted_at']))
                                            <td>{{ empty($data) ? '':'Aktif' }}</td>
                                        @endif
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
