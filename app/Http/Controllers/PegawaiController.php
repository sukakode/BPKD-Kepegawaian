<?php

namespace App\Http\Controllers;

use App\Http\Requests\PegawaiStore;
use App\Http\Requests\PegawaiUpdate;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index()
    {
        $cekUser = Auth::check();
        $pegawai = Pegawai::orderBy('jabatan_id', 'ASC')->get();
        $trashed = Pegawai::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
        return view('pegawai.index', compact('pegawai', 'trashed', 'cekUser'));
        
    }

    public function create()
    {
        $jabatan = Jabatan::orderBy('nama', 'ASC')->get();
        return view('pegawai.create', compact('jabatan'));
    }

    public function store(PegawaiStore $pesan)
    {
        try {
            $pegawai = Pegawai::firstOrCreate([
                'nip' => $pesan->nip,
                'nik' => $pesan->nik,
                'nama' => $pesan->nama,
                'golongan' => $pesan->golongan,
                'jabatan_id' => $pesan->jabatan_id,
                'pendidikan' => $pesan->pendidikan,
                'alamat' => $pesan->alamat,
                'no_hp' => $pesan->no_hp,
                'tahun_diangkat' => $pesan->tahun_diangkat,
                'tahun_menjabat' => $pesan->tahun_menjabat
            ]);

            if (!empty($pesan->email) && !empty($pesan->password)) {
                $user = User::firstOrCreate([
                    'pegawai_id' => $pegawai->id,
                    'nama'  => $pegawai->nama,
                    'email' => $pesan->email,
                    'password' => Hash::make($pesan->password)
                ]);
            }

            session()->flash('success', 'Data Pegawai Baru Telah di-Tambahkan !');
            return redirect(route('pegawai.index'));
        } catch (\Exception $e) {
            dd($e);
            session()->flash('error', 'Terjadi Kesalahan, Segera Hubungi Administrator !');
            return redirect(route('pegawai.create'));
        }
    }

    public function edit($id)
    {
        try {
            $pegawai = Pegawai::findOrFail($id);
            $jabatan = Jabatan::orderBy('nama', 'ASC')->get();
            return view('pegawai.edit', compact('pegawai', 'jabatan'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan Silahkan Hubungi Admin !');
            return redirect('pegawai.edit');
        }
        
    }

    public function update(PegawaiUpdate $pesan, Pegawai $pegawai)
    {
        if (!empty($pegawai->user)) {
            $this->validate($pesan, [
                'email' => 'nullable|email|confirmed|unique:user,email,'.$pegawai->user->id,
                'password' => 'nullable|string|confirmed'
            ]);
        } else {
            $this->validate($pesan, [
                'email' => 'nullable|email|confirmed|unique:user,email',
                'password' => 'nullable|string|confirmed'
            ]);
        }
        
        try {
            $pegawai->update($pesan->except('_token', '_method'));

            $password = Hash::make($pesan->password);
            $check = Hash::check($pegawai->password, $password);
            
            if ($check) {
                $pesan->merge([
                    'password' => $pegawai->password
                ]);
            } else {
                $pesan->merge([
                    'password' => Hash::make($pesan->$password)
                ]);
            }

            if ($pegawai->user != NULL) {
                if (!empty($pesan->email) && !empty($pesan->email)) {
                    $pegawai->user->update([
                        'nama' => $pesan->nama,
                        'email' => $pesan->email,
                        'password' => $pesan->password
                    ]);
                }
            } else {
                if (!empty($pesan->email) && !empty($pesan->email)) {
                    $user = User::firstOrCreate([
                        'pegawai_id' => $pegawai->id,
                        'nama' => $pesan->nama,
                        'email' => $pesan->email,
                        'password' => $pesan->password
                    ]);
                }
            }

            session()->flash('success', 'Data Berhasil di-Update !');
            return redirect(route('pegawai.index'));
        } catch (\Exception $e) {
            dd($e);
            session()->flash('error', 'Terjadi Kesalahan Silahkan Hubungi Admin !');
            return redirect('pegawai.edit');
        }
    }

    public function destroy($id)
    {
        try {
            $pegawai = Pegawai::findOrFail($id);
            $pegawai->delete();

            if (isset($pegawai->user)) {
                $pegawai->user()->delete();
            }

            session()->flash('success', 'Data Berhasil di-Pulihkan !');
            return redirect(route('pegawai.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan Silahkan Hubungi Admin !');
            return redirect('pegawai.index');
        }
    }

    public function restore($id)
    {
        try {
            $pegawai = Pegawai::onlyTrashed()->findOrFail($id);
            $pegawai->restore();
            $pegawai->user()->restore();

            session()->flash('success', 'Data Berhasil di-Pulihkan !');
            return redirect(route('pegawai.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan Silahkan Hubungi Admin !');
            return redirect('pegawa.index');
        }
    }

    public function forceDelete($id)
    {
        try {
            $pegawai = Pegawai::onlyTrashed()->findOrFail($id);
            $count = $pegawai->user;
            if ($count != null) {
                $count->forceDelete();
            }
            $pegawai->forceDelete();

            session()->flash('error', 'Data Pegawai di-Hapus Permanen !');
            return redirect(route('pegawai.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan Silahkan Hubungi Admin !');
            return redirect('pegawai.index');
        }
    }
}
