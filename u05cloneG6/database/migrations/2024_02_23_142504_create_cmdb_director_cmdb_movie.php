<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Renamed the pivot table here and in the respective models.
     */
    public function up(): void
    {
        Schema::create('cmdb_director_cmdb_movie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('director_id');

            $table->foreign('movie_id')->references('id')->on('cmdb_movies')->onDelete('cascade');
            $table->foreign('director_id')->references('id')->on('cmdb_directors')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmdb_director_cmdb_movie');
    }
};