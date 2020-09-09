<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    $priority = ['on', 'off'];
    return [
        'user_id' => factory(\App\User::class)->create()->id,
        'businessType_id' => factory(\App\Models\BusinessType::class)->create()->id,
        'company_fullname' => $faker->name,
        'company_name_ar' => $faker->name,
        'company_short_name' => $faker->name,
        'number_of_employees' => 15,
        'priority' => $priority[rand(0,1)],
        'video' => $faker->url,
        'status' => true,
        'logo' => $faker->image,
    ];
});
