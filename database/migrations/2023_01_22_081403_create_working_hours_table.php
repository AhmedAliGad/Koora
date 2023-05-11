<?php

use App\Models\WorkingHour;
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
        Schema::create('working_hours', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->time('from');
            $table->time('to');
            $table->boolean('is_vacation')->default(false);
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
        WorkingHour::create(['day' => 'Saturday', 'from' => '08:00:00', 'to' => '22:00:00']);
        WorkingHour::create(['day' => 'Sunday', 'from' => '08:00:00', 'to' => '22:00:00']);
        WorkingHour::create(['day' => 'Monday', 'from' => '08:00:00', 'to' => '22:00:00']);
        WorkingHour::create(['day' => 'Tuesday', 'from' => '08:00:00', 'to' => '22:00:00']);
        WorkingHour::create(['day' => 'Wednesday', 'from' => '08:00:00', 'to' => '22:00:00']);
        WorkingHour::create(['day' => 'Thursday', 'from' => '08:00:00', 'to' => '22:00:00']);
        WorkingHour::create(['day' => 'Friday', 'from' => '08:00:00', 'to' => '22:00:00']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_hours');
    }
};
