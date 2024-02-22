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
        Schema::create('cmdb_watchlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('movie_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps(); // Creates 'created_at' and 'updated_at' columns for timestamps

            // Define foreign key constraint
            $table->foreign('movie_id')->references('id')->on('cmdb_movies')->onDelete('cascade');
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->timestamps(); // Creates 'created_at' and 'updated_at' columns for timestamps

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmdb_watchlists');
    }
};