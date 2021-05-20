<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::orderBy('created_at', 'DESC')->get();
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $jabatan = Jabatan::orderBy('nama', 'ASC')->get();
        return view('pegawai.create', compact('jabatan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|numeric|digits:18|unique:pegawai,nip',
            'nik' => 'required|numeric|digits:16|unique:pegawai,nik',
            'nama' => 'required|string|max:35',
            'golongan' => 'required|string|max:5',
            'jabatan_id' => 'required|numeric|exists:jabatan,id',
            'pendidikan' => 'required|string|max:5',
            'alamat' => 'required|string',
            'no_hp' => 'required|numeric|digits_between:0,14',
            'tahun_diangkat' => 'required|date',
            'tahun_menjabat' => 'required|date',
            'email' => 'required|email|confirmed|unique:user,email',
            'password' => 'required|string|confirmed'
        ]);

        try {
            $pegawai = Pegawai::firstOrCreate([
                'nip' => $request->nip,
                'nik' => $request->nik,
                'nama' => $request->nama,
                'golongan' => $request->golongan,
                'jabatan_id' => $request->jabatan_id,
                'pendidikan' => $request->pendidikan,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'tahun_diangkat' => $request->tahun_diangkat,
                'tahun_menjabat' => $request->tahun_menjabat
            ]);

            $user = User::firstOrCreate([
                'pegawai_id' => $pegawai->id,
                'nama'  => $pegawai->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return redirect(route('pegawai.index'));
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try {
            $pegawai = Pegawai::findOrFail($id);
            $jabatan = Jabatan::orderBy('nama', 'ASC')->get();
            return view('pegawai.edit', compact('pegawai', 'jabatan'));
        } catch (\Exception $e) {
            dd($e);
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

            return redirect(route('pegawai.index'));
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function destroy($id)
    {
        try {
            $pegawai = Pegawai::findOrFail($id);
            $pegawai->delete();

            return redirect(route('pegawai.index'));
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
