<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $parent_id= [null,1,2,3];
    return [
        'name' => $faker->name,
        'status' => true,
        'description' =>$faker->paragraph,
        'parent_id' => $parent_id[rand(0,2)],
    ];
});
