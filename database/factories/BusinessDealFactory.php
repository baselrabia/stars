<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BusinessDeal;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(BusinessDeal::class, function (Faker $faker) {
    $type = ['tender', 'auction', 'project'];
    $priority = ['on', 'off'];
    return [
        'name'=> $faker->name,
        'description' => $faker->paragraph,
        'type'=>  $type[rand(0, 2)],
        'lat'=> $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
        'lng'=>  $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
        'provider_id'=> factory(\App\Models\Provider::class)->create()->id,
        'priority' => $priority[rand(0, 1)],
        'envelope_opening'=> Carbon::now()->addDays(rand(5, 10)),
        'publication_date'=>  Carbon::now()->addDays(rand(1, 5)),
        'time'=> mt_rand(0, 23) . ":" . str_pad(mt_rand(0, 59), 2, "0", STR_PAD_LEFT),
        'end'=> Carbon::now()->addDays(rand(15, 30)),
        'begin'=> Carbon::now()->addDays(rand(1, 10)) ,
        'video' => $faker->url,
        'attachment' => $faker->paragraph,

    ];
});
