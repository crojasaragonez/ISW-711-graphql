<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Maintenance;
use App\Vehicle;
use App\MechanicalWorkshop;
use App\MaintenanceType;
use Faker\Generator as Faker;

$factory->define(Maintenance::class, function (Faker $faker) {
    $max_vehicle_id = Vehicle::max('id');
    $max_mechanical_workshop_id = MechanicalWorkshop::max('id');
    $max_maintenance_type_id = MaintenanceType::max('id');
    return [
        'date' => $faker->date('Y-m-d', 'now'),
        'vehicle_id' => $faker->numberBetween(1, $max_vehicle_id),
        'mechanical_workshop_id' => $faker->numberBetween(1, $max_mechanical_workshop_id),
        'maintenance_type_id' => $faker->numberBetween(1, $max_maintenance_type_id)
    ];
});
