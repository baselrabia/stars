<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 20),
        'content' => $faker->paragraph,
        'like' => rand(1,30),
        'image' => $faker->image,
    ];
});
