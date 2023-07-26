<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $galeri = [
            [
                'name' => "logo1",
                'deskripsi' => "logo-ppid",
                'tanggal' => "2023-07-25",
                'photo' => "assets/img/logo.jpg",
            ],
            [
                'name' => "logo2",
                'deskripsi' => "logo-ppid",
                'tanggal' => "2023-07-25",
                'photo' => "assets/img/logo.jpg",
            ],
        ];
        DB::table('galeri')->insert($galeri);
    }
}
