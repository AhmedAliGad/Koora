<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->enum('role', ['client', 'admin', 'agent', 'super_admin'])->default('client');
            $table->enum('status', ['active', 'in_call', 'sing_out'])->default('sing_out');
            $table->string('device_token')->unique()->nullable();
            $table->enum('device_os', ['android', 'ios', 'web'])->default('android');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('code')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->boolean('active')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
        User::create(['name' => 'Super Admin', 'email' => 'admin@app.com', 'role' => 'super_admin',
            'password' => bcrypt('password12')]);
        User::create(['name' => 'Admin', 'email' => 'admin2@app.com', 'role' => 'admin',
            'password' => bcrypt('password12')]);
        User::create(['name' => 'Agent', 'email' => 'agent@app.com', 'role' => 'agent',
            'password' => bcrypt('password12')]);
        User::create(['name' => 'Client', 'email' => 'client@app.com', 'role' => 'client',
            'password' => bcrypt('password12')]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
