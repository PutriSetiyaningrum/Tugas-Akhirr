<?php

namespace Database\Seeders;

use App\Models\Pelatih;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelatihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelatih::create([
            'user_id' => 3,
            'sekolah' => 'SMAN 1 INDRAMAYU',
        ]);
    }
}
