<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $berita = [
            [
                'name' => "logo1",
                'deskripsi' => "logo-ppid",
                'tanggal' => "2023-07-25",
                'photo' => "assets/img/logo.jpg",
                'link' => "https://probolinggokab.go.id/",
            ],
            [
                'name' => "logo2",
                'deskripsi' => "logo-ppid",
                'tanggal' => "2023-07-25",
                'photo' => "assets/img/logo.jpg",
                'link' => "https://probolinggokab.go.id/",
            ],
        ];
        DB::table('berita')->insert($berita);
    }
}
