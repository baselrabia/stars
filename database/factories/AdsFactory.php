<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Ads;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Ads::class, function (Faker $faker) {
    $locationTable = DB::table('Ads_location')->get()->toArray();
    $location= $locationTable[rand(0,35)]->location;
    return [
        'title'=> $faker->sentence,
        'image'=> $faker->image,
        'start_date' => Carbon::now()->addDays(rand(1, 10)),
        'end_date' => Carbon::now()->addDays(rand(15, 30)),
        'url'=> $faker->url,
        'location' => $location
    ];
});
