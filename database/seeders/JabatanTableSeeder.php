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
                'nama' => 'Administrator',
                'deskripsi' => NULL
            ],
            [
                'nama' => 'Staff',
                'deskripsi' => NULL
            ],
            [
                'nama' => 'Front Office',
                'deskripsi' => NULL
            ],
            [
                'nama' => 'Operator',
                'deskripsi' => NULL
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
