<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $data = Jabatan::orderBy('nama','ASC')->get();
        return view('jabatan.index', compact('data'));
    }

    public function create()
    {
        return view('jabatan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:35',
            'deskripsi' => 'nullable|string|max:100'
        ]);
        
        try {
            $tambah = Jabatan::firstOrCreate([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi
            ]);
            return redirect(route('jabatan.index'));
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        try {
            $jabatan = Jabatan::findOrFail($id);
            return view('jabatan.edit', compact('jabatan'));
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:35',
            'deskripsi' => 'nullable|string|max:100'
        ]);

        try {
            $jabatan = Jabatan::findOrFail($id);
            $jabatan->update($request->except('_token', '_method'));

            return redirect(route('jabatan.index'));
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function destroy($id)
    {
        try {
            $jabatan = Jabatan::findOrFail($id);
            $jabatan->delete();

            return redirect(route('jabatan.index'));
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
