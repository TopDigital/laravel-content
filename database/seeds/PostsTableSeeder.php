<?php

namespace TopDigital\Content\Seeders;

use Illuminate\Database\Seeder;
use TopDigital\Content\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++){
            factory(Post::class)->create();
        }
    }
}
