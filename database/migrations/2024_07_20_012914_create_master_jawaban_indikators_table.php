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
        Schema::create('master_jawaban_indikators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_indikators_id')->constrained()->cascadeOnDelete();
            $table->mediumText('jawaban');
            $table->integer('score');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_jawaban_indikators');
    }
};
