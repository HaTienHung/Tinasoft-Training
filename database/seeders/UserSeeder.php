<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'hungha2002', 'email' => 'hungtmt1102@gmail.com', 'password' => '123456', 'phone_number' => '0387768880', 'created_at' => '2023-12-25 15:47:05'],
            ['id' => 2, 'name' => 'hungha2909', 'email' => 'hungtmt1103@gmail.com', 'password' => '123456', 'phone_number' => '0387768880', 'created_at' => '2023-12-25 15:47:05'],
            ['id' => 3, 'name' => 'hungha2003', 'email' => 'hungtmt1104@gmail.com', 'password' => '123456', 'phone_number' => '0387768880', 'created_at' => '2023-12-25 15:47:05'],
            ['id' => 4, 'name' => 'hungha2004', 'email' => 'hungtmt1105@gmail.com', 'password' => '123456', 'phone_number' => '0387768880', 'created_at' => '2023-12-25 15:47:05'],
        ]);
    }
}
