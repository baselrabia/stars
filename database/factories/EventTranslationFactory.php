<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EventTranslation;
use Faker\Generator as Faker;

$factory->define(EventTranslation::class, function (Faker $faker) {
    $event = factory(\App\Models\Event::class)->create();

    return [
        'name' => $event->name,
        'event_id' =>  $event->id,
        'description' => $faker->paragraph,
        'locale' => 'en',
    ];
});
