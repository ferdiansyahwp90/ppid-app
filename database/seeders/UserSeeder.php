<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'email' => 'admin@ppid.com',
                'password' => Hash::make('admin,ppid'),
                'role_id' => 1
            ],
            [
                'email' => 'pemohon@ppid.com',
                'password' => Hash::make('pemohon'),
                'role_id' => 2
            ],
        ];

        foreach($data as $row){
            User::create([
                'email' => $row['email'],
                'password' => $row['password'],
                'role_id' => $row['role_id'],
                'status' => 'active',
                'image' => null,
            ]);
        }
    }
}
