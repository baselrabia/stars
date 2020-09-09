<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Brochure;
use Faker\Generator as Faker;

$factory->define(Brochure::class, function (Faker $faker) {
    $priority = ['on', 'off'];
    return [
        'name' => $faker->name,
        'attachment' => $faker->paragraph,
        'day' => rand(0, 10),
        'priority' => $priority[rand(0, 1)],
        'provider_id' => factory(\App\Models\Provider::class)->create()->id,
    ];
});
