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
                'nama_instansi' => 'Instansi 1'
            ],
            [
                'nama_instansi' => 'Instansi 2'
            ],
            [
                'nama_instansi' => 'Instansi 3'
            ]
        ];

        Instansi::insert($instansi);
    }
}
