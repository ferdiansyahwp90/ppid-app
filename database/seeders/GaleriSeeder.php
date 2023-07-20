<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = [
            [
                'name_galeri' => "logo",
                'deskripsi' => "logo-ppid",
                'photo' => "assets/img/logo.jpg",
            ]
        ];
    }
}
