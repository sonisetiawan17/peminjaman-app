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
                'nama_instansi' => 'Bappenda'
            ],
            [
                'nama_instansi' => 'DPMPTSP'
            ],
            [
                'nama_instansi' => 'Disdukcapil'
            ]
        ];

        Instansi::insert($instansi);
    }
}
