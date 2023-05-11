<?php

use App\Models\Admin;
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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'agent', 'supervisor'])->default('admin');
            $table->enum('status', ['active', 'in_call', 'sing_out'])->default('sing_out');
            $table->boolean('active')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
        /*Admin::create(['name' => 'Admin', 'email' => 'admin@app.com',
            'password' => bcrypt('password12')]);
        Admin::create(['name' => 'Admin', 'email' => 'admin2@app.com',
            'password' => bcrypt('password12')]);*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
