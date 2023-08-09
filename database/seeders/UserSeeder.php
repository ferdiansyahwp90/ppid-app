<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'notelp' => '085856004598',
                'alamat' => 'Jl. Raya Panglima Sudirman',
                'foto' => 'admin/assets/img/profile-img.jpg',
                'role' => 'admin',
                'created_at' => now(),
            ],
            [
                'name' => 'Pemohon',
                'email' => 'pemohon@gmail.com',
                'password' => bcrypt('pemohon'),
                'notelp' => '08987654321',
                'alamat' => 'Jl. Raya Kidul',
                'foto' => 'admin/assets/img/profile-img.jpg',
                'role' => 'pemohon',
                'created_at' => now(),
            ],
        ]);
    }
}
