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
        Schema::create("workout_plans", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('trainer_id')->constrained('users')->cascadeOnDelete();
            $table->enum("goal",['bulking', 'cutting', 'maintenance']);
            $table->enum("level", ['beginner', 'medium', 'advanced']);
            $table->enum("status", ['active', 'pending', 'finished']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("workout_plans");
    }
};
