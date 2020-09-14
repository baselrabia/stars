<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\NewReport;
use Faker\Generator as Faker;

$factory->define(NewReport::class, function (Faker $faker) {
    $priority = ['on', 'off'];
    $title = $faker->sentence;
    return [
        'category_new_report_id' => rand(1,5),
        'title' => $title,
        'slug' =>  \Str::slug($title),

        'content' => $faker->paragraph,
        'image' => $faker->image,
        'priority' => $priority[rand(0, 1)],

    ];
});
