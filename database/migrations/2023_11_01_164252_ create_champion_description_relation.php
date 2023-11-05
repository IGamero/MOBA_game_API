<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('relation_champion_description', function (Blueprint $table) {
            // $table->id();
            $table->string('champion_id');
            $table->string('champion_name');
            $table->string('description_id');

            $table->foreign('champion_id')->references('champion_id')->on('champions_stats');
            $table->foreign('description_id')->references('description_id')->on('champion_descriptions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relation_champion_description');
    }
};
