<?php

namespace TopDigital\Content\Seeders;

use Illuminate\Database\Seeder;
use TopDigital\Content\Models\Post;
use TopDigital\Content\Models\Section;

class SectionsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Section::class)->create([
            'name' => 'Статика'
        ]);
        factory(Section::class)->create([
            'name' => 'Блог'
        ]);
        factory(Section::class)->create([
            'name' => 'Статьи'
        ]);
        factory(Section::class)->create([
            'name' => 'Мероприятия'
        ]);
    }
}
