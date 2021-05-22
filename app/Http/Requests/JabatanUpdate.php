<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JabatanUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:35',
            'deskripsi' => 'nullable|string|max:100'
        ];
    }
    
    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong !',
            'string' => 'Format isian harus berupa String !'
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama Jabatan',
            'deskripsi' => 'Deskripsi Jabatan'
        ];
    }
}
