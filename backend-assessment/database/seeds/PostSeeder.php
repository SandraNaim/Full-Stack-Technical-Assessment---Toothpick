<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('posts')->insert([
        //     'title' => Str::random(10),
        //     'description' => Str::random(10),
        // ]);

        factory(Post::class,10)->create();
    }
}
