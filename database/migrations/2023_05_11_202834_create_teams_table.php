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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en')->unique();
            $table->string('slug');
            $table->string('logo')->nullable();
            $table->string('cover')->nullable();
            $table->string('year_founded')->nullable();
            $table->string('manager')->nullable();
            $table->string('nickname')->nullable();
            $table->string('stadium')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedInteger('points')->default(0);
            $table->unsignedInteger('matches_no')->default(0);
            $table->json('social_links')->nullable();
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
        Schema::dropIfExists('teams');
    }
};
