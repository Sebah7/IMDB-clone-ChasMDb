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
            $table->bigIncrements('Id');
            $table->unsignedBigInteger('Moviesid')->nullable();
            $table->integer('Userid')->nullable();
            $table->timestamps(); // Creates 'created_at' and 'updated_at' columns for timestamps

            // Define foreign key constraint
            $table->foreign('Moviesid')->references('id')->on('cmdb_movies')->onDelete('cascade');
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
