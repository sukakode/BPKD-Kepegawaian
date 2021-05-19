<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.index');
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
            'jabatan' => 'required|numeric|exsit:jabatan,id',
            'pendidikan' => 'required|string|max:5',
            'alamat' => 'required|string',
            'no_hp' => 'required|numeric|max:14',
            'tahun_diangkat' => 'required|date',
            'tahun_menjabat' => 'required|date',
            'email' => 'required|email|confirmed',
            'password' => 'required|string|confirmed'
        ]);

        try {
            $tambah = Pegawai::firstOrCreate([

            ]);
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
