<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='jabatan';
    protected $fillable = [
        'nama','deskripsi'
    ];

    public function pegawai()
    {
        return $this->hasMany('App\Models\Pegawai', 'jabatan_id', 'id');
    }
}
