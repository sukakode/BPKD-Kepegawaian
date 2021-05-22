<?php

namespace App\Http\Requests;

use App\Models\Pegawai;
use Illuminate\Foundation\Http\FormRequest;

class PegawaiUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Pegawai $model)
    {
        return [
            'nip' => 'required|numeric|digits:18|unique:pegawai,nip,'.$model->id,
            'nik' => 'required|numeric|digits:16|unique:pegawai,nik,'.$model->id,
            'nama' => 'required|string|max:35',
            'golongan' => 'required|string|max:5',
            'jabatan_id' => 'required|numeric|exists:jabatan,id',
            'pendidikan' => 'required|string|max:5',
            'alamat' => 'required|string',
            'no_hp' => 'required|numeric|digits_between:0,14',
            'tahun_diangkat' => 'required|date',
            'tahun_menjabat' => 'required|date',
            'email' => 'required|email|confirmed|unique:user,email,'.$model->user->id,
            'password' => 'nullable|string|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong !',
            'string' => 'Format isian harus berupa String !',
            'numeric' => 'Format harus berupa angka !',
            'digits_between'=> ':attribute tidak boleh lebih dari :digits_between digit !',
            'unique' => ':attribute data tersebut sudah ada !',
            'max' => ':attribute tidak lebih dari :max karakter !',
            'exists' => ':attribute data tidak sesuai !',
            'confirmed' => ':attribute konfirmasi salah !'
        ];
    }

    public function attributes()
    {
        return [
            'nip' => 'NIP Pengguna ',
            'nik' => 'NIK Pengguna',
            'nama' => 'Nama Pengguna',
            'golongan' => 'Golongan Pengguna',
            'jabatan_id' => 'Jabatan Pengguna',
            'pendidikan' => 'Pendidikan Pengguna',
            'alamat' => 'Alamat Pengguna',
            'no_hp' => 'Nomor Telepon Pengguna',
            'tahun_diangkat' => 'Tahun Diangkat Pengguna',
            'tahun_menjabat' => 'Tahun Diangkat Pengguna',
            'email' => 'Email Pengguna',
            'password' => 'Password Pengguna'
        ];
    }
}
