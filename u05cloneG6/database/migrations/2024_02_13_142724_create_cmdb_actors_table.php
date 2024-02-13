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
        Schema::create('cmdb_actors', function (Blueprint $table) {
            $table->id(); // This assumes that "Id" is meant to be an auto-incrementing primary key.
            $table->text('name')->nullable(); // This assumes a nullable text column named "Name".
            // Add more columns or modify data types as needed based on your specific requirements.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmdb_actors');
    }
};
