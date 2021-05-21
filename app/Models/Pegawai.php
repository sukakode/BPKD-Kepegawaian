<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='pegawai';
    protected $fillable = [
        'user_id','nip','nik','nama','golongan','jabatan_id','pendidikan','alamat','no_hp','tahun_diangkat','tahun_menjabat'
    ];

    public function jabatan()
    {
        return $this->belongsTo('App\Models\Jabatan', 'jabatan_id', 'id')->withTrashed();
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'pegawai_id', 'id')->withTrashed();
    }
}
