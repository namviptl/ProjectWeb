<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('posts')->insert([
        //     'slug' => Str::random(10),
        //     'title' => Str::random(50),
        //     'content' => Str::random(200),
            
        // ]);
        Post::factory()->count(100)->create();
    }
}
