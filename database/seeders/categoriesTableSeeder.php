<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->truncate();


        DB::table('categories')->insert([
            [
                'title' => 'Web Design',
                'slug' => 'Web-Design'
            ],
            [
                'title' => 'Web Programming',
                'slug' => 'Web-Programming'
            ],
            [
                'title' => 'Internet',
                'slug' => 'internet'
            ],
            [
                'title' => 'Social Marketing',
                'slug' => 'social-marketing'
            ],
            [
                'title' => 'Photography',
                'slug' => 'photography'
            ],
        ]);

    }
}
