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
            $table->id();

            $table->integer('movie_id')->nullable();
            $table->integer('Stars')->nullable();
            $table->text('Comment')->nullable();
            $table->integer('user_id')->nullable();
          
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
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
