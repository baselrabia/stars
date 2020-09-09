<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BusinessType;
use Faker\Generator as Faker;

$factory->define(BusinessType::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'status'=> true,
    ];
});
