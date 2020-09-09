<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BusinessTypeTranslation;
use Faker\Generator as Faker;

$factory->define(BusinessTypeTranslation::class, function (Faker $faker) {
    $businessType = factory(\App\Models\BusinessType::class)->create();
    return [
        'name' => $businessType->name,
        'business_type_id' =>  $businessType->id,
        'description' => $faker->paragraph,
        'locale'=> 'en',
    ];
});
