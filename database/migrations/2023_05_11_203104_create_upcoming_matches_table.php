<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upcoming_matches', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('stadium')->nullable();
            $table->unsignedBigInteger('first_team_id');
            $table->unsignedBigInteger('second_team_id');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('upcoming_matches');
    }
};
