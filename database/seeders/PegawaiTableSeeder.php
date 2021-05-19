<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PegawaiTableSeeder extends Seeder
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
                'nip' => '201105200201031023',
                'nik' => '2011022020033879',
                'nama' => 'Gilang Romadlona',
                'golongan' => '3B',
                'jabatan_id' => '1',
                'pendidikan' => 'SMK',
                'alamat' => 'Jln.Ciaul Pasir',
                'no_hp' => '085890808080',
                'tahun_diangkat' => Carbon::now(),
                'tahun_menjabat' => Carbon::now()
            ],
            [
                'nip' => '202105200201031023',
                'nik' => '2020022020033879',
                'nama' => 'Maesaraga Kelana',
                'golongan' => '2A',
                'jabatan_id' => '1',
                'pendidikan' => 'SMK',
                'alamat' => 'Jln.Cikiray Kidul Kecamatan cisaat Desa Sukamanah',
                'no_hp' => '0811115890',
                'tahun_diangkat' => Carbon::now(),
                'tahun_menjabat' => Carbon::now()
            ],
        ];
        
        try {
            foreach ($data as $key => $value) {
                $user = Pegawai::firstOrCreate($value);
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
