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
        Schema::create('cmdb_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('movie_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('Stars')->nullable();
            $table->text('Comment')->nullable();
            $table->timestamps(); // Creates 'created_at' and 'updated_at' columns for timestamps
            $table->softDeletes(); // Creates a 'deleted_at' column for soft deletes
            // Define foreign key constraints
            $table->foreign('movie_id')->references('id')->on('cmdb_movies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmdb_reviews');
    }
};