<?php

use Illuminate\Database\Seeder;

class MechanicalWorkshopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MechanicalWorkshop::class, 100)->create();
    }
}
