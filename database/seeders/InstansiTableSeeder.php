<?php

namespace Database\Seeders;

use App\Models\Instansi;
use Illuminate\Database\Seeder;

class InstansiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instansi = [
            [
                'nama_instansi' => 'Bappenda',
                'alamat_instansi' => 'Cimahi'
            ],
            [
                'nama_instansi' => 'DPMPTSP',
                'alamat_instansi' => 'Cimahi'
            ],
            [
                'nama_instansi' => 'Disdukcapil',
                'alamat_instansi' => 'Cimahi'
            ]
        ];

        Instansi::insert($instansi);
    }
}
