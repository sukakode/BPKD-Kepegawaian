<div>
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="col-12">
                        {{-- <div class="form-group">
                            <label for="">Nama Kategori : </label>
                            <input wire:model.lazy="data.name" type="text" class="form-control" placeholder="Masukkan Nama Kategori..." required>
                        </div> --}}
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    {{-- <th class="text-center">Aksi</th> --}}
                                </thead>
                                <tbody>
                                    @forelse ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal" wire:click="$emit('edit-data', '{{ $item->id }}' )">
                                                    Edit Data
                                                </button>
                                                <button type="submit" class="btn btn-sm btn-danger" wire:click="hapusData({{ $item->id }})">Hapus Data</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center text-danger" colspan="3" style="font-style: italic;">Belum Ada Data...</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
