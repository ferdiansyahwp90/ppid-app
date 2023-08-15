<?php

namespace Database\Seeders;

use App\Models\UserPemohon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPemohonSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 2,
                'nama' => 'Pemohon',
                'phone' => '12345678'
            ]
        ];
    
        foreach($data as $row){
            UserPemohon::create([
                'user_id' => $row['user_id'],
                'nama' => $row['nama'],
                'phone' => $row['phone'],
                'identity_photo' => null, 
                'driver_license' => null, 
                'selfie_photo' => null
            ]);
        }
    }
}
