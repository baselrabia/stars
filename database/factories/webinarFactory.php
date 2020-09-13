<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Webinar;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Webinar::class, function (Faker $faker) {
    $type = ['public','private'];

    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'summary' => $faker->paragraph,
        'host' => $faker->paragraph,
        'type'=> $type[rand(0,1)],
        'provider_id' => factory(\App\Models\Provider::class)->create()->id,
        'link' => $faker->url,
        'date'=> Carbon::now()->addDays(rand(1, 10)),
        'time' => mt_rand(0, 23) . ":" . str_pad(mt_rand(0, 59), 2, "0", STR_PAD_LEFT),
        'country' => rand(1, 244),
        'logo' => $faker->image,
    ];
});
