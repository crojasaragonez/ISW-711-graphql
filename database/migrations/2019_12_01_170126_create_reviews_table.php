<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('date')->useCurrent();
            $table->integer('score');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('mechanical_workshop_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('maintenance_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('mechanical_workshop_id')->references('id')->on('mechanical_workshops');
            $table->foreign('maintenance_id')->references('id')->on('maintenances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
