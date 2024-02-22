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
        Schema::create('cmdb_watchlist_movie_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('watchlist_id');
            $table->unsignedBigInteger('movie_id');
            $table->timestamps();

            $table->foreign('watchlist_id')->references('id')->on('cmdb_watchlists')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('cmdb_movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmdb_watchlist_movie_pivot');
    }
};
