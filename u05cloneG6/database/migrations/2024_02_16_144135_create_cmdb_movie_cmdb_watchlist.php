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
        Schema::create('cmdb_movie_cmdb_watchlist', function (Blueprint $table) {
            $table->unsignedBigInteger('watchlist_id');
            $table->unsignedBigInteger('movie_id');
            $table->timestamps();

            $table->foreign('watchlist_id')->references('id')->on('cmdb_watchlists')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('cmdb_movies')->onDelete('cascade');
            /**
             * Removed the id code line above to prevent the creation of an id column in the pivot table.
             *  Added the code line below to create a composite primary key.This is so that each combination of the 'watchlist_id' and 'movie_id' can be unique.
             */
             $table->primary(['watchlist_id', 'movie_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmdb_movie_cmdb_watchlist');
    }
};
