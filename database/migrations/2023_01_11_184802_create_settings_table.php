<?php

use App\Models\Setting;
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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_ar');
            $table->text('description_en')->nullable();
            $table->text('description_ar');
            $table->longText('terms_en')->nullable();
            $table->longText('terms_ar');
            $table->longText('privacy_en')->nullable();
            $table->longText('privacy_ar');
            $table->string('email');
            $table->string('phone');
            $table->json('links')->nullable();
            $table->text('video_url')->nullable();
            $table->timestamps();
        });
        Setting::create(['name_ar' => 'Novo Care', 'description_ar' => 'Novo Care App Description',
            'email' => 'info@o2h.com', 'phone' => '01020304050', 'terms_ar' => 'Novo Care App Terms',
            'privacy_ar' => 'Novo Care App Privacy','video_url' => 'https://www.youtube.com/watch?v=DIOrZ9KT9hE']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
