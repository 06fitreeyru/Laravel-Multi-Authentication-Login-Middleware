<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'Admin',
                'password' => Hash::make('super_admin'),
                'f_name' => 'Admin_Super',
                'l_name' => 'Neverdie',
                'genders' => 'male',
                'role_id' => 1,
            ],
        ]);
        $faker = Faker::create();
        for ($i = 2; $i < 10; $i++) {
            $user = new User();
            $user->username = $faker->unique()->userName;
            $user->password = Hash::make('password');
            $user->f_name = $faker->firstName;
            $user->l_name = $faker->lastName;
            $user->genders = $faker->randomElement(['male', 'female']);
            $user->role_id = rand(1, 2); // 1 for admin, 2 for employee
            $user->save();
        }
    }
}
