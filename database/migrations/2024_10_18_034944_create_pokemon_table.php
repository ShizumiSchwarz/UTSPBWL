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
        Schema::create('pokemondex', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species');
            $table->string('primary_type');
            $table->decimal('weight', 8, 2);
            $table->decimal('height', 8, 2);
            $table->integer('hp');
            $table->integer('attack');
            $table->integer('defense');
            $table->boolean('is_legendary')->default(false);
            $table->string('photo')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
