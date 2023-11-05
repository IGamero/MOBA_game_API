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
        Schema::create('relation_champion_ability', function (Blueprint $table) {
            // $table->id();
            $table->string('champion_id');
            $table->string('champion_name');
            $table->string('ability_id');
            $table->string('ability_name');

            $table->foreign('champion_id')->references('champion_id')->on('champions_stats');
            $table->foreign('ability_id')->references('ability_id')->on('champion_abilities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relation_champion_ability');
    }
};
