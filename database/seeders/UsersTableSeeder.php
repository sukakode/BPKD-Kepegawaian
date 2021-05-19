<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'pegawai_id' => '1',
                'nama' => 'Me Gilang R',
                'email' => 'megilangr1@mail.com',
                'password' => Hash::make('nanozero1'),
            ],
            [
                'pegawai_id' => '2',
                'nama' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin'),
            ],
        ];

        try {
            foreach ($data as $key => $value) {
                $user = User::firstOrCreate($value);
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
