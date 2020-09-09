<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $prefix = ['Mr', 'Ms'];
    $type = ['user', 'admin', 'provider'];
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'mobile' => $faker->e164PhoneNumber,
        'prefix' => $prefix[rand(0, 1)],
        'lng' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
        'lat' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
        'type' => $type[2],
    ];
});
