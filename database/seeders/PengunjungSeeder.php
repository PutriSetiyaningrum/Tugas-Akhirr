<?php

namespace Database\Seeders;

use App\Models\Pengunjung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengunjungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengunjung::create([
            'user_id' => 4,
            'alamat' => 'Bandung',
            'telepon' => '081320391830',
        ]);
    }
}
