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
        Schema::create("user_metrics", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->double("height");
            $table->double("weight");
            $table->integer("age");
            $table->enum("goal", ["cutting", "bulking", "maintence"]);
            $table->enum("activity_level", ["sedentary", "light", "moderate", "ative", "very_active"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("user_metrics");
    }
};
