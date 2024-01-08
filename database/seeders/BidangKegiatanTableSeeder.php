<?php

namespace Database\Seeders;

use App\Models\BidangKegiatan;
use Illuminate\Database\Seeder;

class BidangKegiatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bidang = [
            [
                'nama_bidang' => 'Bidang 1'
            ],
            [
                'nama_bidang' => 'Bidang 2'
            ],
            [
                'nama_bidang' => 'Bidang 3'
            ]
        ];

        BidangKegiatan::insert($bidang);
    }
}
