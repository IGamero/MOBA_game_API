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
        Schema::create('champion_abilities', function (Blueprint $table) {
            // $table->id();
            $table->string('ability_id')->primary();
            $table->string('champion_name');
            $table->string('ability_name');
            $table->string('ability_type');
            $table->string('ability_image_path');
            $table->string('ability_keys');
            $table->string('ability_resource_type');
            $table->string('ability_resource_cost_lvl_1');
            $table->string('ability_cooldown_lvl_1');
            $table->string('ability_description_lvl_1');
            $table->string('ability_resource_cost_lvl_2');
            $table->string('ability_cooldown_lvl_2');
            $table->string('ability_description_lvl_2');
            $table->string('ability_resource_cost_lvl_3');
            $table->string('ability_cooldown_lvl_3');
            $table->string('ability_description_lvl_3');
            $table->timestamps();
            $table->boolean('isActive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champion_abilities');
    }
};
