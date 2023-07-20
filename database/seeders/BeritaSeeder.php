<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
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
                'name_berita' => "logo",
                'description' => "berita logo-ppid",
                'photo' => "assets/img/logo.jpg",
            ]
        ];
    }
}
