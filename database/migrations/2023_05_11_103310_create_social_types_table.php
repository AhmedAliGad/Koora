<?php

use App\Models\SocialType;
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
        Schema::create('social_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        SocialType::create(['name' => 'facebook']);
        SocialType::create(['name' => 'twitter']);
        SocialType::create(['name' => 'youtube']);
        SocialType::create(['name' => 'website']);
        SocialType::create(['name' => 'instagram']);
        SocialType::create(['name' => 'snapchat']);
        SocialType::create(['name' => 'linkedin']);
        SocialType::create(['name' => 'tiktok']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_types');
    }
};
