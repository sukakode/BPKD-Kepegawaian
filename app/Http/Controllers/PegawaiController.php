<?php

namespace App\Http\Controllers;

use App\Http\Requests\PegawaiStore;
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

            $user = User::firstOrCreate([
                'pegawai_id' => $pegawai->id,
                'nama'  => $pegawai->nama,
                'email' => $pesan->email,
                'password' => Hash::make($pesan->password)
            ]);

            session()->flash('success', 'Data Pegawai Baru Telah di-Tambahkan !');
            return redirect(route('pegawai.index'));
        } catch (\Exception $e) {
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

    public function update(Request $request, Pegawai $pegawai)
    {
        $this->validate($request, [
            'nip' => 'required|numeric|digits:18|unique:pegawai,nip,'.$pegawai->id,
            'nik' => 'required|numeric|digits:16|unique:pegawai,nik,'.$pegawai->id,
            'nama' => 'required|string|max:35',
            'golongan' => 'required|string|max:5',
            'jabatan_id' => 'required|numeric|exists:jabatan,id',
            'pendidikan' => 'required|string|max:5',
            'alamat' => 'required|string',
            'no_hp' => 'required|numeric|digits_between:0,14',
            'tahun_diangkat' => 'required|date',
            'tahun_menjabat' => 'required|date',
            'email' => 'required|email|confirmed|unique:user,email,'.$pegawai->user->id,
            'password' => 'nullable|string|confirmed'
        ]);

        try {
            $pegawai->update($request->except('_token', '_method'));

            $password = Hash::make($request->password);
            $check = Hash::check($pegawai->password, $password);
            
            if ($check) {
                $request->merge([
                    'password' => $pegawai->password
                ]);
            } else {
                $request->merge([
                    'password' => Hash::make($request->$password)
                ]);
            }

            $pegawai->user->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $request->password
            ]);

            session()->flash('success', 'Data Berhasil di-Update !');
            return redirect(route('pegawai.edit'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi Kesalahan Silahkan Hubungi Admin !');
            return redirect('pegawai.edit');
        }
    }

    public function destroy($id)
    {
        try {
            $pegawai = Pegawai::findOrFail($id);
            $pegawai->delete();
            $pegawai->user()->delete();

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
