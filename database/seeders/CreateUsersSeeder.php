<?php

namespace Database\Seeders;

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
               'nama'=>'Admin User',
               'email'=>'',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
           
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
