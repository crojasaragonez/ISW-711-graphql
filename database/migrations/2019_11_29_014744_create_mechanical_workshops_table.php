<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMechanicalWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechanical_workshops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('legal_id')->unique();
            $table->string('name');
            $table->text('address')->nullable();
            $table->string('logo')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->string('phone_number');
            $table->string('email');
            $table->string('zip_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mechanical_workshops');
    }
}
