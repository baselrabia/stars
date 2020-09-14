<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $priority = ['on', 'off'];
    $unit= ['g','Kg','Tone'];
    $type = ['machine', 'tool'];
    $location = ['home', 'market'];
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'category_id' => factory(\App\Models\Category::class)->create()->id,
        'price_per_item' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1, $max = 10),
        'price_lot_from' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 10, $max = 50),
        'price_lot_to' => $faker->randomFloat($nbMaxDecimals = NULL, $min =50, $max = 100),
        'minimum_order'=> rand(0, 10),
        'unit' => $unit[rand(0, 1)],
        'attachment' => null,
        'type' => $type[rand(0, 1)],
        'available' => true,
        'provider_id' => factory(\App\Models\Provider::class)->create()->id,
        'priority' => $priority[rand(0, 1)],
        'video' => $faker->url,
        'status' => true,
        'location' => $location[rand(0, 1)],
    ];
});


