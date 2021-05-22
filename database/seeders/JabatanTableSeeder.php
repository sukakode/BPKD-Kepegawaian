<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanTableSeeder extends Seeder
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
                'nama' => 'Admin',
                'deskripsi' => ''
            ],
            [
                'nama' => 'Staff',
                'deskripsi' => ''
            ],
            [
                'nama' => 'FO',
                'deskripsi' => ''
            ],
            [
                'nama' => 'Operator',
                'deskripsi' => ''
            ],
        ];

        try {
            foreach ($data as $key => $value) {
                $user = Jabatan::firstOrCreate($value);
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
