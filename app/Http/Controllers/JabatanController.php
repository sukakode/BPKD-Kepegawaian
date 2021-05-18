<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $data = Jabatan::orderBy('nama','DESC')->get();
        return view('jabatan.index', compact('data'));
    }

    public function create()
    {
        return view('jabatan.create');
    }

    public function store(Request $request)
    {
        try {
            $tambah = Jabatan::firstOrCreate([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi
            ]);
            dd("OK DATA TERINPUT !");
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function show($id)
    {
        
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
