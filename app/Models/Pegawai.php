<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id','nip','nik','nama','golongan','jabatan_id','pendidikan','alamat','no_hp','tahun_diangkat','tahun_menjabat'
    ];
}
