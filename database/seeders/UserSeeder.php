<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

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
                'level' => 'admin',
                'foto' => 'admin/assets/img/profile-img.jpg',
                'notelp' => '085856004598',
                'alamat' => 'Jl. Raya Panglima Sudirman',
                'created_at' => now(),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345678'),
                'level' => 'pemohon',
                'foto' => 'admin/assets/img/profile-img.jpg',
                'notelp' => '08987654321',
                'alamat' => 'Jl. Raya Kidul',
                'created_at' => now(),
            ],
        ]);
    }
}
