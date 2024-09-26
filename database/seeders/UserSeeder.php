<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // melakukan seeder pada database 10x
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                "name" => "John Doe",
                "age" => 35,
                "job_title" => "IT Programming",
                "company" => "PT Maha Akbar Sejahtera",
            ]);
        }
    }
}
