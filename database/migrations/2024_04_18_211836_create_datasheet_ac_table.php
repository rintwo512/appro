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
        Schema::create('datasheet_ac', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ac_id')
                ->constrained('ac')
                ->onDelete('cascade')  // Menghapus secara otomatis jika data di 'ac' dihapus
                ->onUpdate('cascade'); // Memperbarui secara otomatis jika data di 'ac' diperbarui
            // $table->foreignId('ac_id')->constrained('ac')->onDelete('cascade');
            $table->string('daya_pk')->nullable();
            $table->string('daya_listrik')->nullable();
            $table->string('refrigerant')->nullable();
            $table->string('product')->nullable();
            $table->string('current')->nullable();
            $table->string('phase')->nullable();
            $table->string('daya_pendingin')->nullable();
            $table->string('pipa')->nullable();
            $table->string('seri_indoor')->nullable();
            $table->string('seri_outdoor')->nullable();
            $table->string('kebisingan_indoor')->nullable();
            $table->string('kebisingan_outdoor')->nullable();
            $table->string('dimensi_indoor')->nullable();
            $table->string('dimensi_outdoor')->nullable();
            $table->string('berat_indoor')->nullable();
            $table->string('berat_outdoor')->nullable();
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datasheet_ac');
    }
};
