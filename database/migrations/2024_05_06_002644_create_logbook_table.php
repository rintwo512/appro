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
        Schema::create('logbook', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tugas');
            $table->string('wing');
            $table->string('lantai');
            $table->string('lokasi');
            $table->timestamp('tanggal');
            $table->string('status');
            $table->string('prioritas');
            $table->string('kategori');
            $table->string('jenis_pekerjaan');
            $table->string('type')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('user_updated')->nullable();
            $table->string('user_updated_time')->nullable();
            $table->string('is_delete')->nullable();
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logbook');
    }
};
