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
        Schema::create('cmdb_movies', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key 'id' column
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('ratings')->nullable();
            $table->string('genre')->nullable();
            $table->string('director')->nullable();
            $table->timestamps(); // Creates 'created_at' and 'updated_at' columns for timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmdb_movies');
    }
};
