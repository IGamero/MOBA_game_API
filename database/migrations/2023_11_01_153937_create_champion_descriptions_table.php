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
        Schema::create('champion_descriptions', function (Blueprint $table) {
            // $table->id();
            $table->string('description_id')->primary();
            $table->text('champion_name');
            $table->text('champion_title');
            $table->text('champion_type');
            $table->string('champion_image_path');
            $table->text('champion_description');
            $table->timestamps();
            $table->boolean('isActive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champion_descriptions');
    }
};
