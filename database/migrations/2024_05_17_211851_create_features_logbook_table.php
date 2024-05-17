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
        Schema::create('features_logbook', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('submenu_id');
            $table->foreign('submenu_id')->references('id')->on('submenus')->onDelete('cascade');
            $table->string('name');
            $table->string('is_active')->default(true);
            $table->string('icon');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features_logbook');
    }
};
