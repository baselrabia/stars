<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\ProductAttribute;
use Faker\Generator as Faker;

$factory->define(ProductAttribute::class, function (Faker $faker) {
    static $number = 1;
    return [
        'brand' => $faker->word ,
        'size' => $faker->word,
        'shape' => $faker->word,
        'product_id' =>  $number++,
        'unit_length' =>  rand(1, 30),
        'number_of_certificates' =>  rand(1, 30),
        'payment_term' => $faker->word,
        'delivery_term' => $faker->word,
        'delivery_date' => $faker->word,
        'delivery_location' => rand(1, 30),
        'shipment_location' => rand(1, 30),
        'place_of_origin' => rand(1, 30),
        'in_stock' => '1',

    ];
});
