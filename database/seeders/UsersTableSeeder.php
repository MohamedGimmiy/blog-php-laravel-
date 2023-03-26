<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'm@yahoo.com',
                'password' => Hash::make('asd12345')
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jk@yahoo.com',
                'password' => Hash::make('asd12345')
            ],
            [
                'name' => 'Mohamed Gamal',
                'email' => 'mg@yahoo.com',
                'password' => Hash::make('asd12345')
            ]
            ]);
    }
}
