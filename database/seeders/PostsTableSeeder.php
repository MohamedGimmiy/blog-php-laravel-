<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->truncate();
        $posts = [];
        $date = Carbon::create(2023,2,5,10);
        for($i = 1; $i<=10; $i++){

            $image = 'Post_Image_' . rand(1, 5) . '.jpg';
            $pub = $date->addHours(rand(1,20))->addDays(rand(1,20));
            $posts []= [
                'author_id' =>rand(1,3),
                'title' => fake()->sentence(rand(8,12)),
                'excerpt' => fake()->text(),
                'body' => fake()->paragraph(rand(10,15), true),
                'slug' => fake()->slug(),
                'image' => rand(0,1) == 1? $image : null,
                'category_id' => rand(1,5),
                'created_at' => $pub,
                'updated_at' => $pub,
                'published_at' => rand(0,1) == 0? null :$date->addDays($i + rand(4,10))
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
