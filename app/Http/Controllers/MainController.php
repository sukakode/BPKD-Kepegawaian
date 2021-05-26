<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pegawai = Pegawai::orderBy('created_at', 'DESC')->withTrashed()->get();
        $jabatan = Jabatan::orderBy('created_at', 'DESC')->get();
        
        return view('main', compact('pegawai','jabatan'));
    }
}
