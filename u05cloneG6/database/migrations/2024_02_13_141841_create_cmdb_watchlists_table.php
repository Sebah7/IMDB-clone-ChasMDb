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
        /**
         * Changes made on the migration file:
         * removed bigIncrements('id') and replaced with id() for the sake of consistency
         * Changed from unsignedBigInteger to foreignId and added constrained method
         * Changed from integer to foreignId and added constrained method
         * Added onDelete('cascade') to the foreignId method
         * Added the timestamps method to create 'created_at' and 'updated_at' columns for timestamps
         * Deleted duplicateid, user_id, movie_id and timestamps columns
         */
        Schema::create('cmdb_watchlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->nullable()->constrained('cmdb_movies')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
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