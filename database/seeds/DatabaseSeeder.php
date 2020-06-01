<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            VehiclesTableSeeder::class,
            MechanicalWorkshopsTableSeeder::class,
            MaintenancesTableSeeder::class,
            ReviewsTableSeeder::class,
        ]);
    }
}
