<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $faker = Faker::create();

       for ($i = 0; $i < 15; $i++) {
        DB::table('users')->insert([
                'nama_user'=>$faker->name(),
                'nomor_telpon'=>$faker->phoneNumber(),
                'alamat'=>$faker->address(),
                'username'=>$faker->userName(),
                'email'=>$faker->email(),
                // role randomly set user, admin, manager
                'role'=>$faker->randomElement(['user', 'admin', 'manager']),
                'password'=> bcrypt('password123'),
            ]);
       }
       
    }
}
