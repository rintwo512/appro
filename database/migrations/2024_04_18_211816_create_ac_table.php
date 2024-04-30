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
        Schema::create('ac', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('id_ac')->unique()->nullable();
            $table->string('asset')->nullable();
            $table->string('wing');
            $table->string('lantai');
            $table->string('ruangan');
            $table->string('status')->nullable();
            $table->string('merk');
            $table->string('type');
            $table->string('jenis');
            $table->text('catatan')->nullable();
            $table->text('kerusakan')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('tgl_pemasangan')->nullable();
            $table->string('petugas_pemasangan')->nullable();
            $table->string('tgl_maintenance')->nullable();
            $table->string('petugas_maint')->nullable();
            $table->string('user_updated')->nullable();
            $table->string('user_updated_time')->nullable();
            $table->string('is_delete')->nullable();
            $table->softDeletes('deleted_at', 0);
            $table->longText('qr_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac');
    }
};
