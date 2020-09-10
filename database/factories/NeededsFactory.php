<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Needed;
use Faker\Generator as Faker;

$factory->define(Needed::class, function (Faker $faker) {
    $priority = ['on', 'off'];
    $type=['distributers','brokers','agents'];

    return [
        'person_name' => $faker->name,
        'type' => $type[rand(0, 2)],
        'provider_id' => factory(\App\Models\Provider::class)->create()->id,
        'priority' => $priority[rand(0, 1)],
        'image' => $faker->image,
        'summary' => $faker->paragraph,
        'requirements' => $faker->paragraph,
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'landline' =>  $faker->e164PhoneNumber,
        'location' => $faker->city,
        'link' => $faker->url,

    ];
});
