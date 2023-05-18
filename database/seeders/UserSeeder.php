<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Pengurus',
            'level' => 'pengurus',
            'email' => 'pengurus@gmail.com',
            'password' => bcrypt('pengurus123'),
        ]);

        User::create([
            'name' => 'panitia',
            'level' => 'panitia',
            'email' => 'panitia@gmail.com',
            'password' => bcrypt('panitia123'),
        ]);

        User::create([
            'name' => 'Pelatih',
            'level' => 'pelatih',
            'email' => 'pelatih@gmail.com',
            'password' => bcrypt('pelatih123'),
        ]);

        User::create([
            'name' => 'Pengunjung',
            'level' => 'pengunjung',
            'email' => 'pengunjung@gmail.com',
            'password' => bcrypt('pengunjung123'),
        ]);
    }
}
