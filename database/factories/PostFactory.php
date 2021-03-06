<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\TopDigital\Content\Models\Post::class, function (Faker $faker) {
    $user = \TopDigital\Auth\Models\User::all()->random();
    $section = \TopDigital\Content\Models\Section::all()->random();

    return [
        'author_id' => $user->id,
        'section_id' => $section->id,
        'slug' => $faker->slug,
        'title' => $faker->sentence,
        'content' => $faker->paragraphs(3, true),
    ];
});
