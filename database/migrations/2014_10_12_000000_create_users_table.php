<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jabatan');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->integer('nik')->unique();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('role')->default(false);
            $table->string('password');
            $table->string('status_login')->default('offline');
            $table->timestamp('user_time_online')->nullable();
            $table->timestamp('user_time_offline')->nullable();
            $table->ipAddress('last_ip')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
