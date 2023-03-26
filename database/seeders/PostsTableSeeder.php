<?php

namespace Database\Seeders;

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
        for($i = 1; $i<=10; $i++){
            $image = 'Post_Image_' . rand(1, 5) . '.jpg';
            $posts []= [
                'author_id' =>rand(1,3),
                'title' => fake()->sentence(rand(8,12)),
                'excerpt' => fake()->text(),
                'body' => fake()->paragraph(rand(10,15), true),
                'slug' => fake()->slug(),
                'image' => rand(0,1) == 1? $image : null,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
