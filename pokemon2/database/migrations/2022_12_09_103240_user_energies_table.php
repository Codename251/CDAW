<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserEnergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userEnergies', function (Blueprint $table) {

            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('energy_id');
            $table->foreign('energy_id')->references('id')->on('energy');

           

            $table->primary(['user_id', 'energy_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userEnergies');
    }
}
