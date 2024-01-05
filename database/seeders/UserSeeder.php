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
            ['id' => 21, 'name' => 'hungha2002', 'email' => 'hungtmt01@gmail.com', 'password' => '123456', 'phone_number' => '0393460259', 'created_at' => '2023-12-25 15:47:05', 'role_id' => 2],
            ['id' => 22, 'name' => 'hungha2909', 'email' => 'hungtmt02@gmail.com', 'password' => '123456', 'phone_number' => '0393460259', 'created_at' => '2023-12-25 15:47:05', 'role_id' => 2],
            ['id' => 23, 'name' => 'hungha2003', 'email' => 'hungtmt03@gmail.com', 'password' => '123456', 'phone_number' => '0123456789', 'created_at' => '2023-12-25 15:47:05', 'role_id' => 2],
            ['id' => 24, 'name' => 'hungha2004', 'email' => 'hungtmt04@gmail.com', 'password' => '123456', 'phone_number' => '0123456789', 'created_at' => '2023-12-25 15:47:05', 'role_id' => 1],
            ['id' => 25, 'name' => 'hungha2004', 'email' => 'hungtmt05@gmail.com', 'password' => '123456', 'phone_number' => '0123456789', 'created_at' => '2023-12-25 15:47:05', 'role_id' => 1],
        ]);
    }
}
