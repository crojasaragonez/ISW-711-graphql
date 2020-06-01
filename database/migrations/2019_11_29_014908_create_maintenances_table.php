<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('date')->useCurrent();
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('mechanical_workshop_id');
            $table->unsignedBigInteger('maintenance_type_id');
            $table->timestamps();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('mechanical_workshop_id')->references('id')->on('mechanical_workshops');
            $table->foreign('maintenance_type_id')->references('id')->on('maintenance_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenances');
    }
}
