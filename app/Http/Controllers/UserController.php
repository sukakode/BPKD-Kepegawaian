<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStore;
use App\Http\Requests\UserUpdate;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('created_at', 'DESC')->get();
        return view('user.index', compact('user'));
    }

    public function create()
    {
        //
    }

    public function store(UserStore $pesan)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UserUpdate $pesan, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
