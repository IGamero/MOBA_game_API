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
        Schema::create('champions_stats', function (Blueprint $table) {
            // $table->id();
            $table->string('champion_id');
            $table->string('champion_name');
            $table->string('champion_type');
            $table->string('champion_image_path');
            $table->integer('champion_initial_health');
            $table->integer('champion_health_regeneration');
            $table->string('champion_initial_resource');
            $table->integer('champion_resource_regeneration');
            $table->integer('champion_AD');
            $table->integer('champion_AP');
            $table->integer('champion_armor');
            $table->integer('champion_magic_resistance');
            $table->integer('champion_attack_speed');
            $table->integer('champion_cooldown');
            $table->integer('champion_critical_strike');
            $table->integer('champion_movement_speed');
            $table->integer('champion_attack_range');
            $table->timestamps();
            $table->boolean('isActive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champions_stats');
    }
};
