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
        Schema::create('pengaturan_indikators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_tatanans_id')->constrained()->cascadeOnDelete();
            $table->foreignId('master_indikators_id')->constrained()->cascadeOnDelete();
            $table->foreignId('master_jawaban_indikators_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('file_bukti')->nullable();
            $table->string('penghargaan')->nullable();
            $table->string('file_bukti_penghargaan')->nullable();
            $table->integer('assesment_kabupaten')->nullable();
            $table->integer('assesment_provinsi')->nullable();
            $table->integer('assesment_nasional')->nullable();
            $table->mediumText('catatan_anggota')->nullable();
            $table->mediumText('catatan_koordinator')->nullable();
            $table->mediumText('catatan_pembina')->nullable();
            $table->mediumText('catatan_provinsi')->nullable();
            $table->mediumText('catatan_nasional')->nullable();
            $table->integer('pengisi_id');
            $table->integer('koordinator_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturan_indikators');
    }
};
