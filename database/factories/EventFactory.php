<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use Carbon\Carbon;
use Faker\Generator as Faker;


$factory->define(Event::class, function (Faker $faker) {
    $type = ['exhibition','conference','workshop'];
    return [
        'name' => $faker->name .' Event',
        'description' => $faker->paragraph,
        'provider_id' => factory(\App\Models\Provider::class)->create()->id,
        'type' => $type[rand(0, 2)],
        'start_date' => Carbon::now()->addDays(rand(1, 10)),
        'end_date' => Carbon::now()->addDays(rand(15,30)),
        'time' => mt_rand(0, 23) . ":" . str_pad(mt_rand(0, 59), 2, "0", STR_PAD_LEFT),
        'lat' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
        'lng' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
        'video' => $faker->url,
        'link' => $faker->url,
        'priority' => 'off',
    ];
});
