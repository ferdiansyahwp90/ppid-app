<?php

namespace Database\Seeders;

use App\Models\UserAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'nama' => 'ADMIN',
                'phone' => '12345678'
            ],
        ];

        foreach($data as $row){
            UserAdmin::create([
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
