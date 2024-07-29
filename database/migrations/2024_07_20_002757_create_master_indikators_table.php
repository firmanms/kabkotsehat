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
        Schema::create('master_indikators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_tatanans_id')->constrained()->cascadeOnDelete();
            $table->mediumText('pertanyaan');
            $table->string('jenis');
            $table->longText('detail');
            $table->longText('sumberdata');
            $table->longText('dokumenpendukung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_indikators');
    }
};
