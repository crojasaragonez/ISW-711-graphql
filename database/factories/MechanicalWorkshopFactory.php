<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MechanicalWorkshop;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(MechanicalWorkshop::class, function (Faker $faker) {
    return [
        'legal_id' => Str::random(10),
        'name' => $faker->company,
        'address' => $faker->address,
        'logo' => $faker->imageUrl(800, 600, 'cats'),
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->email,
        'zip_code' => $faker->postcode
    ];
});
