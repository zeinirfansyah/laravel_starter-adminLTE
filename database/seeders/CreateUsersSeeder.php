<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
               'nama'=>'User Biasa',
               'nomor_telpon'=>'08123456789',
               'alamat'=>'cibodas pasar',
               'username'=>'zein',
               'email'=>'zein@gmail.com',
               'role'=>"user",
               'password'=> bcrypt('123456'),
            ],
           
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
