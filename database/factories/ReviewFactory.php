<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use App\MechanicalWorkshop;
use App\User;
use App\Maintenance;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    $max_mechanical_workshop_id = MechanicalWorkshop::max('id');
    $max_maintenance_id = Maintenance::max('id');
    return [
        'date' => $faker->date('Y-m-d', 'now'),
        'score' => $faker->numberBetween(1, 5),
        'description' => $faker->realText(200, 2),
        'mechanical_workshop_id' => $faker->numberBetween(1, $max_mechanical_workshop_id),
        'maintenance_id' => $faker->numberBetween(1, $max_maintenance_id),
    ];
});
