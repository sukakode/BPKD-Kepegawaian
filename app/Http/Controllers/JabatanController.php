<?php

namespace App\Http\Controllers;

use App\Http\Requests\JabatanStore;
use App\Http\Requests\JabatanUpdate;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function index()
    {
        $data = Jabatan::orderBy('id','ASC')->get();
        $trashed = Jabatan::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();

        return view('jabatan.index', compact('data', 'trashed'));
    }

    public function create()
    {
        return view('jabatan.create');
    }

    public function store(JabatanStore $pesan)
    {
        try {
            $tambah = Jabatan::firstOrCreate([
                'nama' => $pesan->nama,
                'deskripsi' => $pesan->deskripsi
            ]);

            session()->flash('success', 'Data Jabatan Berhasil Ditambah !');
            return redirect(route('jabatan.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan Silahkan Hubungi Admin !');
            return redirect('jabatan.create');
        }
    }
    
    public function edit($id)
    {
        try {
            $jabatan = Jabatan::findOrFail($id);
            return view('jabatan.edit', compact('jabatan'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan, Segera Hubungi Administrator !');
            return redirect(route('jabatan.index'));
        }
    }

    public function update(JabatanUpdate $pesan, $id)
    {
        try {
            $jabatan = Jabatan::findOrFail($id);
            $jabatan->update($pesan->except('_token', '_method'));

            session()->flash('info', 'Data Jabatan Berhasil di-Update !');
            return redirect(route('jabatan.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan Silahkan Hubungi Admin !');
            return redirect('jabatan.edit');
        }
    }

    public function destroy($id)
    {
        try {
            $jabatan = Jabatan::findOrFail($id);
            $jabatan->delete();

            session()->flash('warning', 'Data di-Pindahkan Ke Tong Sampah !');
            return redirect(route('jabatan.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan, Segera Hubungi Administrator !');
            return redirect(route('jabatan.index'));
        }
    }

    public function restore($id)
    {
        try {
            $jabatan = Jabatan::onlyTrashed()->findOrFail($id);
            $jabatan->restore();

            session()->flash('success', 'Data Berhasil di-Pulihkan !');
            return redirect(route('jabatan.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan, Segera Hubungi Administrator !');
            return redirect(route('jabatan.index'));
        }
    }

    public function forceDelete($id)
    {
        try {
            $jabatan = Jabatan::onlyTrashed()->findOrFail($id);
            $count = $jabatan->pegawai()->count();

            if ($count > 0) {
                session()->flash('error', 'Data Memiliki Relasi ke Data Pegawai !');
                session()->flash('warning', 'Gagal Menghapus Data !');
            } else {
                session()->flash('error', 'Data Jabatan di-Hapus Permanen !');
                $jabatan->forceDelete();
            }

            session()->flash('error', 'Data di-Hapus Permanent !');
            return redirect(route('jabatan.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan, Segera Hubungi Administrator !');
            return redirect(route('jabatan.index'));
        }
    }
}