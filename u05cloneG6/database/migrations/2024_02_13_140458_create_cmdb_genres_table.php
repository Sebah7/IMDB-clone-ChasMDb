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
        Schema::create('cmdb_genres', function (Blueprint $table) {
            $table->id(); // Creates an auto-incremental primary key column named 'id'
            $table->text('name')->nullable(); // Creates a nullable text field column named 'name'
            $table->timestamps(); // Creates 'created_at' and 'updated_at' columns for timestamps
            $table->softDeletes(); // Creates a 'deleted_at' column for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmdb_genres');
    }
};
