<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vehicle;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Vehicle::class, function (Faker $faker) {
    $max_id = User::max('id');
    return [
        'vin' => Str::random(10),
        'plate_number' => Str::random(10),
        'color' => $faker->colorName,
        'manufacturer' => $faker->randomElement(['Toyota', 'Nissan', 'Suzuki', 'BMW', 'Mercedes Benz']),
        'model' => Str::random(10),
        'transmission' => $faker->randomElement(['Manual', 'Automatic']),
        'body_type' => $faker->randomElement(['Hatchback', 'Sedan', 'SUV', 'Crossover', 'MUV', 'Coupe', 'Convertible']),
        'mileage' => $faker->randomNumber,
        'year' => $faker->year($max = 'now'),
        'user_id' => $faker->numberBetween(1, $max_id)
    ];
});
