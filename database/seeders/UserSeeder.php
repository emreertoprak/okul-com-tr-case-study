<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make('password'),
            'date_of_birth' => $faker->dateTimeBetween('-40 years', '-18 years'),
            'phone_number' => $faker->phoneNumber,
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach (range(1, 20) as $index) {
            DB::table('users')->insert([
                'name' => $faker->firstName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'date_of_birth' => $faker->dateTimeBetween('-40 years', '-18 years'),
                'phone_number' => $faker->phoneNumber,
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
